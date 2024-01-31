</main>

    <footer>        

    <div class="loader-on-finish order" style="display:none;">
        <div style="position: fixed;width:100vw;height:100vh;background:#fff;opacity:1;display:flex; flex-direction: column; top:0;right:0;justify-content:center;align-items:center;">
            <h3>Thank you for your business</h3> 
            <h3>Your request form is being generated now...</h3>
        </div>
    </div>
    <div class="page-header main-footer">

        <div class="container">

            <div class="row">

                <div class="col-sm-4">

                    <div class="hdfoot-div">

                        <h4>Contact Us</h4>

                    </div>

                    <div class="footcont-div">

                        <p>

                            <span class="contus-p">US Arab Chamber of Commerce at:</span><br>

                            <i class="fa fa-map-marker icon-fa" aria-hidden="true"></i> 1330 New Hampshire Ave. NW, B1 <br>Washington D.C. 20036<br>



                            <i class="fa fa-phone" aria-hidden="true"></i> <b>Tel:</b> (202) 468-4200

                        </p>

                        <div class="mapdiv">

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3104.6927028710825!2d-77.0470266!3d38.908142!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b7c80bdf36df%3A0x3b658414a5dc75b6!2s1330+New+Hampshire+Ave+NW%2C+Washington%2C+DC+20036%2C+USA!5e0!3m2!1sen!2seg!4v1495369890939" width="70%" height="50" frameborder="0" style="border:0" allowfullscreen=""></iframe>

                        </div>

                    </div>

                    



                </div>

                <div class="col-sm-4">

                    <div class="hdfoot-div">

                        <h4>Important Links</h4>

                    </div>

                    <div class="row footcont-div">

                        <div class="col-sm-4">



                            <ul class="footlinks-ul">

                                <li><a href="/">Home</a></li>

                                <li><a href="/services/arab-chamber-of-commerce/">About Us</a></li>

                                

                                



                                <li><a href="/faqs/">Faqs</a></li>

                                <li><a href="/blogs/">Blog</a></li>

                               

                                <li><a href="/resources/">Resources</a></li>

                            

                            </ul>



                        </div> 

                        <div class="col-sm-8">

                            <ul class="footlinks-ul">

                                

                                <li><a href="/about-egypt/">About Egypt</a></li>

                                <li><a href="/services/documents-legalization/export-documents/">Export Document</a></li>

                                <li><a href="/services/documents-legalization/federal-documents/">Federal Document</a></li>

                                <li><a href="/services/documents-legalization/">Document Certification</a></li>

                                <li><a href="/services/documents-legalization/state-certified-documents/">Document Certified by SOS</a></li>

                            </ul>

                        </div>





                    </div>



                </div>

                <div class="col-sm-4">

                    <div class="hdfoot-div">

                        <h4>Social Network</h4>

                    </div>

                    <div class="socialnet-h5">

                        <h5>Share &amp; Keep in touch:</h5>

                    </div>



                    <div class="footcont-div">



                        <div class="social-div">

                            <a href="https://www.facebook.com/egyptembassy/"><img src="<?php bloginfo('template_directory')?>/assets/images/facebook.png"></a>

                        </div>

                        <div class="social-div">

                            <a href="https://plus.google.com/111506959377066447767/"><img src="<?php bloginfo('template_directory')?>/assets/images/google.png"></a>

                        </div>

                       

                        <!--<div class="social-div">

                        <a href="#"><img src="images/rss.png"  /></a>

                        </div>-->

                        <div class="social-div">

                            <a href="https://twitter.com/egptembssy"><img src="<?php bloginfo('template_directory')?>/assets/images/twitter.png"></a>

                        </div>

                        

                        <div class="clearfix"></div>  



                    </div>



                </div>

            </div>

            <div class="row copyright-div">

                <div class="col-sm-12 text-center">

                    <p class="copyright-p">

                        © Copyright <a href="/">egyptembassy.org</a> <?= date('Y') ?>

                    </p>

                </div>

            </div>

        </div>

    </div>

    </footer>





    <!-- Modal -->



    <div class="modal fade fedalDocumentModal" id="exampleModal1" tabindex="-1" role="dialog"

        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">X</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="cases-questions">

                        



                        <div class="ques q-2">

                            <div class="content">

                                <div class="row justify-space-around">

                                    <div style="width: fit-content;">

                                        <label for="">How many documents do you have?</label>

                                    </div>





                                    <div style="width: fit-content;">

                                        <select class="select2 document-count-select">

                                            <option value='0' selected disabled>0</option>

                                            <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                        </select>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                    <div class="service-table-in-popup" style="display:none">

                        <table class="table table-bordered table-striped doctyp-tbl">

                            <thead>

                                <tr>

                                    <th >Service requested</th>

                                    <!-- <th>Count</th> -->

                                    <th>

                                        Fee

                                    </th>

                                    <th>

                                        Count

                                    </th>

                                    <th>

                                        Total Fee

                                    </th>

                                    <th>

                                        Time

                                    </th>



                                </tr>

                            </thead>

                            <tbody class="modal-service-table-body">



                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                    <a href="/order-form/">

                        <button type="button" class="btn btn-success submit-agree-on-services"

                            style="display:none;">Submit Order</button>

                    </a>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade fedalDocumentModal" id="exampleModal2" tabindex="-1" role="dialog"

        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">X</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="cases-questions">



                    



                    <!-- <div class="ques q-2">

                            <div class="content">

                                <div class="row">

                                    <div class="col-8">

                                        <label for="">How many documents do you have?</label>

                                    </div>





                                    <div class="col-4">

                                        <select class="select2 document-count-select">

                                            <option value='0' selected disabled>0</option>

                                            <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                        </select>

                                    </div>

                                </div>



                            </div>

                        </div> -->



                        

                         <div class="ques q-4">

                             <div class="sub-header" style="    border-radius: 0;">

                               <h5>Sub Documents</h5>

                           </div> 





                            <div class="content">

                            <div class="row">

                                <?php  

                                $subDocument = get_documents()->SubDocumentDataList;

                                foreach ($subDocument as $key => $value) {

                                    # code...

                                    if ($value->CountryDocumentCaseId == 1154) {

                                    ?> 

                            

                                    <div class="col-4">

                                        <label><?php echo $value->DisplayName; ?></label>

                                    </div>

                                    <div class="col-2">



                                    <select class="select2  document-count-select sub-document sub-document-<?php echo $value->Id; ?>" data-sub="<?php echo $value->Id; ?>">

                                        <option value='0' selected disabled>0</option>

                                        <?php 

                                        for ($i=1; $i <= 100; $i++) { 

                                            # code...

                                            echo "<option value='$i'>$i</option>";

                                        }

                                        ?>

                                    </select>

                                 

                                    </div>

                                    

                                    <?php

                                }
                                }

                                ?>

                            </div>

                            </div>





                        </div> 

                    </div>

                    <div class="service-table-in-popup" style="display:none">

                        <table class="table table-bordered table-striped doctyp-tbl">

                            <thead>

                                <tr>

                                    <th >Service requested</th>

                                    <!-- <th>Count</th> -->

                                    <th>

                                        Fee

                                    </th>

                                    <th>

                                        Count

                                    </th>

                                    <th>

                                        Total Fee

                                    </th>

                                    <th>

                                        Time

                                    </th>



                                </tr>

                            </thead>

                            <tbody class="modal-service-table-body">



                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                    <a href="/order-form/">

                        <button type="button" class="btn btn-success submit-agree-on-services"

                            style="display:none;">Submit Order</button>

                    </a>

                </div>

            </div>

        </div>

    </div>



    <div class="modal fade fedalDocumentModal" id="exampleModal3" tabindex="-1" role="dialog"

        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">X</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="cases-questions">

                        <div class="ques q-2">

                            <div class="content">

                                <div class="row">

                                    <div style="width: fit-content">

                                        <label for="">How many documents do you have?</label>

                                    </div>

                                    <div style="width: fit-content">

                                        <select class="select2 document-count-select">

                                            <option value='0' selected disabled>0</option>

                                            <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                            ?>

                                        </select>

                                    </div>

                                </div>



                            </div>

                        </div>



                        <!-- <div class="ques q-1">

                            <div class="content">

                                <label for="">Does your customer require the US Arab Chamber of Commerce stamp ? </label>

                                <div class="row">

                                    <div class="col-6">

                                        <div class="form-check">

                                            <input class="form-check-input arab-champer-input" name="arabchamperstamp"

                                                type="radio" value=true>

                                            <label class="form-check-label" for="exampleRadios1">

                                                Yes

                                            </label>

                                        </div>

                                    </div>

                                    <div class="col-6">

                                        <div class="form-check">

                                            <input class="form-check-input arab-champer-input" name="arabchamperstamp"

                                                type="radio" value=false>

                                            <label class="form-check-label" for="exampleRadios2">

                                                No

                                            </label>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div> -->

                        

                    </div>

                    <div class="service-table-in-popup" style="display:none">

                        <table class="table table-bordered table-striped doctyp-tbl">

                            <thead>

                                <tr>

                                    <th >Service requested</th>

                                    <!-- <th>Count</th> -->

                                    <th>

                                        Fee

                                    </th>

                                    <th>

                                        Count

                                    </th>

                                    <th>

                                        Total Fee

                                    </th>

                                    <th>

                                        Time

                                    </th>



                                </tr>

                            </thead>

                            <tbody class="modal-service-table-body">



                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                    <a href="/order-form/">

                        <button type="button" class="btn btn-success submit-agree-on-services"

                            style="display:none;">Submit Order</button>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- START EXTRA CASES MODALS -->
        <div class="modal fade fedalDocumentModal" id="exampleModal2221" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">X</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="cases-questions">





                        <div class="ques q-2">

                            <div class="content">

                                <div class="row">

                                    <div class="col-8">

                                        <label for="">How many documents do you have?</label>

                                    </div>





                                    <div class="col-4">

                                        <select class="select2 document-count-select">

                                            <option value='0' selected disabled>0</option>

                                            <?php 

                                                    for ($i=1; $i <= 100; $i++) { 

                                                        # code...

                                                        echo "<option value='$i'>$i</option>";

                                                    }

                                                    ?>



                                        </select>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                    <div class="service-table-in-popup" style="display:none">

                        <table class="table table-bordered table-striped doctyp-tbl">

                            <thead>

                                <tr>

                                    <th>Service requested</th>

                                    <!-- <th>Count</th> -->

                                    <th>

                                        Fee

                                    </th>

                                    <th>

                                        Count

                                    </th>

                                    <th>

                                        Total Fee

                                    </th>

                                    <th>

                                        Time

                                    </th>



                                </tr>

                            </thead>

                            <tbody class="modal-service-table-body">



                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                    <a href="/order-form/">

                        <button type="button" class="btn btn-success submit-agree-on-services" style="display:none;">Submit
                            Order</button>

                    </a>

                </div>

            </div>

        </div>

    </div>
