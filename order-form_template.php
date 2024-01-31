<?php // Template Name: Invoice template
session_start();


@$session = retreive_session();

$websiteData = retrieveWebsiteData();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" class="finalForm">
                <header class="no-print">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="file-name">
                                Please print this page and include it in your package with your document.
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="icons">
                                <i class="fas fa-print" onclick="window.print();"></i>
                            </div>
                        </div>
                    </div>

                </header>
                <div class="bordered">
                    <div class="header">
                        <div class="row">
                            <div class="col-xs-4"> <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo.png" alt="US Apostille logo" class=""></div>
                            <div class="col-xs-6">

                                <h2>Invoice for expedited services</h2>
                                <ul>
                                    <li><?php echo  $websiteData->SenderStreetLines . ", " . $websiteData->SenderCity . ", " . $websiteData->SenderStateOrProvinceCode . " " . $websiteData->SenderPostalCode; ?></li>
                                    <li><span style="margin-right: 6px;display: inline-block;">Phone:</span><?php echo $websiteData->SenderPhoneNumber; ?></li>
                                </ul>
                            </div>
                            <div class="col-xs-2">
                                <img src="https://www.usapostille.com/wp-content/themes/usApostille/images/codeBar.png" alt="barcode">
                            </div>
                        </div>
                        <h3>bill &amp; ship to</h3>
                        <div class="row">
                            <div class="col-xs-4 p-0">


                                <div class="block">

                                    <ul>
                                        <li class="spncompsend"></li>
                                        <br>
                                        <li class="senderfromfirstname"><?php echo $session['lastOrder22']['name']; ?></li>
                                        <br>
                                        <li class="senderfromstreetaddress"><?php echo $session['lastOrder22']['address']; ?></li>
                                        <br>
                                        <li class="senderFromCityStateZipcode"><?php echo $session['lastOrder22']['city']; ?> <?php echo $session['lastOrder22']['state']; ?> <?php echo $session['lastOrder22']['zipcode']; ?></li>
                                        <br>
                                        <li class="senderfromphone"><?php echo $session['lastOrder22']['phone']; ?></li>
                                        <li class="senderfromemail"><?php echo $session['lastOrder22']['email']; ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                            $date = date('d m y');
                            $time = 0;
                            foreach ($session['lastOrder22']['services'] as $key => $value) {
                                # code...
                                $time += $value->Time;
                            }
                            ?>

                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="">Invoice No : </label>
                                        <span style="color: #b32134;" class="invoice_num"><?php echo $session['lastOrder22']['invoiceNo']; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Date : </label>
                                        <span style="color: #b32134;" class="date_now"><?php echo date("M d Y"); ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. of Docs : </label>
                                        <span style="color: #b32134;" class="doc_count countofdoc-invoice"><?php echo $session['lastOrder22']['docCount']; ?></span>
                                    </div>

                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo (isset($session['lastOrder22']['trackingIn']) && $session['lastOrder22']['trackingIn'] != null && $session['lastOrder22']['trackingIn'] != "") ? "" : "display: none;" ?>">
                                        <label for="">Tracking In :</label>
                                        <span class="fed_tracking_in" style="color: #b32134;"><?php echo $session['lastOrder22']['trackingIn']; ?></span>
                                    </div>
                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo (isset($session['lastOrder22']['trackingOut']) && $session['lastOrder22']['trackingOut'] != null && $session['lastOrder22']['trackingOut'] != "") ? "" : "display: none;" ?>">
                                        <label for="">Tracking Out :</label>
                                        <span class="fed_tracking_out" style="color: #b32134;"><?php echo $session['lastOrder22']['trackingOut']; ?></span>
                                    </div>
                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo ((isset($session['lastOrder22']['trackingIn']) && $session['lastOrder22']['trackingIn'] != null && $session['lastOrder22']['trackingIn'] != "") || (isset($session['lastOrder22']['trackingOut']) && $session['lastOrder22']['trackingOut'] != null && $session['lastOrder22']['trackingOut'] != "")) ? "" : "display: none;" ?>">
                                        <label for="">Carrier :</label>
                                        <span class="shipping-carrier" style="color: #b32134;">FedEx</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Payment Method :</label>
                                        <span class="shipping-method-Payment-lable" style="color: #b32134;"><?php echo $session['lastOrder22']['paymentMethod']; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <span><b>Estimated Date to finish:</b></span><span class="day-mon-time" style="color: #b32134;"><?php echo date("M", strtotime(" + $time days")); ?></span> <span class="day-num-time" style="color: #b32134;"><?php echo date("d", strtotime(" + $time days")); ?></span> <span class="day-year-time" style="color: #b32134"><?php echo date("Y", strtotime(" + $time days")); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <main>
                        <h4>Request for use in the country of <span class="country-to-add">Egypt</span></h4>
                        <h4><?php echo $session['lastOrder22']['caseName']; ?></h4>
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
                                    <?php
                                    //code...
                                    $totalFee = 0;
                                    foreach ($session['lastOrder22']['services'] as $key => $value) {
                                        $totalFee += $value->TotalFee;
                                    ?>
                                        <tr>
                                            <td colspan="6" class="bl-1"><?php echo $value->Name; ?></td>
                                            <td><span class="doc_count"><?php echo $value->Count; ?> </span></td>
                                            <td><span class="doc"><?php echo $value->Fee; ?></span></td>
                                            <td><?php echo $value->TotalFee; ?></td>
                                        </tr>
                                    <?php
                                    }
                                    $feeFedex = (isset($session['lastOrder22']['feeFedex'])) ? $session['lastOrder22']['feeFedex'] : 0;
                                    if ($feeFedex != 0) {
                                    ?>

                                        <tr>
                                            <td colspan="6" class="white"></td>
                                            <td colspan="2" class="bl-1">FedEx Fee</td>
                                            <td><?php echo $feeFedex; ?></td>
                                        </tr>
                                    <?php $totalFee += $feeFedex;
                                    }

                                    if ($session['lastOrder22']['paymentMethod'] == "Credit") {
                                        $handlingFee = $totalFee * .05;
                                    ?>
                                        <tr>
                                            <td colspan="6" class="white"></td>
                                            <td colspan="2" class="bl-1">Handling Fee</td>
                                            <td><?php echo $handlingFee; ?></td>
                                        </tr>
                                    <?php
                                        $totalFee += $handlingFee;
                                    } ?>
                                </tbody>
                                <tbody class="invoice-table-body2">
                                    <tr>
                                        <td colspan="6" class="white"></td>
                                        <td colspan="2" class="bl-1">Total:</td>
                                        <td><span class="total_amount_fees"><?php echo $totalFee; ?></span></td>
                                    </tr>
                                </tbody>

                            </table>
                            <!--    <div class="comment">
                                <p>Please print this page and include it in your package with your document.</p>
                                <div class="fedex-comment"></div>
                            </div> -->
                        </div>
                    </main>
                </div>
            </form>
</body>
</html>