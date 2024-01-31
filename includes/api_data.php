<?php



/**

 * Class Name: api_data

 

 */

//exit if accessed directly

if(!defined('ABSPATH')) exit;

class api_data {



    // function use api to get all expedited countries 

    public function expedited_countries() {

        $url = 'http://apimaindata.uslegalization.com/api/country/getlist';



        $response = wp_remote_post( $url, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'headers'     => array('Content-Type' => 'application/json'),

            'body'        => array(),

            'cookies'     => array()

            )

        );



        $getCountries = json_decode($response['body']);

        

        $countryNames = $getCountries->CountryList;



        $countries= (array)$countryNames;



        usort($countries, array($this, "cmp"));

        

        return $countries;

    }



    // function is used in (regular_countries & expedited_countries) to compare strings 

    // then we use usort built-in function to sort countries alphabetically came from api

    public function cmp($a, $b) {

        if(isset($a->Name) && isset($b->Name)){

            return strcmp($a->Name, $b->Name);

        } else{

            return strcmp($a->name, $b->name);

        }

    }



    function get_documents_by_countryID() {

        $urlC = 'http://apimaindata.uslegalization.com/api/Document/GetDocuments';

    

        

        $response2 = wp_remote_post( $urlC, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'headers'     => array(),

            'body'        => array('WebsiteId' => 9, 'CountryID' => 99),

            'cookies'     => array()

            )

        );

        $documents = json_decode($response2['body']);

    

        return $documents;

    }



    // function use api to get service (document fee & info for each country)

    public function get_services(){

        if(session_id() == '') {
            session_start();
        }

        // Clear all session variables
        session_unset();

        // Destroy the session
        session_destroy();

        $cartClass = new cart;

        $totalFee = 0;

        

        $countries = $this->get_documents_by_countryID();

        if (isset($_POST['SubDocList'])) {
            $totalCountForDocs = array_sum(array_column($_POST['SubDocList'], 'subCount'));
        } else {
            $totalCountForDocs = $_POST['Count'];
        }

        $selectedUserData = array(

            "DocumentCaseId" => $_POST['DocumentCaseId'],

            "HaveArabChamber" => (isset($_POST['HaveArabChamber'])) ? $_POST['HaveArabChamber'] : false,

            "IsArabChamber" => (isset($_POST['IsArabChamber'])) ? $_POST['IsArabChamber'] : false,

            "Count" => $totalCountForDocs,

            "ArabChamberCount" => (isset($_POST['ArabChamberCount'])) ? $_POST['ArabChamberCount'] : null,

            "ProductList" => (isset($_POST['ProductList'])) ? $_POST['ProductList'] : null,

            "SubDocumentId" => (isset($_POST['SubDocumentId'])) ? $_POST['ProductList'] : null,

            "StateId" => (isset($_POST['StateId']))?$_POST['StateId']: 19,

            "InvoiceList" => (isset($_POST['InvoiceList']))? $_POST['InvoiceList'] : null,

            "ArroundTimeId" => (isset($_POST['ArroundTimeId']))? $_POST['ArroundTimeId'] : null,

            "SubDocList" => (isset($_POST['SubDocList']))?$_POST['SubDocList']:null,

            "AkinJumpCount" => (isset($_POST['AkinJumpCount'])) ? $_POST['AkinJumpCount'] : null

        );



        foreach ($countries->CountryDocumentCaseList as $key => $value) {

            # code...

            if ($value->Id == $_POST['DocumentCaseId']) {

                $documentCaseObj = $value;

            }

        }



        $url = 'http://apimaindata.uslegalization.com/api/Service/GetServices';

    

        $serviceResponse = wp_remote_post( $url, 

            array(

                'method'      => 'POST',

                'timeout'     => 45,

                'blocking'    => true,

                'headers'     => array('Content-Type' => 'application/json'),

                'body'        => json_encode(

                    array(

                        "CountryDocumentCaseList" => $countries->CountryDocumentCaseList,

                        "SubDocumentDataList" => $countries->SubDocumentDataList,

                        "ProductListDataList" => $countries->ProductListDataList,

                        "InvoiceValueDataList" => $countries->InvoiceValueDataList,

                        "ArroundTimeDataList" => $countries->ArroundTimeDataList,

                        "Statelist" => $countries->Statelist,

                        "StatelistForJurisdiction" => $countries->StatelistForJurisdiction,

                        "StateDefault" => $countries->StateDefault,

                        "SelectedDocument" => $selectedUserData,

                        "WebSiteId" => 9,

                        "OrganizationId" => 6,

                        "IsDisCount" => false,

                        "PreviousCount" => 0

                    )

                ),

                'cookies'  => array()

            )

        );



        $serviceTable = json_decode($serviceResponse['body']);



        foreach ($serviceTable->Services as $key => $value) {

            # code...

            $totalFee += $value->TotalFee;

        }



        $sessionArr = array('table' => $serviceTable->Services, 'totalfee' => $totalFee);



        

        $cartClass->create_session("countryDocumentObject", $countries);

        $cartClass->create_session("selectedUserData", $selectedUserData);

        $cartClass->create_session("serviceInfo", $sessionArr);

        $cartClass->create_session("documentCaseObj", $documentCaseObj);

        $cartClass->create_session("currentStep", 1);



        curl_init( 'https://httpbin.org/post' );

        wp_send_json($serviceTable, 200);

        die();

    }



    public function get_services_without_post($SelectedDocument){



        //example 

        // $SelectedDocument = array(

        //     "DocumentCaseId" => $_POST['DocumentCaseId'],

        //     "HaveArabChamber" => $_POST['HaveArabChamber'],

        //     "IsArabChamber" => $_POST['IsArabChamber'],

        //     "Count" => $_POST['Count'],

        //     "ArabChamberCount" => $_POST['ArabChamberCount'],

        //     "ProductList" => $_POST['ProductList'],

        //     "SubDocumentId" => $_POST['SubDocumentId'],

        //     "StateId" => (isset($_POST['StateId']))?$_POST['StateId']: null,

        //     "InvoiceList" => (isset($_POST['InvoiceList']))? $_POST['InvoiceList'] : null,

        //     "ArroundTimeId" => (isset($_POST['ArroundTimeId']))? $_POST['ArroundTimeId'] : null,

        //     "SubDocList" => $_POST['SubDocList'],

        //     "AkinJumpCount" => $_POST['AkinJumpCount']

        // );

        

        $countries = $this->get_documents_by_countryID();

        $countries->SelectedDocument = $SelectedDocument;

        $countries->WebSiteId = 9;

        $countries->OrganizationId = 6;

        $countries->IsDisCount = false;

        $countries->PreviousCount = 0;



        $url = 'http://apimaindata.uslegalization.com/api/Service/GetServices';

    

        $serviceResponse = wp_remote_post( $url, 

            array(

                'method'      => 'POST',

                'timeout'     => 45,

                'blocking'    => true,

                'headers'     => array('Content-Type' => 'application/json'),

                'body'        => json_encode($countries),

                'cookies'  => array()

            )

        );



        $serviceTable = json_decode($serviceResponse['body']);



        return $serviceTable;

    }



    public function get_number_generated() {

        $numberGenerated = 'http://apirequestnumber.uslegalization.com/api/Request/GenerateNumber';

    

        $data = "";

        $numberResponse = wp_remote_post( $numberGenerated, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  $data,

            'cookies'     => array()

            )

        );

    

        $theNumber = json_decode($numberResponse['body']);

    

        return $theNumber->RequestNumber;

    }



    public function save_request_data($fedexData, $ContactInformationData) {



        $saveDataUrl = 'http://apiwebrequest.uslegalization.com/api/Request/Save';

    

        $data = array(

            'ContactInformation' => $ContactInformationData,

            'OnlineRequest' => $fedexData,

            'BarCode' => "",

        );

        $saveDataRequest = wp_remote_post( $saveDataUrl, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  $data,

            'cookies'     => array()

            )

        );

    

        $dataStored = json_decode($saveDataRequest['body']);

    

        return $dataStored;

    }


    

    function save_order_api($generatedNumber) {
        $filepath = __FILE__; // Get the current file's path
        $parent_dir = dirname($filepath);
        $grandparent_dir = dirname($parent_dir);
        require_once $grandparent_dir . '/vendor/autoload.php';

	

        $cartClass = new cart;

        

         $generatedRequestNumber = $this->get_number_generated();

        $cartClass->create_session("invoiceNo", $generatedRequestNumber);

        $session = $cartClass->retreive_session();



        $address = $session['user']['userInfo']['address'];

        $zipcode = $session['user']['userInfo']['zipcode'];

        $city = $session['user']['userInfo']['city'];

        $state = $session['user']['userInfo']['state'];

        $email = $session['user']['userInfo']['email'];
        $reference = $session['user']['userInfo']['reference'];

        $companyName = $session['user']['userInfo']['companyName'];

        $userName = $session['user']['userInfo']['userName'];

        $firstname = $session['user']['userInfo']['firstname'];

        $lastname = $session['user']['userInfo']['lastname'];

        $tel = $session['user']['userInfo']['tel'];

        $shipping = $session['user']['shipping'];

        $service_object = $session['user']['serviceInfo']['table'];

        $totalFee = $session['user']['serviceInfo']['totalfee'];

        $payment = $session['user']['paymentChoice'];

$fedexArrForInvoice = [];
        if(in_array("2dayfrom", $shipping)) {

            $fedexArrForInvoice['From'] = ["Fedex (2days)", $session['user']['rate_from'][0]];

        } else if (in_array("1dayfrom", $shipping)) {

            $fedexArrForInvoice['From'] = ["Fedex (Next day)", $session['user']['rate_from'][1]];

        }
        if(in_array("2dayto", $shipping)) {
            $cartClass->remove_session_items('international');
            unset($_SESSION['user']['international']);
            $fedexArrForInvoice['To'] = ["Fedex (2days)", $session['user']['rate_to'][0]];

        } else if (in_array("1dayto", $shipping)) {
            $cartClass->remove_session_items('international');
            unset($_SESSION['user']['international']);
            $fedexArrForInvoice['To'] = ["Fedex (Next day)", $session['user']['rate_to'][1]];

        } else if (in_array("international", $shipping)) {
            $cartClass->remove_session_items('shippingTo');
            unset($_SESSION['user']['shippingTo']);
            $fedexArrForInvoice['To'] = ["Fedex (International)", 65];

        } else {
            $cartClass->remove_session_items('international');
            unset($_SESSION['user']['international']);
            $cartClass->remove_session_items('shippingTo');
            unset($_SESSION['user']['shippingTo']);
        }


        $selectedUserData = $session['user']['selectedUserData'];

        

        $ContactInformationData = array(

            'Firstname' => $firstname,

            'Lastname' => $lastname,

            'Email' => $email,

            'ZipCode' => $zipcode,

            'Companyname' => $companyName,

            'Address' => $address,

            'City' => $city,

            'State' => $state,

            'Country' => "United State",

            'Phone' => $tel,

            'Cellphone' => "",

            'ShippingAddress' => $address,

            'ShippingZipcode' => $zipcode,

            'IsExitsUser' => false,

            'BillEmail' => $email,

            'IsIndividual' => false,

        );

        $RequestInvoiceValues = (isset($selectedUserData['InvoiceList'])) ? $selectedUserData['InvoiceList'] : array();

        $RequestProductLists = (isset($selectedUserData['ProductList'])) ? $selectedUserData['ProductList'] : array();

        $RequestSubDocuements = (isset($selectedUserData['SubDocList'])) ? $selectedUserData['SubDocList'] : array();



        $RequestInvoiceValues2 = array();

        $RequestProductLists2 = array();

        if (is_array($RequestProductLists)) {

            foreach ($RequestProductLists as $key1 => $value1) {

                $RequestProductLists2[] = array(

                    "Id"=> 1,

                    "ProductValue" => (int)$value1,

                    "RequestDocumentId"=> 1,

                    "ProductListId"=> 1,

                );

            }

        }

        if (is_array($RequestInvoiceValues)) {

            foreach ($RequestInvoiceValues as $key1 => $value1) {

                        $RequestInvoiceValues2[] = array(

                            "Id"=> 1,

                            "RequestDocumentId"=> 1,

                            "InvoiceValue" => (int)$value1

                        );

            }

        }

        $subdocArr2 = array();

        if (is_array($RequestSubDocuements)) {

            foreach ($RequestSubDocuements as $key2 => $value2) {

                foreach ($session['user']['countryDocumentObject']->SubDocumentDataList as $key1 => $value1) {

                    if($value2['subId'] == $value1->Id) {

                        $singleSubDocObj = $value1;

                    }

                }

                foreach ($session['user']['countryDocumentObject']->ArroundTimeDataList as $key1 => $value1) {

                    if($selectedUserData['ArroundTimeId'] == $value1->Id) {

                        $arroundTimeName = $value1->Text;

                    }

                }

                $subdocArr2[] = array(

                                    "SubDocumentId" => $value2['subId'], 

                                    "SubDocumentName" => $singleSubDocObj->SubDocumentName,

                                    "Count" =>$value2['subCount'],

                                    "IsInvoiceValue" =>$singleSubDocObj->IsInvoiceValue,

                                    "IsArroundTime" =>$singleSubDocObj->IsArroundTime,

                                    "ArroundTimeName" =>(isset($arroundTimeName)) ? $arroundTimeName : null,

                                    "DisplayName" =>$singleSubDocObj->DisplayName,

                                    "CountrySubDocumentCaseId" =>$singleSubDocObj->CountryDocumentCaseId

                                );

            }

        }



        $RequestCountries = array(

            'AkinJumpCount' => $selectedUserData['AkinJumpCount'],

            'ArroundTimeId' => $selectedUserData['ArroundTimeId'],

            'ArroundTimeName' => (isset($arroundTimeName)) ? $arroundTimeName : null,

            'Count' => $selectedUserData['Count'],

            'CountryDocumentCaseId' =>$session['user']['documentCaseObj']->Id,

            'CountryDocumentCaseName' =>$session['user']['documentCaseObj']->DocCaseName,

            'DisplayName' =>$session['user']['documentCaseObj']->DisplayName,

            'IsAkinJump' =>$session['user']['documentCaseObj']->AkinJumpCount,

            'IsArabChamber' =>$session['user']['documentCaseObj']->IsArab,

            'IsArroundTime' =>$session['user']['documentCaseObj']->IsArroundTime,

            'IsCommerical' =>$session['user']['documentCaseObj']->IsCommerical,

            'IsConsult' =>$session['user']['documentCaseObj']->IsConsult,

            'IsInvoiceValue' =>$session['user']['documentCaseObj']->IsInvoiceValue,

            'IsJurisduction' =>$session['user']['documentCaseObj']->IsJurisdiction,

            'IsProductList' =>$session['user']['documentCaseObj']->IsProductList,

            'IsSub' =>$session['user']['documentCaseObj']->IsSubDocument,

            'StateId' => $selectedUserData['StateId'],

            'IsDisCount' =>$session['user']['documentCaseObj']->IsDisCount,

            'StateName' => (isset($selectedUserData['StateName'])) ? $selectedUserData['StateName'] : null,

            'RequestServices' => $session['user']['serviceInfo']['table'],

            'RequestInvoiceValues' => $RequestInvoiceValues2,

            'RequestProductLists' => $RequestProductLists2,

            'RequestSubDocuements' => $subdocArr2

        );



        $fedexData = array(

            'OrganizationId' => 6,

            'WebSiteId' => 9,

            'RequestNumber' => $generatedRequestNumber,

            'TotalAmount' => ((isset($session['user']['fedexData']['fee'])) ? $session['user']['fedexData']['fee'] : 0),

            'Paid' => ($payment == 1) ? true : false,

            'Due' => ($payment == 1) ? ((isset($session['user']['fedexData']['fee'])) ? $session['user']['fedexData']['fee'] : 0) : null,

            'PaymentMethodId' => $payment,

            'AuthCode' => '',

            'ContactInformationId' => '',

            'CreateDateOfRequest' => date("Y-m-d H:i:s"),

            'IsScanned' => false,

            'BaseAmount' => ((isset($session['user']['fedexData']['feeService'])) ? $session['user']['fedexData']['feeService'] : 0),

            'FedexAmount' => ((isset($session['user']['fedexData']['feeFedex'])) ? $session['user']['fedexData']['feeFedex'] : 0),

            'HandlingAmount' => ((isset($session['user']['fedexData']['feeHandeling'])) ? $session['user']['fedexData']['feeHandeling'] : 0),

            'TrackingIn' => ((isset($session['user']['fedexData']['fedex_tracking_in'])) ? $session['user']['fedexData']['fedex_tracking_in'] : null),

            'TrackingOut' => ((isset($session['user']['fedexData']['fedex_tracking_out'])) ? $session['user']['fedexData']['fedex_tracking_out'] : null),

            'NOfLabel' => ((isset($session['user']['fedexData']['feeFedex'])) ? (($session['user']['fedexData']['feeFedex'] == 65) ? 1 : 2) : 0),

            'RequestCountries' => array(

                array(

                'CountryId' =>$session['user']['documentCaseObj']->CountryId,

                'CountryName' =>$session['user']['documentCaseObj']->CountryName,

                'RequestDocuments' => array($RequestCountries)

                )

                )//$RequestCountries

                

                

        );



        $saveDataToApi = $this->save_request_data($fedexData, $ContactInformationData);



        if ($payment == "1") {

            $paymentMethodName = "Credit";

        } else if ($payment == "2") {

            $paymentMethodName = "Billing";

        } else {

            $paymentMethodName = "Check";

        }
        
        $time = 0;
        $totalFee = 0;
        foreach ($session['user']['serviceInfo']['table'] as $key => $value) {
            # code...
            $time += $value->Time;
            $totalFee += $value->TotalFee;
        }

        $editShippingFlag = false;
        if (isset($session['user']['shippingTo']['address']) && $session['user']['shippingTo'] != null) {
            if ($session['user']['shippingTo']['address'] != $address) {
                $editShippingFlag = true;
            }
        }

        $lastOrderArray = array(

            "name"  => $firstname . " " . $lastname,

            "address"   => $address,

            "city"  => $city,

            "state" => $state,

            "zipcode"   => $zipcode,

            "phone" => $tel,

            "email" => $email,
            "reference" => $reference,

            "invoiceNo" => $generatedRequestNumber,

            "docCount"  => $selectedUserData['Count'],

            "trackingIn"    => (isset($session['user']['fedexData']['fedex_tracking_in']) ? $session['user']['fedexData']['fedex_tracking_in'] : null),

            "trackingOut"    => ($time >= 15 && $editShippingFlag == false) ? "Return envelope will be created later." : (isset($session['user']['fedexData']['fedex_tracking_out']) ? $session['user']['fedexData']['fedex_tracking_out'] : null),

            "fedex_file_path_from"    => (isset($session['user']['fedexData']['fedex_file_path_from']) ? $session['user']['fedexData']['fedex_file_path_from'] : null),

            "fedex_file_path_to"    => (isset($session['user']['fedexData']['fedex_file_path_to']) ? $session['user']['fedexData']['fedex_file_path_to'] : null),

            "paymentMethod" => $paymentMethodName,

            "timelinMonth"  => 1,

            "timelinDay"    => 1,

            "timelinYear"   => 1,

            "services"  => (isset($session['user']['serviceInfo']['table']) ? $session['user']['serviceInfo']['table'] : null),
            "feeFedex"  => (isset($session['user']['feeFedex']) ? $session['user']['feeFedex'] : 0),

            "caseName" => $session['user']['documentCaseObj']->DisplayName,
            "fedexArrForInvoice" => $fedexArrForInvoice,
            "isShippingAddress" => ($time >= 15 && isset($session['user']['feeFedex']) && $session['user']['feeFedex'] != 0) ? 1 : 0,
             "shippingTo" => ($time >= 15 && $editShippingFlag == true) ? $session['user']['shippingTo'] : null,           
             "shippingInternational" => (isset($session['user']['international'])) ? $session['user']['international'] : null,           

        );
        
        $cartClass->create_session2('lastOrder22', $lastOrderArray);
        
        
        $cartClass->remove_session_items("user");

        if (isset($session['lastOrder22']['trackingIn']) && $session['lastOrder22']['trackingIn'] != "" && $session['lastOrder22']['trackingIn'] != null) {

            $saveDataToApi->Aproved = true;

            $saveDataToApi->fedex_file_path_from = $session['lastOrder22']['trackingIn'];

            $saveDataToApi->fedex_file_path_to = $session['lastOrder22']['trackingOut'];

            $saveDataToApi->EXact_Message = "";

            $saveDataToApi->fedex = true;

            $saveDataToApi->message = "Order Created Successfully.";

            $saveDataToApi->EXact_Message = "";

        } else {

            $saveDataToApi->Aproved = true;

            $saveDataToApi->fedex = false;

            $saveDataToApi->message = "Order Created Successfully.";

            $saveDataToApi->EXact_Message = "";



        }

            
            // $mpdf->Output();
        // if ($saveDataToApi->Error == null) {

            $amount = ((isset($session['user']['fedexData']['fee'])) ? $session['user']['fedexData']['fee'] : 0);

            $message = "your order has been created successfully \n";

            $message .= "Payment Method: " . $paymentMethodName. "\n";

            $message .= (isset($session['user']['fedexData']['fedex_tracking_in']) ? "Tracking In:" . $session['user']['fedexData']['fedex_tracking_in']. "\n" : "");

            $message .= (isset($session['user']['fedexData']['fedex_tracking_out']) ? "Tracking Out:" . $session['user']['fedexData']['fedex_tracking_out']. "\n" : "");

            $message .= (isset($session['user']['fedexData']['fedex_tracking_in'])) ? "Total amount: $" . $amount. "\n" : "";

            $headers = 'From: UAE Embassy | Orders <billing@billmailing.com>' . "\r\n";

            $target_file1 = (isset($session['user']['fedexData']['fedex_file_path_from']) ? $session['user']['fedexData']['fedex_file_path_from'] : null);

            $target_file2 = (isset($session['user']['fedexData']['fedex_file_path_to']) ? $session['user']['fedexData']['fedex_file_path_to'] : null);

            $siteUrl = site_url();

            $target_file1 =  ABSPATH . "/" . str_replace($siteUrl, "", $target_file1);

            $target_file2 =  ABSPATH . "/" . str_replace($siteUrl, "", $target_file2);


            $url = "https://egypt.saso.us/invoice-template/"; // Replace with the target URL

        // Attempt to fetch the HTML content
        $html = @file_get_contents($url);
        if ($html === false) {
            // Handle error if fetching fails
            $respo = "Error fetching page content!";
        } else {
            // Process the fetched HTML content
            // (e.g., save to a file, pass to mPDF, etc.)
            $respo = "HTML content fetched successfully!";
        
            // Example: Save to a fi
        }

        $date = date('d m y');
        $time = 0;
        foreach ($session['user']['serviceInfo']['table'] as $key => $value) {
            # code...
            $time += $value->Time;
        }

        $totalFee = 0;
        $tableRows = '';
        foreach ($session['user']['serviceInfo']['table'] as $key => $value) {
            $totalFee += $value->TotalFee;
        
            $tableRows .= '<tr>
                <td colspan="6" class="bl-1">'.$value->Name .'</td>
                <td><span class="doc_count">'. $value->Count .'</span></td>
                <td><span class="doc">'. $value->Fee .'</span></td>
                <td>'. $value->TotalFee .'</td>
            </tr>';
        
        }
$tableRows .= '<tr>
                <td colspan="8" class="bl-1">Total</td>
                
                <td>'. $totalFee .'</td>
            </tr>';
            
        $tableRows2 = '';
            if ($paymentMethodName == "Credit") {
        $tableRows2 .= '<table style="margin-top:20px;">
        <thead>
            <tr>
                <th colspan="8" class="bl-1 invoice-documents-for-name">Services </th>
                
                <th>
                    Total
                </th>
            </tr>
        </thead>
        <tbody class="invoice-table-body">
        <tr>
            <td colspan="8" class="bl-1">sub total</td>
            <td>'.$totalFee.'</td>
        </tr>';
        $feeFedex = isset($session['user']['feeFedex']) ? $session['user']['feeFedex'] : 0;
        if ($feeFedex != 0) {
foreach ($fedexArrForInvoice as $key => $value) {
            $tableRows2 .= '<tr>
        
<td colspan="8" class="bl-1">'.$value[0].'</td>
                <td>'.$value[1].'</td>
            </tr>';
        }

                        $totalFee += $feeFedex;
        }

                    $handlingFee = $totalFee * .05;
        $totalFee += $handlingFee;
            $tableRows2 .= '<tr>
                
                <td colspan="8" class="bl-1">Handling Fee</td>
                <td>'. $handlingFee .'</td>
            </tr></tbody>
            <tbody class="invoice-table-body2">
                <tr>
                    <!-- <td colspan="6" class="white"></td> -->
                    <td colspan="8" class="bl-1">Total:</td>
                    <td><span class="total_amount_fees">'. $totalFee .'</span></td>
                </tr>
            </tbody>

        </table>';
        
            
                } 

        $fedexInfoInvoice = '';
        $fedexInfoInvoice .= ($session['user']['fedexData']['fedex_tracking_in'] != "" && $session['user']['fedexData']['fedex_tracking_in'] != null) ? '<div class="form-group fedex-info-option hide-on-no-fedex" style="">
        <label for="">Tracking In :</label>
        <span class="fed_tracking_in" style="color: #b32134;">'.
            $session['user']['fedexData']['fedex_tracking_in'] .'</span>
    </div>' : "";

    $fedexInfoInvoice .= ($session['user']['fedexData']['fedex_tracking_out'] != "" && $session['user']['fedexData']['fedex_tracking_out'] != null) ? '<div class="form-group fedex-info-option hide-on-no-fedex" style="">
        <label for="">Tracking Out :</label>
        <span class="fed_tracking_out" style="color: #b32134;">'.
            $session['user']['fedexData']['fedex_tracking_out'] .'</span>
    </div>' : "";

    $fedexInfoInvoice .= ($session['user']['fedexData']['fedex_tracking_out'] != "" && $session['user']['fedexData']['fedex_tracking_out'] != null & $session['user']['fedexData']['fedex_tracking_in'] != "" && $session['user']['fedexData']['fedex_tracking_in'] != null) ? '<div class="form-group fedex-info-option hide-on-no-fedex" style="">
        <label for="">Carrier :</label>
        <span class="shipping-carrier" style="color: #b32134;">FedEx</span>
    </div>' : "";

        $html = '<html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        
            <link rel="stylesheet" id="order-form-css"
                href="https://egypt.saso.us/wp-content/themes/saudi-theme/assets/css/order-form.css?ver=1.0.2.1" media="all" />
            <link rel="stylesheet" id="finalform-css"
                href="https://egypt.saso.us/wp-content/themes/saudi-theme/assets/css/finalform.css?ver=1" media="all" />
        </head>
        
        <body>
            <form action="" class="finalForm">
                <div class="bordered">
                    <div class="header">
                        <div class="row" style="display:flex;justify-content:space-between;align-items:center;">
                            <div class="col-xs-4" style="width:25%;display:inline-block;float:left;"> <img
                                    src="https://egypt.saso.us/wp-content/themes/saudi-theme/assets/images/logo.png"
                                    alt="US Apostille logo" class="" style="max-width:100%;"></div>
                            <div class="col-xs-6" style="width:50%;display:inline-block;float:left;">
        
                                <h2>Invoice for expedited services</h2>
                                <ul>
                                    <li>1615 Bay Head RD, Annapolis, MD 21409</li>
                                    <li><span style="margin-right: 6px;display: inline-block;">Phone:</span>(410) 349 - 1212
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-2" style="width:12.5%;display:inline-block;float:left;">
                                <img src="https://www.usapostille.com/wp-content/themes/usApostille/images/codeBar.png"
                                    alt="barcode" style="max-width:100%;">
                            </div>
                        </div>
        
                        <div class="row" style="margin-top:20px;">                            
                            <div class="col-xs-4 p-0" style="width:50%;display:inline;float:left;">
        
                                <div class="block">
        
                                    <ul>
                                        <li class="spncompsend"></li>
                                       
                                        <li class="senderfromfirstname">'. $firstname . " " . $lastname.'</li>
                                        
                                        <li class="senderfromstreetaddress">'. $address.'</li>
                                        
                                        <li class="senderFromCityStateZipcode">'. $city . " ". $state ." ". $zipcode .'</li>
                                        
                                        <li class="senderfromphone">'. $tel .'</li>
                                        <li class="senderfromemail">'. $email .'</li>
                                    </ul>
                                </div>
                            </div>
        
        
                            <div class="col-xs-8" style="width:50%;display:inline;float:left;">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Invoice No : </label>
                                        <span style="color: #b32134;" class="invoice_num">'. $generatedRequestNumber.'</span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Date : </label>
                                        <span style="color: #b32134;" class="date_now">'. date("M d Y") .'</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. of Docs : </label>
                                        <span style="color: #b32134;" class="doc_count countofdoc-invoice">'.
                                            $selectedUserData['Count'] .'</span>
                                    </div>
        
                                    '.$fedexInfoInvoice.'
                                    <div class="form-group">
                                        <label for="">Payment Method :</label>
                                        <span class="shipping-method-Payment-lable" style="color: #b32134;">'.
                                            $paymentMethodName .'</span>
                                    </div>
                                    <div class="form-group">
                                        <span>Estimated Date to finish: </span><span class="day-mon-time"
                                            style="color: #b32134;">'. date("M", strtotime(" + $time days")) .'</span> <span
                                            class="day-num-time" style="color: #b32134;">'. date("d", strtotime(" + $time
                                            days")) .'</span> <span class="day-year-time" style="color: #b32134">'. date("Y",
                                            strtotime(" + $time days")) .'</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Reference :</label>
                                        <span class="shipping-method-Payment-lable" style="color: #b32134;">'.
                                        $reference .'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <main>
                        <h4>Request for use in the country of <span class="country-to-add">Egypt</span></h4>
                        <h4>'. $session['user']['documentCaseObj']->DisplayName .'</h4>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="6" class="bl-1 invoice-documents-for-name">Services </th>
                                        <th>
                                            Count
                                        </th>
                                        <th>
                                            Amount
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="invoice-table-body">
                                    '.$tableRows.'
                                </tbody>

        
                            </table>
                            
                                    '.$tableRows2.'
                                
                            <!--    <div class="comment">
                                <p>Please print this page and include it in your package with your document.</p>
                                <div class="fedex-comment"></div>
                            </div> -->
                        </div>
                    </main>
                </div>
            </form>
        </body>
        
        </html>';

        
        $mpdf = new \Mpdf\Mpdf();
        $filepath = __FILE__; // Get the current file's path
        $mpdf->WriteHTML($html);
        $filename = 'invoice_'; // Adds prefix "invoice_"

        $filename = $generatedRequestNumber . "_" . date('M_d_Y')."_".time();
        $mpdf->Output(ABSPATH . '/invoices_pdf/' .$filename. '.pdf', 'F');
        

            $invoiceAttachmentPath = ABSPATH . '/invoices_pdf/' .$filename. '.pdf';

            wp_mail($email, "Egypt Embassy Order", $message, $headers, [$invoiceAttachmentPath, $target_file1, $target_file2]);

            wp_send_json($saveDataToApi, 200);

        // } else {

            // $saveDataToApi->EXact_Message = "Process Failed";

        // }

        

        die();

    }



    public function get_countries_findembassy() {

        $url = 'https://embassyapi.texasapostille.org/public/api/getcountries';



        $response = wp_remote_post($url, 

            array(

                'method'      => 'POST',

                'timeout'     => 45,

                'blocking'    => true,

                'headers'     => array(),

                'body'        => array(

                    'countryId' => 99,

                    'embassyId' => 0,

                    'responseType' => 'all'

                ),

                'cookies'     => array()

            )

        );



        $countries = json_decode($response['body']);



        $countriesArr = array();



        foreach ($countries->countries as $key => $value) {

            # code...

            $countriesArr[$value->CountryID] = $value->CountryName;

        }



        return $countriesArr;

    }



}