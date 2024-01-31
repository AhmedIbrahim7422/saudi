<?php



/**

 * Class Name: order_form

 

 */

//exit if accessed directly

if(!defined('ABSPATH')) exit;

class order_form {

    function __constructor() {



    }



    public function getNumberGenerated() {

        $numberGenerated = 'http://apirequestnumber.uslegalization.com/api/Request/GenerateNumber';

    

        $data = "";

        $zipcodeResponse = wp_remote_post( $numberGenerated, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'headers'     => array('Content-Type' => 'application/json'),

            'body'        =>  $data,

            'cookies'     => array()

            )

        );

    

        $response = json_decode($zipcodeResponse['body']);

        

        return $response->RequestNumber;

    

    }



    public function zipcode_autocomplete(){

        $zipcodeURL = 'http://apimaindata.uslegalization.com/api/ZipCode/GetData';

    $zipcode = $_POST['ZipCode_No'];

        $zipcodeResponse = wp_remote_post( $zipcodeURL, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'headers'     => array('Content-Type' => 'application/json'),

            'body'        =>  json_encode("$zipcode"),

            'cookies'     => array()

            )

        );

    

        $zipcodeData = json_decode($zipcodeResponse['body']);

    

        wp_send_json($zipcodeData, 200);

    }



    public function auto_complete_user_data() {

        $autoCompleteUrl = 'http://apiwebrequest.uslegalization.com/api/ContactInformation/AutoComplete';

    

        $data = array(

            'WebSiteId' => 9,

            'zipCode' => $_POST["zipCode"],

            'email' => $_POST["email"],

        );

        $userDataResponse = wp_remote_post( $autoCompleteUrl, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  $data,

            'cookies'     => array()

            )

        );

    

        $userData = json_decode($userDataResponse['body']);

    

        wp_send_json($userData, 200);

    }

    

    

    // validate address & zipcode for fedex

    public function update_current_step() {

        $cartClass = new cart;

        $step = $_POST['sessionStep'];

        $cartClass->create_session('currentStep', $step);

        wp_send_json($step, 200);

    }

    public function validate_rate_fedex() {

        $fedex_rate_arr = array();

        $fedex_connect_arr = array();

        $cartClass = new cart;





        $address = $_POST['address'];

        $zipcode = $_POST['zipcode'];

        $companyName = $_POST['company_name'];

        $userName = $_POST['firstname'] . " " . $_POST['lastname'];

        $firstname = $_POST['firstname'];

        $lastname = $_POST['lastname'];

        $email = $_POST['email'];
        $reference = $_POST['reference'];

        $city = $_POST['city'];

        $state = $_POST['state'];

        $tel = $_POST['tel'];
        
        $outUsa = $_POST['outUsa'];
        $address2 = $_POST['address2'];
        $country = $_POST['country'];
        $countryCode = (isset($_POST['countryCode'])) ? $_POST['countryCode'] : "";


        $fedex_connect_arr['userInfo'] = array(

            'address' => $address,

            'address2' => $address2,
            'country' => $country,
            'countryCode' => $countryCode,

            'zipcode' => $zipcode,

            'city' => $city,

            'state' => $state,

            'email' => $email,
            'reference' => $reference,

            'companyName' => $companyName,

            'userName' => $userName,

            'firstname' => $firstname,

            'lastname' => $lastname,

            'tel' => $tel,
            
            'outUsa' => $outUsa,

        );



        $fedex_connect_arr['currentStep'] = 2;





        // IsValidAddressFrom: true, IsValidAddressTo

        // $checkConnect1 = json_decode($fedex_connect_arr['connect1'][0]->IsValidAddressFrom);

        // $checkConnect2 = json_decode($fedex_connect_arr['connect1'][0]->IsValidAddressTo);

        // {headers: {}, original: {success: false, data: "Invalid zipcode or address !"}, exception: null}

        $cartClass = new cart;

        $session = $cartClass->retreive_session();

        $docCount = $session['user']['selectedUserData']['Count'];
        $twoDaysRate = 20 + (1 * ($docCount - 1));
        $nextDayRate = 35 + (5 * ($docCount - 1));

       

            $fedex_connect_arr['rate_from'] = [$twoDaysRate, $nextDayRate];

            $fedex_connect_arr['rate_to'] = [$twoDaysRate, $nextDayRate];



            foreach ($fedex_connect_arr as $key => $value) {

                # code...

                $cartClass->create_session($key, $value);

            }

            if (in_array($state, ["Puerto Rico", "Alaska", "Hawaii"])) {
                $_SESSION['portorico'] = 1;
            } else {
                if (isset($_SESSION['portorico'])) {
                    // Remove a key from $_SESSION
                    unset($_SESSION['portorico']);
                }
            }

            

            

            $fedex_connect_arr['error'] = '';

            $fedex_connect_arr['url'] = site_url() . '/payment';

            

            wp_send_json($fedex_connect_arr, 200);

    

        

    }



    public function validate_shipping() {

        

        $cartClass = new cart;

        $session = $cartClass->retreive_session();

        $shipping = [];

        $shipping['shipping'] = $_POST['shipping'];
        $shipping['international']['nameinternational'] = (isset($_POST['nameinternational'])) ? $_POST['nameinternational'] : "";
        $shipping['international']['companyNameinternational'] = (isset($_POST['companyNameinternational'])) ? $_POST['companyNameinternational'] : "";
        $shipping['international']['addressinternational'] = (isset($_POST['addressinternational'])) ? $_POST['addressinternational'] : "";
        $shipping['international']['addressinternational2'] = (isset($_POST['addressinternational2'])) ? $_POST['addressinternational2'] : "";
        $shipping['international']['cityinternational'] = (isset($_POST['cityinternational'])) ? $_POST['cityinternational'] : "";
        $shipping['international']['internationalAddress51'] = (isset($_POST['internationalAddress51'])) ? $_POST['internationalAddress51'] : "";
        $shipping['international']['countryinternational'] = (isset($_POST['countryinternational'])) ? $_POST['countryinternational'] : "";
        $shipping['international']['countryCode'] = (isset($_POST['countryCode'])) ? $_POST['countryCode'] : "";
        $shipping['international']['zipcodeinternational'] = (isset($_POST['zipcodeinternational'])) ? $_POST['zipcodeinternational'] : "";
        $shipping['international']['phoneinternational'] = (isset($_POST['phoneinternational'])) ? $_POST['phoneinternational'] : "";

        $shipping['currentStep'] = 3;

        $fedexFee = 0;

        if (!in_array("own", $shipping['shipping'])) {

            // 1dayfrom
            // 2dayfrom
            // 1dayto
            // 2dayto
            if(in_array("2dayfrom", $shipping['shipping'])) {

                $fedexFee += $session['user']['rate_from'][0];

            } else if (in_array("1dayfrom", $shipping['shipping'])) {

                $fedexFee += $session['user']['rate_from'][1];

            }
            if(in_array("2dayto", $shipping['shipping'])) {

                $fedexFee += $session['user']['rate_to'][0];

            } else if (in_array("1dayto", $shipping['shipping'])) {

                $fedexFee += $session['user']['rate_to'][1];

            } else if (in_array("international", $shipping['shipping'])) {

                $fedexFee += 65;

            }

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee + $fedexFee;

        } else {

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee;

        }

        $feeHandeling = $totalFee * .05;

        $shipping['feeFedex'] = $fedexFee;

        $shipping['feeService'] = $serviceFee;

        $shipping['feeHandeling'] = $feeHandeling;

        foreach ($shipping as $key => $value) {

            $cartClass->create_session($key, $value);

        }

        wp_send_json($shipping, 200);

    }



    public function connectFedexExternalApiBack($url, $address, $zipcode, $companyName, $userName, $tel, $priority){

        

        $urlRetrieve = 'http://api.trackusl.com/api/Fedex/RetrieveFedexAddress';

        $fedex_website_address = wp_remote_post( $urlRetrieve, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  array("" => 2),

            'cookies'     => array()

            )

        );

        $cartClass = new cart;

        $session = $cartClass->retreive_session();

        $address_status = $fedex_website_address['response']['code'];

        $address_response = json_decode($fedex_website_address['body']);

        $data = json_encode(array(

            "SenderAddress"        => $address_response->SenderStreetLines,

            "SenderZipCode"        => $address_response->SenderPostalCode,

            "SenderState"          => 0,

            "SenderCity"           => 0,

            "SenderCompanyName"    => $address_response->SenderCompanyName,

            "SenderPersonName"     => "",

            "SenderPhoneNumber"    => $address_response->SenderPhoneNumber,

            "ReceiptAddress"       => (isset($session['user']['shippingTo']['address'])) ? $session['user']['shippingTo']['address'] : $address,

            "ReceiptZipCode"       => (isset($session['user']['shippingTo']['zipcode'])) ? $session['user']['shippingTo']['zipcode'] : $zipcode,

            "ReceiptState"         => 0,

            "ReceiptCity"          => 0,

            "ReceiptCompanyName"   => (isset($session['user']['shippingTo']['companyName'])) ? $session['user']['shippingTo']['companyName'] : $companyName,

            "ReceiptPersonName"    => (isset($session['user']['shippingTo']['firstname'])) ? $session['user']['shippingTo']['firstname'] : $userName,

            "ReceiptPhoneNumber"   => (isset($session['user']['shippingTo']['phone'])) ? $session['user']['shippingTo']['phone'] : $tel,

            "WebSiteId"            => 2,

            "FromUser"             => true,

            "ToUser"               => false,

            "CountryText"          => "USA",

            "PRIORITY_OVERNIGHT"   => $priority,

            "Email"				   => null,

            "Username"			   => null,

            "InvoiceNumber"		   => null,

            "AuthorizeNumber"	   => null,

        ));

        $ch = curl_init();

 

        // Return Page contents.

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        

        //grab URL and pass it to the variable.

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $status = curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);





        

			

    

        $response = json_decode($result);

        if($status == 200) {

            if($url == 'http://api.trackusl.com/api/FedexExternal/ValidateFedexAddress'){

                if($response->IsFrom != true || $response->IsValidAddressFrom != true) {

                    return wp_send_json([

                        'success' => false,

                        'data' => 'Invalid zipcode or address !'

                    ], 200);

                } else {

                    return $response;

                }

            } else{

                return $response;

            }

        } elseif($status == 400) {

            print_r('400 client error');

            exit;

        } elseif ($status == 400 || $status == 500) {

            print_r('bad response');

            exit;

        } elseif($status == 500) {

            print_r('500 internal server error');

            exit;

        }

    }



    public function retrieveWebsiteData() {

        $urlRetrieve = 'http://api.trackusl.com/api/Fedex/RetrieveFedexAddress';

        $fedex_website_address = wp_remote_post( $urlRetrieve, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  array("" => 2),

            'cookies'     => array()

            )

        );

        

        $address_status = $fedex_website_address['response']['code'];

        $address_response = json_decode($fedex_website_address['body']);



        return $address_response;

    }



    //to create envelope back to user

    public function connectFedexExternalApi($url, $address, $zipcode, $companyName, $userName, $tel, $priority){

        $urlRetrieve = 'http://api.trackusl.com/api/Fedex/RetrieveFedexAddress';

        $fedex_website_address = wp_remote_post( $urlRetrieve, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  array("" => 2),

            'cookies'     => array()

            )

        );

        
        

        $address_status = $fedex_website_address['response']['code'];

        $address_response = json_decode($fedex_website_address['body']);


        
        

            $data = json_encode(array(

                "SenderAddress"        => $address,

                "SenderZipCode"        => $zipcode,

                "SenderState"          => 0,

                "SenderCity"           => 0,

                "SenderCompanyName"    => $companyName,

                "SenderPersonName"     => $userName,

                "SenderPhoneNumber"    => $tel,

                "ReceiptAddress"       => $address_response->SenderStreetLines,

                "ReceiptZipCode"       => $address_response->SenderPostalCode,

                "ReceiptState"         => 0,

                "ReceiptCity"          => 0,

                "ReceiptCompanyName"   => $address_response->SenderCompanyName,

                "ReceiptPersonName"    => "",

                "ReceiptPhoneNumber"   => $address_response->SenderPhoneNumber,

                "WebSiteId"            => 2,

                "FromUser"             => true,

                "ToUser"               => false,

                "CountryText"          => "USA",

                "PRIORITY_OVERNIGHT"   => $priority,

                "Email"				   => null,

                "Username"			   => null,

                "InvoiceNumber"		   => null,

                "AuthorizeNumber"	   => null,

            ));





        $ch = curl_init();



        // Return Page contents.

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        

        //grab URL and pass it to the variable.

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $status = curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

    

    

            

                

        

        $response = json_decode($result);

        if($status == 200) {

            if($url == 'http://api.trackusl.com/api/FedexExternal/ValidateFedexAddress'){

                if($response->IsFrom != true || $response->IsValidAddressFrom != true) {

                    return wp_send_json([

                        'success' => false,

                        'data' => 'Invalid zipcode or address !'

                    ], 200);

                } else {

                    return $response;

                }

            } else{

                return $response;

            }

        } elseif($status == 400) {

            print_r('400 client error');

            exit;

        } elseif ($status == 400 || $status == 500) {

            print_r('bad response');

            exit;

        } elseif($status == 500) {

            print_r('500 internal server error');

            exit;

        }

    }
    
    
    public function connectFedexExternalApiInternational($url, $address, $zipcode, $companyName, $userName, $tel, $priority, $address2, $country, $countryCode, $city){
        
        $urlRetrieve = 'http://api.trackusl.com/api/Fedex/RetrieveFedexAddress';

        $fedex_website_address = wp_remote_post( $urlRetrieve, array(

            'method'      => 'POST',

            'timeout'     => 45,

            'blocking'    => true,

            'body'        =>  array("" => 2),

            'cookies'     => array()

            )

        );

        $cartClass = new cart;

        $session = $cartClass->retreive_session();

        $address_status = $fedex_website_address['response']['code'];

        $address_response = json_decode($fedex_website_address['body']);

            $data = json_encode(array(

                "SenderAddress" => $address_response->SenderStreetLines,
                "SenderZipCode" => $address_response->SenderPostalCode,
                "SenderCity" => "ANNAPOLIS",
                "SenderState" => "MD",
                "SenderCompanyName" => $address_response->SenderCompanyName,
                "SenderPersonName" => "",
                "SenderPhoneNumber" => $address_response->SenderPhoneNumber,
                "SenderCountry" => "USA",
                "SenderCountryCode" => "US",
                "ReceiptAddress" => (isset($session['user']['international']['addressinternational']) && $session['user']['international']['addressinternational'] != "") ? $session['user']['international']['addressinternational'] : $address,
                "ReceiptAddress2" => (isset($session['user']['international']['addressinternational2']) && $session['user']['international']['addressinternational2'] != "") ? $session['user']['international']['addressinternational2'] : $address2,
                "ReceiptZipCode" => (isset($session['user']['international']['zipcodeinternational']) && $session['user']['international']['zipcodeinternational'] != "") ? $session['user']['international']['zipcodeinternational'] : ((isset($zipcode) && $zipcode != "") ? $zipcode : "99999"),
                "ReceiptCity" => (isset($session['user']['international']['cityinternational']) && $session['user']['international']['cityinternational'] != "") ? $session['user']['international']['cityinternational'] : $city,
                "ReceiptState" => "",
                "ReceiptCompanyName" => (isset($session['user']['international']['companyNameinternational']) && $session['user']['international']['companyNameinternational'] != "") ? $session['user']['international']['companyNameinternational'] : $companyName,
                "ReceiptPersonName" => (isset($session['user']['international']['nameinternational']) && $session['user']['international']['nameinternational'] != "") ? $session['user']['international']['nameinternational'] : $userName,
                "ReceiptPhoneNumber" => $tel,
                "ReceiptCountry" => (isset($session['user']['international']['countryinternational']) && $session['user']['international']['countryinternational'] != "") ? $session['user']['international']['countryinternational'] : $country,
                "ReceiptCountryCode" => (isset($session['user']['international']['countryCode']) && $session['user']['international']['countryCode'] != "") ? $session['user']['international']['countryCode'] : $countryCode,
                "WebSiteId" => 2,
                "FromUser" => false,
                "ToUser" => true,
                "CountryText" => $country,
                "PRIORITY_OVERNIGHT" => false,
                "international" => true,
                "Email" => null,
                "UserName" => null,
                "InvoiceNumber" => "",
                "AuthorizeNumber" => null,
                "ParticipantTypeFromId" => null,
                "ParticipantTypeToId" => null,
                "FedexCode" => null

            ));





        $ch = curl_init();



        // Return Page contents.

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        

        //grab URL and pass it to the variable.

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $status = curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

    

    

            

                

        

        $response = json_decode($result);

        if($status == 200) {

            if($url == 'http://api.trackusl.com/api/FedexExternal/ValidateFedexAddress'){

                if($response->IsFrom != true || $response->IsValidAddressFrom != true) {

                    return wp_send_json([

                        'success' => false,

                        'data' => 'Invalid zipcode or address !'

                    ], 200);

                } else {
                    
                    return $response;

                }

            } else{
                return $response;

            }

        } elseif($status == 400) {

            print_r('400 client error');

            exit;

        } elseif ($status == 400 || $status == 500) {

            print_r('bad response');

            exit;

        } elseif($status == 500) {

            print_r('500 internal server error');

            exit;

        }

    }



    

    public function payment_process() {

        $paymentUrl = 'http://test.uslegalization.com/api/AuthorizeNet/Transaction';

        $doubleUrl = 'http://apipayment.uslegalization.com/api/Payment/CheckDoublePayment';



        $amount = 0;



        $cart = new cart;

        $session = $cart->retreive_session();

        $zipcode = $session['user']['userInfo']['zipcode'];

        $email = $session['user']['userInfo']['email'];

        $shipping = $session['user']['shipping'];



        $serviceFee = $session['user']['serviceInfo']['totalfee'];



        $fedexFee = 0;

        if (!in_array("own", $shipping)) {

            // 1dayfrom
            // 2dayfrom
            // 1dayto
            // 2dayto
            if(in_array("2dayfrom", $shipping)) {

                $fedexFee += $session['user']['rate_from'][0];

            } else if (in_array("1dayfrom", $shipping)) {

                $fedexFee += $session['user']['rate_from'][1];

            }
            if(in_array("2dayto", $shipping)) {

                $fedexFee += $session['user']['rate_to'][0];

            } else if (in_array("1dayto", $shipping)) {

                $fedexFee += $session['user']['rate_to'][1];

            } else if (in_array("international", $shipping)) {

                $fedexFee += 65;

            }

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee + $fedexFee;

        } else {

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee;

        }

        $feeHandeling = $totalFee * .05;

        $amount += $totalFee;//total fee
        $amount += $feeHandeling;//handling fee

        $cart->create_session('paymentChoice', $_POST['paymentChoice']);



        $generatedNumber = $this->getNumberGenerated();



        if ($_POST['paymentChoice'] == 1) {

        

            $data = array(

                "Cardno" => $_POST['creditNumber'],

                "DollarAmount" => $amount,

              	"Cvv" => $_POST['cvv'],

                "ExpireDate" => $_POST['creditMonth'] . $_POST['creditYear'],

                "HolderName" => $_POST['creditName'], 

                "PayInvoice" => "",

                "RequestNo" => $generatedNumber,

                'HFRequestNo' => $generatedNumber,

              	'Description'   => 'saudiembassy',

                "Month" => $_POST['creditMonth'],

                "Year" => $_POST['creditYear'],

                "ZipCode" => $zipcode,

                "Email" => $email,

                "WebsiteId" => 2

            );

            try {

                $processResponse = wp_remote_post( $doubleUrl, array(

                    'method'      => 'POST',

                    'timeout'     => 45,

                    'blocking'    => true,

                    'body'        =>  $data,

                    'cookies'     => array()

                    )

                );

                $userData = json_decode($processResponse['body']);

    

                if (isset($_POST['doubleOrderTrue'])) {

                    if ($_POST['doubleOrderTrue'] == true) {

                        $userData->IsDouble = false;

                    }

                }

                if ($userData->IsDouble == true) {

                    $response = array(

                        "Aproved" =>false,

                        "isdouble" => true,

                        "EXact_Message" =>"You have already created an order today \n Do you want to create another order?",

                    );



                    wp_send_json($response, 200);

                } else {

                    try {

                        $processResponse = wp_remote_post( $paymentUrl, array(

                            'method'      => 'POST',

                            'timeout'     => 45,

                            'blocking'    => true,

                            'body'        =>  $data,

                            'cookies'     => array()

                            )

                        );

                        $userData = json_decode($processResponse['body']);

            

                        if ($userData->Approved == false) {

                            if ($shipping != "own") {

        

                                $order_data = $this->create_fedex($generatedNumber);



                                $url3 = 'http://apipayment.uslegalization.com/api/FirstData/Update/'.$processResponse->PaymentId;



                                $data = [

                                    'Cardno' => "",

                                    'DollarAmount' => $amount,

                                    'ExpireDate' => $_POST['creditMonth'] . $_POST['creditYear'],

                                    'HolderName' => $_POST['creditName'], 

                                    'PayInvoice' => 0,

                                    'InvoiceNo' => $generatedNumber,

                                    'Month' => $_POST['creditMonth'],

                                    'Year' => $_POST['creditYear'],

                                    'ZipCode' => $zipcode,

                                    'Email' => $email,

                                    'Description'   => 'uaeembassy.net',

                                    'WebsiteId' => 2,

                                    'HFRequestNo' => $generatedNumber,

                                    'TrackingIn' => (isset($order_data['fedex_tracking_in'])) ? $order_data['fedex_tracking_in'] : null,

                                    'TrackingInFile' => (isset($order_data['fedex_file_path_from'])) ? $order_data['fedex_file_path_from']: "",

                                    'TrackingOut' => (isset($order_data['fedex_tracking_out'])) ? $order_data['fedex_tracking_out'] : null,

                                    'TrackingOutFile' => (isset($order_data['fedex_file_path_to'])) ? $order_data['fedex_file_path_to']: "",

                                    'Invoice' => ""

                                ];



                                $updatePayment = wp_remote_post( $url3, array(

                                    'method'      => 'POST',

                                    'timeout'     => 45,

                                    'blocking'    => true,

                                    'body'        =>  $data,

                                    'cookies'     => array()

                                    )

                                );

                                $updatePayment2 = json_decode($updatePayment['body']);



                                wp_send_json($order_data, 200);

                            } else {

                                $cart->remove_session_items('international');
                                $cart->remove_session_items('shippingTo');

                                $finishOrder = $this->finish_order_without_fedex($generatedNumber);

                                $order_data = $finishOrder[0];

                                $userData = $finishOrder[1];



                                $url3 = 'http://apipayment.uslegalization.com/api/FirstData/Update/'.$processResponse->PaymentId;



                                $data = [

                                    'Cardno' => "",

                                    'DollarAmount' => $amount,

                                    'ExpireDate' => $_POST['creditMonth'] . $_POST['creditYear'],

                                    'HolderName' => $_POST['creditName'], 

                                    'PayInvoice' => 0,

                                    'InvoiceNo' => $generatedNumber,

                                    'Month' => $_POST['creditMonth'],

                                    'Year' => $_POST['creditYear'],

                                    'ZipCode' => $zipcode,

                                    'Email' => $email,

                                    'Description'   => 'uaeembassy.net',

                                    'WebsiteId' => 9,

                                    'HFRequestNo' => $generatedNumber,

                                    'TrackingIn' => (isset($order_data['fedex_tracking_in'])) ? $order_data['fedex_tracking_in'] : null,

                                    'TrackingInFile' => (isset($fedexFile['fedex_file_path_from'])) ? $fedexFile['fedex_file_path_from']: "",

                                    'TrackingOut' => (isset($order_data['fedex_tracking_out'])) ? $order_data['fedex_tracking_out'] : null,

                                    'TrackingOutFile' => (isset($fedexFile['fedex_file_path_to'])) ? $fedexFile['fedex_file_path_to']: "",

                                    'Invoice' => ""

                                ];



                                $updatePayment = wp_remote_post( $url3, array(

                                    'method'      => 'POST',

                                    'timeout'     => 45,

                                    'blocking'    => true,

                                    'body'        =>  $data,

                                    'cookies'     => array()

                                    )

                                );

                                $updatePayment2 = json_decode($updatePayment['body']);



                                wp_send_json($userData, 200);

                                // $userData = json_decode($processResponse['body']);

                            }

                        } else {

                            $response = array(

                                "Aproved" =>false,

                                "EXact_Message" => $userData->ErrorMessage,

                            );

        

                            wp_send_json($response, 200);

                        }

                    } catch (Exception $e) {

                        //throw $th;

                        $userData = $e->getMessage();

                    }

                }

            } catch (Exception $e) {

                //throw $th;

                $userData = $e->getMessage();

            }

        } else {

            if ($shipping != "own") {

                $this->create_fedex($generatedNumber);

            } else {
                $cart->remove_session_items('international');
                $cart->remove_session_items('shippingTo');
                $finishOrder = $this->finish_order_without_fedex($generatedNumber);

                $order_data = $finishOrder[0];

                $userData = $finishOrder[1];

                wp_send_json($userData, 200);

                $userData = array(

                    "Aproved" =>false,

                    "EXact_Message" =>"Order has been completed successfully.",

                );

            }

        }

        

        wp_send_json($userData, 200);

    

    

    }



    public function create_fedex($generatedNumber) {



        $cart = new cart;

        $api_data = new api_data;

        $priority = false;

        $session = $cart->retreive_session();

        $address = $session['user']['userInfo']['address'];

        $zipcode = $session['user']['userInfo']['zipcode'];

        $city = $session['user']['userInfo']['city'];

        $state = $session['user']['userInfo']['state'];

        $email = $session['user']['userInfo']['email'];

        $companyName = $session['user']['userInfo']['companyName'];

        $userName = $session['user']['userInfo']['userName'];


        $tel = $session['user']['userInfo']['tel'];
        
        // additional for international
        $address2 = (isset($session['user']['userInfo']['address2'])) ? $session['user']['userInfo']['address2'] : "";
        $country = (isset($session['user']['userInfo']['country'])) ? $session['user']['userInfo']['country'] : "";
        $countryCode = (isset($session['user']['userInfo']['countryCode'])) ? $session['user']['userInfo']['countryCode'] : "";

        $shipping = $session['user']['shipping'];

        $payment = $_POST['paymentChoice'];

        $service_object = $session['user']['serviceInfo']['table'];



        $cart->create_session('paymentChoice', $payment);



        $fedexFee = 0;

        if (!in_array("own", $shipping)) {

            // 1dayfrom
            // 2dayfrom
            // 1dayto
            // 2dayto
            if(in_array("2dayfrom", $shipping)) {

                $fedexFee += $session['user']['rate_from'][0];

            } else if (in_array("1dayfrom", $shipping)) {

                $fedexFee += $session['user']['rate_from'][1];

            }
            if(in_array("2dayto", $shipping)) {

                $fedexFee += $session['user']['rate_to'][0];
                $session['user']['international'];
                $cart->remove_session_items('international');

            } else if (in_array("1dayto", $shipping)) {
                $session['user']['international'];
                $cart->remove_session_items('international');
                $fedexFee += $session['user']['rate_to'][1];
                
            } else if (in_array("international", $shipping)) {
                
                $session['user']['shippingTo'];
                $cart->remove_session_items('shippingTo');
                $fedexFee += 65;

            }

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee + $fedexFee;

        } else {

            $cart->remove_session_items('international');
            $cart->remove_session_items('shippingTo');

            $serviceFee = $session['user']['serviceInfo']['totalfee'];

            $totalFee = $serviceFee;

        }

        $feeHandeling = $totalFee * .05;

        



        $url = 'http://api.trackusl.com/api/FedexExternal/SubmitFedexShipping';


        $fedex_connect_arr = array();

        if(in_array("2dayfrom", $shipping)) {

            $priority = false;
            $fedex_connect_arr['create_from'] = $this->connectFedexExternalApi($url, $address, $zipcode, $companyName, $userName, $tel, $priority);

        } else if (in_array("1dayfrom", $shipping)) {
            
            $priority = true;
            $fedex_connect_arr['create_from'] = $this->connectFedexExternalApi($url, $address, $zipcode, $companyName, $userName, $tel, $priority);

        }
        
            $time = 0;
            $totalFee = 0;
            foreach ($session['user']['serviceInfo']['table'] as $key => $value) {
                # code...
                $time += $value->Time;
                $totalFee += $value->TotalFee;
            }

        $editShippingFlag = false;
        if (isset($session['user']['shippingTo']['address'])) {
            if ($session['user']['shippingTo']['address'] != $address) {
                $editShippingFlag = true;
            }
        }
        if ($time <= 15 || $editShippingFlag == true) {
            if(in_array("2dayto", $shipping)) {
    
                $priority = false;
                $fedex_connect_arr['create_to'] = $this->connectFedexExternalApiBack($url, $address, $zipcode, $companyName, $userName, $tel, $priority);
    
            } else if (in_array("1dayto", $shipping)) {
    
                $priority = true;
                $fedex_connect_arr['create_to'] = $this->connectFedexExternalApiBack($url, $address, $zipcode, $companyName, $userName, $tel, $priority);
    
            }
        }
        if (in_array("international", $shipping)) {
            $url ='http://fedex1.uslegalization.com/api/FedexExternal/SubmitFedexInternationalShipping';
            $priority = true;
            $fedex_connect_arr['create_to'] = $this->connectFedexExternalApiInternational($url, $address, $zipcode, $companyName, $userName, $tel, $priority, $address2, $country, $countryCode, $city);

        }



        

        if (isset($fedex_connect_arr['create_from'])) {
            $response = array(
    
                "TrackingIn" => $fedex_connect_arr['create_from']->TrackingIn,
    
                "TrackingOut" => null,
                
                "FromImgByte" => $fedex_connect_arr['create_from']->FromImgByte,
                
                "ToImgByte" => null,
                
                "Error" => $fedex_connect_arr['create_from']->Error,
                
            );
            
            $fedex_file_from = $this->generateFedexPdf($response);
        } else {
            $fedex_file_from = null;
        }
        
        
        
        if (isset($fedex_connect_arr['create_to'])) {
            $response = array(
    
                "TrackingIn" => $fedex_connect_arr['create_to']->TrackingIn,
    
                "TrackingOut" => null,
    
                "FromImgByte" => $fedex_connect_arr['create_to']->FromImgByte,
    
                "ToImgByte" => null,
    
                "Error" => $fedex_connect_arr['create_to']->Error,
    
            );
    
            $fedex_file_to = $this->generateFedexPdf($response);
        } else {
            $fedex_file_to = null;
        }



        

        $order_data = array();

        

        $order_data['feeFedex'] = $session['user']['feeFedex'];

        $order_data['feeService'] = $session['user']['serviceInfo']['totalfee'];

        $order_data['feeHandeling'] = $feeHandeling;



        $order_data['invoice'] = true;

        $order_data['Aproved'] = true;

        $order_data['priority'] = $priority;

        $order_data['username'] = $userName;

        $order_data['email'] = $email;

        $order_data['tel'] = $tel;

        $order_data['shipping'] = $shipping;

        $order_data['payment'] = $payment;

        $order_data['fedex_file_path_from'] = $fedex_file_from;

        $order_data['fedex_file_path_to'] = $fedex_file_to;

        $order_data['fedex_tracking_in'] = (isset($fedex_connect_arr['create_from'])) ? $fedex_connect_arr['create_from']->TrackingIn : "";

        $order_data['fedex_tracking_out'] = (isset($fedex_connect_arr['create_to'])) ? $fedex_connect_arr['create_to']->TrackingIn : "";

        $order_data['order_date'] = date('m-d-Y h:i:s A');

        $order_data['fee'] = $totalFee;

        $order_data['service_object'] = $service_object;



        $cart->create_session('fedexData', $order_data);



        $api_data->save_order_api($generatedNumber);

        $saveOrder = $this->save_order($order_data);



        



        return $order_data;

    }



    //generate pdf files after create fedex ticket

    public function generateFedexPdf($fedexResponse) {

        $FromImgByte = $fedexResponse['FromImgByte'];

        // $ToImgByte = $fedexResponse['ToImgByte'];

       	$TrackingIn = $fedexResponse['TrackingIn'];

        // $TrackingOut = $fedexResponse['TrackingOut'];



        // $order_file_path = 'fedex_tickets/'.date('m-d-Y').'/'.'ticket_order_'.$order_id.'/';

        $date  = date('m-d-Y');

        $file_path = ABSPATH.'/fedex_tickets/'.$date.'/';

        $order_file_path = $file_path.'ticket_orders/';

        

        $pdf_file_from = bin2hex(openssl_random_pseudo_bytes(32)).'.pdf';

        // $pdf_file_to = bin2hex(openssl_random_pseudo_bytes(32)).'.pdf';



        $fedexImgFrom = base64_decode($FromImgByte);

     	// $fedexImgTo = base64_decode($ToImgByte);

         

        if (!is_dir($file_path)) {

            // dir doesn't exist, make it

            mkdir($order_file_path, 0755, true);

            file_put_contents($order_file_path.$pdf_file_from, $fedexImgFrom);

            // file_put_contents($order_file_path.$pdf_file_to, $fedexImgTo);

            chmod($order_file_path.$pdf_file_from,0755);

            // chmod($order_file_path.$pdf_file_to,0755);

        } else {

            

            file_put_contents($order_file_path.$pdf_file_from, $fedexImgFrom);

            // file_put_contents($order_file_path.$pdf_file_to, $fedexImgTo);

            chmod($order_file_path.$pdf_file_from,0755);

            // chmod($order_file_path.$pdf_file_to,0755);

        }



        return site_url() . '/fedex_tickets/'.$date.'/ticket_orders/' . $pdf_file_from;

    }


    function add_return_shipping2() {
        $cartClass = new cart;
        $shippingTo = [
            'firstname' => $_POST['firstname'],
            'companyName' => $_POST['companyName'],
            'address' => $_POST['address'],
            'city' => $_POST['city'],
            'state' => $_POST['state'],
            'zipcode' => $_POST['zipcode'],
            'phone' => $_POST['phone']
        ];
        $cartClass->create_session("shippingTo", $shippingTo);
    }


    public function finish_order_without_fedex($generatedNumber) {

        $cart = new cart;

        $api_data = new api_data;



        $session = $cart->retreive_session();

        $address = $session['user']['userInfo']['address'];

        $zipcode = $session['user']['userInfo']['zipcode'];

        $city = $session['user']['userInfo']['city'];

        $state = $session['user']['userInfo']['state'];

        $email = $session['user']['userInfo']['email'];

        $companyName = $session['user']['userInfo']['companyName'];

        $userName = $session['user']['userInfo']['userName'];

        $tel = $session['user']['userInfo']['tel'];

        $shipping = $session['user']['shipping'];

        $service_object = $session['user']['serviceInfo']['table'];

        $totalFee = $session['user']['serviceInfo']['totalfee'];

        $payment = $_POST['paymentChoice'];



        

        

        $order_data = array();



        $order_data['feeFedex'] = 0;

        $order_data['Aproved'] = true;

        $order_data['username'] = $userName;

        $order_data['email'] = $email;

        $order_data['tel'] = $tel;

        $order_data['shipping'] = $shipping;

        $order_data['payment'] = $payment;

        $order_data['fedex_file_path_from'] = NULL;

        $order_data['fedex_file_path_to'] = NULL;

        $order_data['fedex_tracking_in'] = NULL;

        $order_data['fedex_tracking_out'] = NULL;

        $order_data['order_date'] = date('m-d-Y h:i:s A');

        $order_data['fee'] = $totalFee;

        $order_data['service_object'] = $service_object;

        $order_data['message'] ="Order has been completed successfully.";



        $cart->create_session('fedexData', $order_data);



        $api_data->save_order_api($generatedNumber);

        $saveOrder = $this->save_order($order_data);



        $userData = array(

            "Aproved" =>false,

            "invoice" => true,

            "EXact_Message" =>"Order has been completed successfully.",

        );



        return array($order_data, $userData);

    }





    public function save_order($order_data) {



        global $wpdb;

        $tablename = 'orders';

        $cartClass = new cart;



        date_default_timezone_set('Africa/Cairo');



        $save = $wpdb->query(

                    $wpdb->prepare(

                        $wpdb->insert( $tablename, array(

                        'username' => $order_data['username'],

                        'email' => $order_data['email'],

                        'tel' => $order_data['tel'],

                        'fedex_file_path_from' => $order_data['fedex_file_path_from'],

                        'fedex_file_path_to' => $order_data['fedex_file_path_to'],

                        'fedex_tracking_in' => $order_data['fedex_tracking_in'],

                        'fedex_tracking_out' => $order_data['fedex_tracking_out'],

                        'order_date' => $order_data['order_date'],

                        'fee' => $order_data['fee'],

                        'shipping_id' => $order_data['shipping'],

                        'payment_id' => $order_data['payment'],

                        'service_object' => json_encode($order_data['service_object']),

                    )

                )

            )

        );

        // // if($wpdb->last_error !== '') :

        //     $erro = $wpdb->print_error();

        // // endif;

        // wp_send_json($wpdb->last_query , 200);

        session_destroy();

        



        // $cartClass->create_session('lastOrder22', array());

        return $save;

    }

}