<!-- END 1 -->

<!-- START 2 -->
<div class="modal fade fedalDocumentModal" id="exampleModal2222" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">X</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="cases-questions">





                    <div class="ques q-2">

                        <div class="content">

                            <div class="row">

                                <div class="col-8">

                                    <label for="">How many documents do you have?</label>

                                </div>





                                <div class="col-4">

                                    <select class="select2 document-count-select">

                                        <option value='0' selected disabled>0</option>

                                        <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                    </select>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

                <div class="service-table-in-popup" style="display:none">

                    <table class="table table-bordered table-striped doctyp-tbl">

                        <thead>

                            <tr>

                                <th>Service requested</th>

                                <!-- <th>Count</th> -->

                                <th>

                                    Fee

                                </th>

                                <th>

                                    Count

                                </th>

                                <th>

                                    Total Fee

                                </th>

                                <th>

                                    Time

                                </th>



                            </tr>

                        </thead>

                        <tbody class="modal-service-table-body">



                        </tbody>

                    </table>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                <a href="/order-form/">

                    <button type="button" class="btn btn-success submit-agree-on-services" style="display:none;">Submit
                        Order</button>

                </a>

            </div>

        </div>

    </div>

</div>
<!-- END 2 -->

<!-- STRAT 3 -->

<div class="modal fade fedalDocumentModal" id="exampleModal2223" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">X</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="cases-questions">





                    <div class="ques q-2">

                        <div class="content">

                            <div class="row">

                                <div class="col-8">

                                    <label for="">How many documents do you have?</label>

                                </div>





                                <div class="col-4">

                                    <select class="select2 document-count-select">

                                        <option value='0' selected disabled>0</option>

                                        <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                    </select>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

                <div class="service-table-in-popup" style="display:none">

                    <table class="table table-bordered table-striped doctyp-tbl">

                        <thead>

                            <tr>

                                <th>Service requested</th>

                                <!-- <th>Count</th> -->

                                <th>

                                    Fee

                                </th>

                                <th>

                                    Count

                                </th>

                                <th>

                                    Total Fee

                                </th>

                                <th>

                                    Time

                                </th>



                            </tr>

                        </thead>

                        <tbody class="modal-service-table-body">



                        </tbody>

                    </table>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                <a href="/order-form/">

                    <button type="button" class="btn btn-success submit-agree-on-services" style="display:none;">Submit
                        Order</button>

                </a>

            </div>

        </div>

    </div>

