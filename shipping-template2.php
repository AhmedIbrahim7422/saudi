<?php
// Template Name: Order Form 2
session_start();
get_header();

@$session = retreive_session();


    // echo "<pre>";
    // print_r($session);
    // echo "</pre>";

    if (!isset($session['user']['serviceInfo'])) {
        ?> 
        <section>
    <br><br><br><br>     <br><br>
        <div class="text-center">
            <h1>Please submit a document to access this page</h1>
            <a href="<?php echo site_url(); ?>"><button class="btn btn-primary confirm-purchase"> Home Page </button></a>
        </div>
    </section>
        <?php
        get_footer();
        exit();
    }
?>
<section class="bgContainer"
style=" background-position: left;   background-attachment: fixed;background-image: 
        url(<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/art.jpg);">
        <div class="title">
            <p>
                Agriculture & Water
            </p>
        </div>
    </section>
    
    <section>
        <br><br><br><br>     <br><br>
        <div class="container ">
            <div class="orderForm">

                <div class="">
                
                
                    <div class="content">
                        <div class="row">
                            <p class="fill-form">Please fill the form ..</p>

                            <div class="col-md-12">
                                <form class="" method="POST">
                                    <div class="p-12">
                                    <span class="badge badge-warning" style="color: #212529;background-color: #ffc107;display:block;margin:auto 0 5px auto;width:fit-content; font-size:1rem;">Service Fee: $<span><?php echo $session['user']['serviceInfo']['totalfee']; ?></span></span>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="padding-left:0">
                                                <label for="firstname-orderform">First Name</label>
                                                <input type="text" class="form-control" id="firstname-orderform" placeholder="first name" value='<?php echo (isset($session['user']['userInfo']['firstname'])) ? $session['user']['userInfo']['firstname'] : ""; ?>'>
                                            </div>
                                            <div class="form-group col-md-6" style="padding-left:0;padding-right:0">
                                                <label for="lastname-orderform">Last Name</label>
                                                <input type="text" class="form-control" id="lastname-orderform" placeholder="last name" value='<?php echo (isset($session['user']['userInfo']['lastname'])) ? $session['user']['userInfo']['lastname'] : ""; ?>'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="padding-left:0">
                                                <label for="email-orderform">Email</label>
                                                <input type="email" class="form-control" id="email-orderform" placeholder="Email" value='<?php echo (isset($session['user']['userInfo']['email'])) ? $session['user']['userInfo']['email'] : ""; ?>'>
                                            </div>
                                            <div class="form-group col-md-3" style="padding-left:0;padding-right:0">
                                                <label for="tel-orderform">Company Phone</label>
                                                <input type="text" class="form-control" id="tel-orderform" placeholder="Cell Phone" value='<?php echo (isset($session['user']['userInfo']['tel'])) ? $session['user']['userInfo']['tel'] : ""; ?>'>
                                            </div>
                                            <div class="form-group col-md-3" style="padding-left:0;padding-right:0">
                                                <label for="">Cell Phone</label>
                                                <input type="text" class="form-control" id="" placeholder="Cell Phone">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="padding-left:0">
                                                <label for="company-orderform">Company Name</label>
                                                <input type="text" class="form-control" id="company-orderform" placeholder="company name" value='<?php echo (isset($session['user']['userInfo']['companyName'])) ? $session['user']['userInfo']['companyName'] : "" ;  ?>'>
                                            </div>
                                            <div class="form-group col-md-6" style="padding-left:0;padding-right:0">
                                                <label for="address-orderform">Address</label>
                                                <input type="text" class="form-control" id="address-orderform" placeholder="1234 Main St" value='<?php echo (isset($session['user']['userInfo']['address'])) ? $session['user']['userInfo']['address'] : "" ;  ?>'>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6" style="padding-left:0">
                                                <label for="city-orderform">City</label>
                                                <input type="text" class="form-control" id="city-orderform" value='<?php echo (isset($session['user']['userInfo']['city'])) ? $session['user']['userInfo']['city'] : "" ; ?>'>
                                            </div>
                                            <div class="form-group col-md-3" style="padding-left:0">
                                                <label for="state-orderform">State</label>
                                                <input type="text" class="form-control" id="state-orderform" value='<?php echo (isset($session['user']['userInfo']['state'])) ? $session['user']['userInfo']['state'] : "" ; ?>'>
                                            </div>
                                            <div class="form-group col-md-2" style="padding-left:0;padding-right:0;position:relative;">
                                                <label for="zipcode-orderform">Zip</label>
                                                <input type="text" class="form-control" id="zipcode-orderform" value='<?php echo (isset($session['user']['userInfo']['zipcode'])) ? $session['user']['userInfo']['zipcode'] : "" ; ?>'>
                        
                                            </div>
                                            <div class="col-md-1 checkOut">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="OutUSA">
                                                    <label class="form-check-label" for="OutUSA" style="font-size: 10px;">
                                                        Out Of USA
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12 p-0">
                                                <div class="form-check ">
                                                    <input class="form-check-input col-xs-1 shipping-orderform" type="checkbox" name="check3" value="1">
                                                    <label class="form-check-label col-xs-11" for="check3">
                                                        I will ship my documents using my own account
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-12 p-0">
                                                <div class="form-check ">
                                                    <input class="form-check-input col-xs-1 shipping-orderform" type="checkbox" name="check4" id="showFedx" value="2">
                                                    <label class="form-check-label col-xs-11" for="check4">
                                                        I would like to buy 2 FedEx airway bills based on 2 days delivery for $<span id="fee2days">10.00</span> each. Total of $<span id="fee2daystotal">20.00</span>
                                                        (To use this option, you must pre-pay by credit card. Check or billing is not available)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                        
                                    <div class="fedx-div">
                        
                                        <div class="row fedxop-div regfedx-div">
                                            <div class="col-sm-12">
                                                <div class="row-flex fedx-data">
                                                    <div class="col-sm-12 col-xs-12 equalH eq">
                                                        <div class="row form-group " id="divmodelfedex">
                                                            <div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">										
                                                                <div class="column" id="divdemofrom">
                                                                    <div class="row">
                                                                        <div class="col-sm-7 col-xs-7 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p>ORIGIN ID:GBOA&nbsp;<span id="spnphonesend">(410) 349-4900</span> </p>
                                                                                    <p> <span id="spnnamesend"></span></p>
                                                                                    <p><span id="spncompsend"></span>Company Name</p>
                                                                                    <p>
                                                                                        <span id="spnaddresssend">
                                                                                        </span><br>
                                                                                        <span id="spnaddress2send"></span>
                                                                                    </p>
                                                                                    <p>United States</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 col-xs-5 infedx-rght">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p id="pshipdate2">Ship Date : 100CT</p>
                                                                                    <p>ACTVVGT: 0.20 LB</p>
                                                                                    <p>CAD:119084289/WSXI3400</p>
                                                                                    <p>BILL SENDER</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-10 col-xs-9 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p class="addtxt-p">
                                                                                        TO <b>
                                                                                <span id="spnFromName"> US Arab Chamber of Commerce</span>
                                                                                <br>1330 New Hampshire Ave,
                                                                                <br> NW Suite B1,<br>
                                                                                Washington, D.C. 20036</b>
                                                                                    </p>
                                                                                    <p><small> (202) 468 - 4200  <span style="margin-left:20px;">REF:</span></small></p>
                                                                                    <p><small>INV:</small></p>
                                                                                    <p><small>PO:  <span style="margin-left:120px;">DEPT:</span> </small></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 col-xs-3 infedx-rght" style="border-left: none;">
                                                                            <div class="vertfrm-txt">5678fgh657</div>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-xs-8">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/label.jpg" class="img-responsive">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-9 col-xs-9 infedx-lft">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/barcode.jpg" class="img-responsive">
                                                                        </div>
                                                                        <div class="col-sm-3 col-xs-3 infedx-rght">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/fedx-img.jpg" class="img-responsive">
                                                                        </div>
                                                                    </div>
                        
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-xs-8 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-xs-4">
                                                                                    <div class="numlft"><div>TRK#</div><span class="numdiv"><b>0201</b></span></div>
                                                                                </div>
                                                                                <div class="col-sm-9 col-xs-8">
                                                                                    <div class="numrght"><b>7946 3138 7730</b></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p class="segboa-p">
                                                                                        <b>
                                                                                            SE GBOA
                                                                                        </b>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-xs-4 infedx-rght" style="border-left: none;">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div><b id="shipretdate">TUE - 12 MAR 4:30P</b></div>
                                                                                    <div><b>** 2DAY **</b></div>
                                                                                    <div><b>12345</b></div>
                                                                                    <div><b><span> ghgjg - US</span></b></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/label2.jpg" class="img-responsive fedximg">
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-xs-12 col-md-6 col-lg-6">										
                                                                <div class="column" id="divdemoto">
                                                                    <div class="row">
                                                                        <div class="col-sm-7 col-xs-7 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p>ORIGIN ID:GBOA&nbsp; (202) 468 - 4200</p>
                                                                                    <p>US Arab Chamber of Commerce</p>
                                                                                    <p>
                                                                                        1330 New Hampshire Ave,<br>
                                                                                        NW Suite B1,<br>
                                                                                        Washington, D.C. 20036
                                                                                    </p>
                        
                                                                                    <p>United States</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-5 col-xs-5 infedx-rght">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p id="pshipdate2">Ship Date : 100CT</p>
                                                                                    <p>ACTVVGT: 0.20 LB</p>
                                                                                    <p>CAD:119084289/WSXI3400</p>
                                                                                    <p>BILL SENDER</p>
                        
                                                                                </div>
                        
                                                                            </div>
                        
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-10 col-xs-9 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p class="addtxt-p">
                                                                                        TO <b>
                                                                                            <span id="spnnamereceipt"> </span>
                                                                                            <br><span id="spncompreceipt"></span>
                                                                                            <br><span id="spnaddressreceipt"></span><br>
                                                                                            <span id="spnaddress2receipt"></span>
                                                                                        </b>
                                                                                    </p>
                                                                                    <p><small><span id="spnphonereceipt"></span> <span style="margin-left:20px;">REF:</span></small></p>
                                                                                    <p><small>INV:</small></p>
                                                                                    <p><small>PO:  <span style="margin-left:30px;">DEPT:</span></small></p>
                        
                        
                                                                                </div>
                        
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-2 col-xs-3 infedx-rght" style="border-left: none;">
                                                                            <div class="vertfrm-txt">5678fgh657</div>
                        
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-xs-8">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/label.jpg" class="img-responsive">
                                                                        </div>
                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-9 col-xs-9 infedx-lft">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/barcode.jpg" class="img-responsive">
                        
                                                                        </div>
                                                                        <div class="col-sm-3 col-xs-3 infedx-rght">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/fedx-img.jpg" class="img-responsive">
                        
                                                                        </div>
                        
                                                                    </div>
                        
                                                                    <hr class="frm-hr">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-xs-8 infedx-lft">
                                                                            <div class="row">
                                                                                <div class="col-sm-3 col-xs-4">
                                                                                    <div class="numlft"><div>TRK#</div><span class="numdiv"><b>0201</b></span></div>
                        
                                                                                </div>
                                                                                <div class="col-sm-9 col-xs-8">
                                                                                    <div class="numrght"><b>7946 3138 7730</b></div>
                                                                                </div>
                        
                                                                                
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <p class="segboa-p">
                                                                                        <b>
                                                                                            SE GBOA
                                                                                        </b>
                                                                                    </p>
                        
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-4 col-xs-4 infedx-rght" style="border-left: none;">
                        
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                        
                                                                                    <div><b id="shipretdate1">TUE - 12 MAR 4:30P</b></div>
                                                                                    <div><b>** 2DAY **</b></div>
                                                                                    <div><b> <span id="spnzipcode2receipt"></span></b></div>
                                                                                    <div><b> <span id="spnstatereceipt"></span></b></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12 col-xs-12">
                                                                            <img src="<?php echo site_url(); ?>/wp-content/themes/saudi-theme/assets/images/label2.jpg" class="img-responsive ">
                                                                        </div>
                                                                    </div>
                                                                                                            
                                                                </div>
                                                            </div>
                        
                                                        </div>
                                                    </div>
                        
                                                </div>
                        
                                            </div>
                        
                                        </div>
                        
                        
                                    </div>
                            
                                </form>
                            </div>
                    
                        </div>
                    
                        
                        

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-warning back-from-order">back</button>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                        
                                    <button class="btn btn-primary btn-lg" id="procees-order">proceed</button>
                
                                </div>
                            </div>
                        
                        </div>
                    </div>
            
                </div>
            </div>
        </div>

    </section>

        <?php
get_footer();