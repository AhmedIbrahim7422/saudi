<?php
// Template Name: payment
session_start();
get_header();

@$session = retreive_session();
if (!isset($session['user']['rate_from'])) {
    ?> 
    <section>
    <br><br><br><br>     <br><br>
        <div class="text-center">
            <h1>Please submit a document to access this page</h1>
            <a href="<?php echo site_url(); ?>"><button class="btn btn-primary confirm-purchase"> Home Page </button></a>
        </div>
    </section>
        <?php
} else {
    echo "<pre>";
    print_r($session['user']);
    echo "</pre>";
$totalFee = $session['user']['serviceInfo']['totalfee'] + $session['user']['rate_from']->PricesList[$shipping - 2]->FinalAmount + $session['user']['rate_to']->PricesList[$shipping - 2]->FinalAmount;
$handlingFee = $totalFee * .05;
$shipping = $session['user']['userInfo']['shipping'];
?>
    <section>
        <br><br><br><br>     <br><br>
        <div class="container ">
            <div id="payinfoDiv"class="container cont-data">
            
                <h2 class="stp-spn">Payment</h2>
                <span class="badge badge-warning text-left" style="text-align:left;color: #212529;background-color: #ffc107;display:block;margin:auto 0 5px auto;width:fit-content; font-size:1rem;">
                Service Fee: $<span><?php echo $session['user']['serviceInfo']['totalfee']; ?></span>
                <br>
                <?php 
                //code...
                if ($shipping != 1) {
                ?>
                FedEx Fee: $<span><?php echo $session['user']['rate_from']->PricesList[$shipping - 2]->FinalAmount + $session['user']['rate_to']->PricesList[$shipping - 2]->FinalAmount; ?></span>
                <br>
                <?php 
                //code...
                }
                ?>
                Handling Fee: $<span><?php echo $handlingFee; ?></span>
                <br>
                <br>
                Total Fee: $<span><?php echo $totalFee; ?></span>
                
            </span>
                <div class="row form-group">


                    <div class="col-sm-4" id="spncredit">
                        <input class="payment-method-check-box" type="radio" id="rdCredit" name="rdpay" value="1" required="" checked="checked">
                        <label class="valtyp-lbl" for="rdCredit">
                            Credit Card
                        </label>
                    </div>
                    <div class="col-sm-4" id="spnbilling">
                        <input class="payment-method-check-box" type="radio" id="rdBillirdBilling" name="rdpay" value="2" required="">
                        <label class="valtyp-lbl" for="rdBillirdBilling">
                            Billing
                        </label>
                    </div>
                    <div class="col-sm-4" id="spnCheck">
                        <input class="payment-method-check-box" type="radio" id="rdCheck" name="rdpay" value="3" required="">
                        <label class="valtyp-lbl" for="rdCheck">
                            Check
                        </label>
                    </div>




                </div>
                <br>
                <br>
                <div class="creditContent">
                    <div class="row  checkContent rdCredit" style="display: flex;">

                        <div id="divcredit">
                            <div class=" paymentMethod" style="display: block;">
                                <div class="block-content">

                                    <div class="row" >
                                        <div class="col-lg-7">
                                            <div class="creditCardForm">
                                                <div class="payment">
                                                    
                                                        <div class="form-group owner">
                                                            <label for="cardOwner">Owner</label>
                                                            <input type="text" class="form-control" id="cardOwner">
                                                        </div>
                                                
                                                        <div class="form-group" id="card-number-field">
                                                            <label for="cardNumber">Card Number</label>
                                                            <input type="text" class="form-control" id="cardNumber">
                                                        </div>
                                                        <label>Expiration Date</label>
                                                        <div class="row " style="margin-left: 0;">
                                                            <div class="col-md-6 p-0">
                                                                <div class="form-group" id="expiration-date" style="display: flex;">
                                                                
                                                                    <div class="row ml-0" style="margin-left: 0;">
                                                                        <div class="col-md-6 p-0">
                                                                            <select id="cardMonth" class="select2  select2-hidden-accessible" placeholder="January" data-select2-id="month" tabindex="-1" aria-hidden="true">
                                                                                <option value="01" data-select2-id="2">January</option>
                                                                                <option value="02">February </option>
                                                                                <option value="03">March</option>
                                                                                <option value="04">April</option>
                                                                                <option value="05">May</option>
                                                                                <option value="06">June</option>
                                                                                <option value="07">July</option>
                                                                                <option value="08">August</option>
                                                                                <option value="09">September</option>
                                                                                <option value="10">October</option>
                                                                                <option value="11">November</option>
                                                                                <option value="12">December</option>
                                                                            </select>
                                                                    
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <select id="cardYear" class="select2  select2-hidden-accessible" placeholder="2016" data-select2-id="year" tabindex="-1" aria-hidden="true">
                                                                                <option value="22" data-select2-id="4"> 2016</option>
                                                                                <option value="23"> 2017</option>
                                                                                <option value="24"> 2018</option>
                                                                                <option value="25"> 2019</option>
                                                                                <option value="26"> 2020</option>
                                                                                <option value="27"> 2021</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 p-0">
                                                                <div class="form-group" id="credit_cards">
                                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/visa.jpg" id="visa" alt="visa">
                                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/mastercard.jpg" id="mastercard" alt="master">
                                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/amex.jpg" id="amex" class="selected" alt="amex">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    
                                                        <div class="form-group" id="pay-now">
                                                            <button type="button" class="btn btn-default confirm-purchase" id="confirm-purchase" >Confirm</button>
                                                        </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="card">
                                                <div class="card_bar"></div>
                                                <p class="chipContainer">
                                                    <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/chip-pin-01.png" class="chipImg">
                                                    <span>World Bank</span>
                                                </p>
                                                <div class="cvv_card">
                                                    <span>0000</span>
                                                </div>
                                                <form action="" method="post" class="form">
                                                    <div class="card_number form_field">
                                                        <input type="text" id="card_name" class="card_name_input" placeholder="John Smith" disabled="">
                                                        </div>
                                                
                                                    <div class="card_number form_field">
                                                    <input type="number" id="card_number" class="card_number_input" style="width: 100%;" placeholder="4000 1234 5678 9010" disabled="">
                                                    </div>
                                            
                                            
                                                    <div class="card_expiration form_field">

                                                    <input type="text" id="card_month" class="card_month_input" placeholder="02" disabled="" style="width:30px">

                                                    <p>/</p>
                                                    <input type="text" id="card_year" class="card_year_input" placeholder="2012" disabled="">
                                                    </div>
                                                </form>
                                                </div> 
                                        </div>
                                    </div>
                                
                                
                                
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row checkContent rdBillirdBilling" style="display: none;">
                        <a class="paylnk" id="paylnk-id" href="#">Click here if you have
                            difficulty making a payment</a>
                        <p><i class="fa fa-caret-right payarr-fa"></i> If you believe your payment
                            went through but was not acknowledged, call US Arab Chamber of Commerce
                            at <b>(929) 777-4300</b> during East Coast business hours to speak to a
                            customer representative for help. </p>
                        <div class="text-center">
                            <button class="btn btn-primary confirm-purchase"> Order </button>
                        </div>
                    </div>
                    <div class="row checkContent rdCheck " style="display: none;">
                        <a class="paylnk" id="paylnk-id" href="#">Click here if you have
                            difficulty making a payment</a>
                        <p><i class="fa fa-caret-right payarr-fa"></i> If you believe your payment
                            went through but was not acknowledged, call US Arab Chamber of Commerce
                            at <b>(929) 777-4300</b> during East Coast business hours to speak to a
                            customer representative for help. </p>
                        <div class="text-center">
                            <button class="btn btn-primary confirm-purchase"> Order </button>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>

    </section>

    <section>
        <div id="fedex-tickets"></div>
    </section>

<?php
}
get_footer();