</div>
<!-- END 3 -->

<!-- START 4 -->

<div class="modal fade fedalDocumentModal" id="exampleModal2224" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">X</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="cases-questions">





                    <div class="ques q-2">

                        <div class="content">

                            <div class="row">

                                <div class="col-8">

                                    <label for="">How many documents do you have?</label>

                                </div>





                                <div class="col-4">

                                    <select class="select2 document-count-select">

                                        <option value='0' selected disabled>0</option>

                                        <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                    </select>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

                <div class="service-table-in-popup" style="display:none">

                    <table class="table table-bordered table-striped doctyp-tbl">

                        <thead>

                            <tr>

                                <th>Service requested</th>

                                <!-- <th>Count</th> -->

                                <th>

                                    Fee

                                </th>

                                <th>

                                    Count

                                </th>

                                <th>

                                    Total Fee

                                </th>

                                <th>

                                    Time

                                </th>



                            </tr>

                        </thead>

                        <tbody class="modal-service-table-body">



                        </tbody>

                    </table>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                <a href="/order-form/">

                    <button type="button" class="btn btn-success submit-agree-on-services" style="display:none;">Submit
                        Order</button>

                </a>

            </div>

        </div>

    </div>

</div>
<!-- END 4 -->

<!-- START 5 -->

<div class="modal fade fedalDocumentModal" id="exampleModal2225" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Case title</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">X</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="cases-questions">





                    <div class="ques q-2">

                        <div class="content">

                            <div class="row">

                                <div class="col-8">

                                    <label for="">How many documents do you have?</label>

                                </div>





                                <div class="col-4">

                                    <select class="select2 document-count-select">

                                        <option value='0' selected disabled>0</option>

                                        <?php 

                                                for ($i=1; $i <= 100; $i++) { 

                                                    # code...

                                                    echo "<option value='$i'>$i</option>";

                                                }

                                                ?>



                                    </select>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

                <div class="service-table-in-popup" style="display:none">

                    <table class="table table-bordered table-striped doctyp-tbl">

                        <thead>

                            <tr>

                                <th>Service requested</th>

                                <!-- <th>Count</th> -->

                                <th>

                                    Fee

                                </th>

                                <th>

                                    Count

                                </th>

                                <th>

                                    Total Fee

                                </th>

                                <th>

                                    Time

                                </th>



                            </tr>

                        </thead>

                        <tbody class="modal-service-table-body">



                        </tbody>

                    </table>

                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary submit-case-document" style="display:none">Proceed</button>

                <a href="/order-form/">

                    <button type="button" class="btn btn-success submit-agree-on-services" style="display:none;">Submit
                        Order</button>

                </a>

            </div>

        </div>

    </div>

</div>
<!-- END 5 -->

<!-- fedex popup -->

<?php 
@$session = retreive_session();
if (isset($session['user']['serviceInfo']['table'])) {
    # code...
    $date = date('d m y');
    $time = 0;
    $totalFee = 0;
    foreach ($session['user']['serviceInfo']['table'] as $key => $value) {
        # code...
        $time += $value->Time;
        $totalFee += $value->TotalFee;
    }
?>
<div class="popup-fedex popup-to-user" style="display:none;">
    <div class="popup-content" style="padding-bottom:10px;">
        <div class="user-date-popup">
            <div class="close-popup">X</div>
            <div class="today-data">13JAN24</div>
            <div class="send-phone" id="send-phone">
                (202) 468-4200
            </div>
            <div class="send-data">
                <span id="send-name">
                    US Arab Chamber of Commerce
                </span>
                <span id="send-company-name">
                    US Arab Chamber of Commerce
                </span>
                <span id="send-address">
                     1330 New Hampshire Ave. NW, B1
                </span>
                
                <span>
                    <span id="send-city"> Washington </span>
                    <span id="send-state">  D.C. </span>
                    <span id="send-zip"> 20036</span>
                </span>
            </div>
            <div class="to-phone" id="to-phone">
                <input type="text" value="<?php echo (isset($session['user']['userInfo']['tel'])) ? $session['user']['userInfo']['tel'] : ""; ?>" class="edit-input phone-edit" readonly="">
            </div>
            <div class="to-data">
                <span id="to-name" style="display:flex;justify-content:flex-start;">
                    <input type="text" value="<?php echo (isset($session['user']['userInfo']['firstname'])) ? $session['user']['userInfo']['firstname'] : ""; ?> <?php echo (isset($session['user']['userInfo']['lastname'])) ? $session['user']['userInfo']['lastname'] : ""; ?>" class="edit-input firstname-edit" readonly="">
                    
                </span>
                <span id="to-company-name">
                    <input type="text" value="<?php echo (isset($session['user']['userInfo']['companyName'])) ? $session['user']['userInfo']['companyName'] : ""; ?>" class="edit-input companyName-edit" readonly="">
                </span>
                <span id="to-address">
                <input type="text" value="<?php echo (isset($session['user']['userInfo']['address'])) ? $session['user']['userInfo']['address'] : ""; ?>" class="edit-input address-edit" readonly="">
                </span>
                
                <span>
                    <div style="display:flex;justify-content:flex-start;">
                        <span id="to-city"> <input type="text" id="city_of22edit" value="<?php echo (isset($session['user']['userInfo']['city'])) ? $session['user']['userInfo']['city'] : ""; ?>" class="edit-input city-edit" readonly=""></span>
                        <span id="to-state"> <input type="text" id="state_of22edit" value="<?php echo (isset($session['user']['userInfo']['state'])) ? $session['user']['userInfo']['state'] : ""; ?>" class="edit-input state-edit" readonly=""></span>
                        <span id="to-zip"> <input type="text" id="zipcode_of22edit" value="<?php echo (isset($session['user']['userInfo']['zipcode'])) ? $session['user']['userInfo']['zipcode'] : ""; ?>" class="edit-input zipcode-edit" readonly="" maxlength="5"></span>
                    </div>
                </span>
            </div>
            <div class="receive-date receive-date-2-day">
                <?php echo date('D - d - M', strtotime("+ ($time+2) weekdays")); ?>
            </div>
            <div class="receive-date receive-date-1-day" style="display: none;">
                <?php echo date('D - d - M', strtotime("+ ($time+2) weekdays")); ?>
            </div>
            <div class="popup-img">
                <img src="https://www.uslegalization.com/assets/images/fedex.png" alt="fedex" width="100%" class="fedex-image1 receive-date-2-day">
                <img src="https://www.uslegalization.com/assets/images/fedex2.png" alt="fedex" width="100%" class="fedex-image2 receive-date-1-day" style="display: none;">
            </div>
        </div>
        <input type="hidden" value="to" class="formCase">
        
        <div class="row btns-1" style="margin: auto;">
            <div class="col-6 text-left" >
                <button type="button" class="btn btn-success btn-lg confirm-ticket">Confirm &amp; Continue</button>
            </div>
            <div class="col-6 text-right" align="right">
                <button type="button" class="btn btn-danger btn-lg edit-address">Edit Address</button>
            </div>
        </div>
        <div class="row btns-2" style="display: none; margin: auto;">
            <div class="col-6 text-left">
                <button type="button" class="btn btn-success btn-lg confirm-edit">Confirm Edit</button>
            </div>
            <div class="col-6 text-right" align="right">
                <button type="button" class="btn btn-danger btn-lg cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--  -->
<!-- END EXTRA CASES MODALS -->

<?php 
}

    wp_footer(); 

?>
<?php if (isset($session['lastOrder22'])) { ?>
<script src="<?= bloginfo('template_directory') . "/assets/js/print.min.js" ?>"></script>
<script src="<?= bloginfo('template_directory') . "/assets/js/pdf-lib.min.js" ?>"></script>
    
    <?php } ?> 

<script>

    $(window).bind('beforeunload', function(){

        $("#loadingDiv").remove();

        $("body").append("<div id='loadingDiv'><div class='loader'>Loading...</div></div>");

        $("#loadingDiv").show();

    });

    

    $(document).ready(function(){

        $("#loadingDiv").remove();

        <?php if (isset($session['lastOrder22'])) { ?>
            const { PDFDocument } = PDFLib;
            function downloadFile(data) {
                const blob = new Blob([data], { type: 'application/pdf' });
                const url= window.URL.createObjectURL(blob);
                //window.open(url);
                printJS({
                    printable: url,
                    type: 'pdf',
                });
            }

            async function printPDFS() {
                /* Array of pdf urls */
                var firstpdf = $('.fedextickets1').attr('src');
                var secondpdf = $('.fedextickets2').attr('src');
                var pdfsToMerge = [];
                if(firstpdf != undefined && secondpdf != undefined && firstpdf != "" && secondpdf != ""){
                    pdfsToMerge = [firstpdf, secondpdf];
                    console.log('both');
                } else if(firstpdf != undefined && firstpdf != "") {
                    pdfsToMerge = [firstpdf];
                    // $('.fedextickets1').focus()
                    // $('.fedextickets1').print()
                    console.log(firstpdf + typeof firstpdf + ' first');
                } else if(secondpdf != undefined && secondpdf != "") {
                    pdfsToMerge = [secondpdf];
                    console.log('second');
                    // $('.fedextickets1').focus()
                    // $('.fedextickets1').print()
                }

                const mergedPdf = await PDFDocument.create();
                for (const pdfCopyDoc of pdfsToMerge) {
                    const pdfBytes = await fetch(pdfCopyDoc).then(res => res.arrayBuffer())
                    //const pdfBytes = fs.readFileSync(pdfCopyDoc);
                    const pdf = await PDFDocument.load(pdfBytes);
                    const copiedPages = await mergedPdf.copyPages(pdf, pdf.getPageIndices());
                    copiedPages.forEach((page) => {
                        mergedPdf.addPage(page);
                    });
                }
                const mergedPdfFile = await mergedPdf.save();
                downloadFile(mergedPdfFile);
            }

            $(document).on('click', '.print_fedex_ticket', function(){
                printPDFS();
                // var iframe = document.querySelector(".fedextickets2");

                // // Check if the iframe is found
                // if (iframe) {
                //     // Access the content window of the iframe
                //     var iframeWindow = iframe.contentWindow;

                //     // Focus on the iframe's content
                //     iframeWindow.focus();

                //     // Print the content of the iframe
                //     iframeWindow.print();
                // } else {
                //     console.error("Iframe with class fedextickets2 not found.");
                // }
            });
        <?php } ?> 
    });



</script>



    <!-- JavaScript Bundle with Popper -->



</html>