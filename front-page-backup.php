<section class="blog">

    <div class="custom-container body-content">

        <div class="page-header main-slider">

            <div class="container slider-div">

                <div class="row slid-row">

                    <div class="col-sm-12">

                        <header id="myCarousel" class="carousel slide">

                            <!-- Indicators -->

                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

                                <ol class="carousel-indicators">

                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>

                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>

                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>

                                </ol>

                                <div class="carousel-inner">

                                    <div class="carousel-item active" style="height: 321px">

                                        <img src="<?php bloginfo('template_directory') ?>/assets/images/1.jpg" class="img-responsive" width="100%" height="100%">

                                        <div class="carousel-caption d-none d-md-block">

                                            <h2>US Arab Chamber of Commerce Certification</h2>

                                            <p>USACC is a national Chamber of Commerce that has been assisting the business community in the United States since 1985.</p>

                                        </div>

                                    </div>

                                    <div class="carousel-item" style="height: 321px">

                                        <img src="<?php bloginfo('template_directory') ?>/assets/images/2.jpg" class="img-responsive" width="100%" height="100%">

                                        <div class="carousel-caption d-none d-md-block">

                                            <h2>Document Legalization for Saudi</h2>

                                            <p>Providing expedited legalization services for all federal,corporate or commercial documents destined for use in Saudi</p>

                                        </div>

                                    </div>

                                    <div class="carousel-item" style="height: 321px">

                                        <img src="<?php bloginfo('template_directory') ?>/assets/images/3.jpg" class="img-responsive" width="100%" height="100%">

                                        <div class="carousel-caption d-none d-md-block">

                                            <h2>Trade and Investment between Saudi &amp; USA</h2>

                                            <p>Comprehensive economic research on the bilateral trade relation between the United States and Saudi icluding export and import data.</p>

                                        </div>

                                    </div>

                                </div>

                                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">

                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                                    <span class="sr-only">Previous</span>

                                </button>

                                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">

                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                                    <span class="sr-only">Next</span>

                                </button>

                            </div>

                        </header>

                    </div>

                </div>

            </div>

        </div>



        <div class="main-service">

            <div class="container headtxt-div">

                <div class="col-sm-12">

                    <p class="mainhead-txt">This is not the official website of Saudi Embassy. The Chamber does not hold any liability regarding accuracy, adequacy, completeness, legality, reliability or usefulness of any information provided.</p>

                </div>

            </div>



            <div class="container">

                <div class="row">

                    <div class="col-lg-8 main-content">

                        <div class="content-div">

                            <div class="col-sm-12">

                                <h1 class="doctit-h1">Saudi Embassy Legalization of Documents</h1>

                                <p>This website is provided by US Arab Chamber of Commerce to facilitate and expedite the legalization process of corporate documents issued in the U.S. for use in the country of Saudi.</p>


                            </div>

                        </div>
                        <!-- Notarized -->
                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 1148,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "IsJurisdiction" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => null,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {

                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">
                                <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/state-certified-documents/">Notarized company document</a> </h3> -->
                                <h3 class="documtit-h3 open-service-table">
                                    <span> <i class="fa fa-clipboard fa-doc"></i>&nbsp; Notarized company document.</span> <button class="button-view-details">View details</button>
                                </h3>
                                <p class="totals-on-title">
                                    <span class="total-fee-number">
                                        <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                        for the first document, 
                                        <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                        for each additional documents.
                                    </span>
                                    <span style="color: green"> 
                                        Processing time is  
                                        <span class="total-time-number"  style="color: #000;"><?= $totalTime ?></span> 
                                        Business days.
                                    </span>    
                                </p>
                                <p class="service-table-container">

                                    This includes all business documents such as: Power of Attorney, Assignment, Agency agreement, Affidavit, CO, CI and notarized true copy of International Standards Organization (ISO) certificate.

                                </p>

                                <div class="col-sm-12 service-table-container">



                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%" style="font-size: 20px">Service</th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b><?php echo $value->Name; ?></b></td>

                                                        <!-- <td>

                                    <?php echo $value->Count; ?>

                                    </td> -->

                                                        <td>

                                                            $<?php echo ($value->TotalFee != 0) ? $value->TotalFee . " Per document" : $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total Fees</b></td>

                                                    <td>

                                                        <b>$<?php echo ($totalAmount != 0) ? $totalAmount . " Per document" : $totalAmount; ?></b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">


                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="1148" data-case-name="Notarized company document." data-toggle="modal" data-target="#exampleModal3">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- Notarized -->

                        <!-- Certified company document from my State -->
                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 1149,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "IsJurisdiction" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => null,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {

                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">
                                <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/state-certified-documents/">Notarized company document</a> </h3> -->
                                <h3 class="documtit-h3 open-service-table">
                                    <span> <i class="fa fa-clipboard fa-doc"></i>&nbsp; Documents Certified by Local Secretary of State.</span> 
                                    <button class="button-view-details">View details</button>
                                </h3>
                                <p class="totals-on-title">
                                    <span class="total-fee-number">
                                        <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                        for the first document, 
                                        <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                        for each additional documents.
                                    </span>
                                    <span style="color: green"> 
                                        Processing time is  
                                        <span class="total-time-number"  style="color: #000;"><?= $totalTime ?></span> 
                                        Business days.
                                    </span>    
                                </p>

                                <p class="service-table-container">

                                    This includes all business documents such as: Power of Attorney, Assignment, Agency agreement, Affidavit, CO, CI and notarized true copy of International Standards Organization (ISO) certificate. All documents must be certified from the local Secretary of State Office in the same State that issued the document before you send us your package.

                                </p>

                                <div class="col-sm-12 service-table-container">



                                    <div class="table-responsive">

                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%">Service</th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b><?php echo $value->Name; ?></b></td>

                                                        <!-- <td>

                                    <?php echo $value->Count; ?>

                                    </td> -->

                                                        <td>

                                                            $<?php echo ($value->TotalFee != 0) ? $value->TotalFee . " Per document" : $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total Fees</b></td>

                                                    <td>

                                                        <b>$<?php echo ($totalAmount != 0) ? $totalAmount . " Per document" : $totalAmount; ?></b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">


                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="1149" data-case-name="Documents Certified by Local Secretary of State." data-toggle="modal" data-target="#exampleModal3">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- Certified company document from my State -->

                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 1150,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => null,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {
                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">

                                <div class="col-sm-12">

                                    <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/federal-document/">Federal documents</a></h3> -->
                                    <h3 class="documtit-h3 open-service-table">
                                        <span> <i class="fa fa-clipboard fa-doc"></i>&nbsp; Federal documents (FDA - USDA - EPA - USPTO - DHS - or FBI). </span> <button class="button-view-details">View details</button>
                                    </h3>
                                    <p class="totals-on-title">
                                        <span class="total-fee-number">
                                            <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                            for the first document, 
                                            <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                            for each additional documents.
                                        </span>
                                        <span style="color: green"> 
                                            Processing time is  
                                            <span class="total-time-number"  style="color: #000;"><?= $totalTime ?></span> 
                                            Business days.
                                        </span>    
                                    </p>

                                    <p class="service-table-container">This includes all original documents issued by a federal agency such as: FDA documents, USPTO trademark and assignment documents, USDA documents, Homeland Security Documents and EPA issued documents.</p>

                                </div>

                                <div class="col-sm-12 service-table-container">

                                    <div class="table-responsive">



                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%">Service</th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b>

                                                                <?php echo $value->Name; ?>

                                                            </b></td>

                                                        <!-- <td>

                                                        <?php echo $value->Count; ?>

                                                        </td> -->

                                                        <td>

                                                            $

                                                            <?php echo $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total Fees</b></td>

                                                    <td>

                                                        <b>$

                                                            <?php echo $totalAmount; ?>

                                                        </b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">




                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="1150" data-case-name="Federal documents (FDA - USDA - EPA - USPTO - DHS - or FBI)." data-toggle="modal" data-target="#exampleModal1">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- START CASE 7871 -->
                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 7871,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => null,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {
                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">

                                <div class="col-sm-12">

                                    <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/federal-document/">Federal documents</a></h3> -->
                                    <h3 class="documtit-h3 open-service-table">
                                        <span> <i class="fa fa-clipboard fa-doc"></i>&nbsp; Commercial Export Documents ( Invoice - Certificate of Origin ). </span> <button class="button-view-details">View details</button>
                                    </h3>
                                    <p class="totals-on-title">
                                        <span class="total-fee-number">
                                            <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                            for the first document, 
                                            <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                            for each additional documents.
                                        </span>
                                        <span style="color: green"> 
                                            Processing time is  
                                            <span class="total-time-number"  style="color: #000;"><?= $totalTime ?></span> 
                                            Business days.
                                        </span>    
                                    </p>
                                    

                                    <p class="service-table-container">This includes only Certificate of Origin and Commercial Invoice. Both certificates must be signed by a company officer, notarized by local notary public and certified by local Secretary of State office in the same State where the notary is licensed.</p>

                                </div>

                                <div class="col-sm-12 service-table-container">

                                    <div class="table-responsive">



                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%">Service </th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b>

                                                                <?php echo $value->Name; ?>

                                                            </b></td>

                                                        <!-- <td>

                                                        <?php echo $value->Count; ?>

                                                        </td> -->

                                                        <td>

                                                            $

                                                            <?php echo $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total</b></td>

                                                    <td>

                                                        <b>$

                                                            <?php echo $totalAmount; ?>

                                                        </b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">




                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="7871" data-case-name="Commercial Export Documents ( Invoice - Certificate of Origin )" data-toggle="modal" data-target="#exampleModal1">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- END CASE 7871 -->

                        <!-- START CASE 53 -->
                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 1153,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => 19,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {
                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">

                                <div class="col-sm-12">

                                    <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/federal-document/">Federal documents</a></h3> -->
                                    <h3 class="documtit-h3 open-service-table">
                                        <span><i class="fa fa-clipboard fa-doc"></i>&nbsp; Personal documents. </span> <button class="button-view-details">View details</button>
                                    </h3>
                                    <p class="totals-on-title">
                                        <span class="total-fee-number">
                                            <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                            for the first document, 
                                            <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                            for each additional documents.
                                        </span>
                                        <span style="color: green"> 
                                            Processing time is  
                                            <span class="total-time-number"  style="color: #000; "><?= $totalTime ?></span> 
                                            Business days.
                                        </span>    
                                    </p>

                                    <p class="service-table-container">This includes personal documents such as: Birth, Death, Marriage, Divorce certificates, Divorce decrees, Powers of Attorney and Affidavits. All documents must be certified by the respective Secretary of State. This certification is required to have an attached page which contains the great seal of the Secretary of the State.</p>

                                </div>

                                <div class="col-sm-12 service-table-container">

                                    <div class="table-responsive">



                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%">Service</th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b>

                                                                <?php echo $value->Name; ?>

                                                            </b></td>

                                                        <!-- <td>

                                                        <?php echo $value->Count; ?>

                                                        </td> -->

                                                        <td>

                                                            $

                                                            <?php echo $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total Fees</b></td>

                                                    <td>

                                                        <b>$

                                                            <?php echo $totalAmount; ?>

                                                        </b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">




                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="1153" data-case-name="Personal documents" data-toggle="modal" data-target="#exampleModal1">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- END CASE 53 -->

                        <!-- START CASE 53 -->
                        <div class="col-sm-12">
                            <?php

                            $SelectedDocument = array(

                                "DocumentCaseId" => 3196,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => 19,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => null,

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;
                            $totalTime = 0;

                            foreach ($services as $key => $value) {
                                $totalAmount += $value->TotalFee;
                                $totalTime += $value->Time;
                            }

                            ?>

                            <div class="doctyp-div">

                                <div class="col-sm-12">

                                    <!-- <h3 class="documtit-h3"><i class="fa fa-clipboard fa-doc"></i>&nbsp; <a href="/services/documents-legalization/federal-document/">Federal documents</a></h3> -->
                                    <h3 class="documtit-h3 open-service-table">
                                        <span><i class="fa fa-clipboard fa-doc"></i>&nbsp;  US Arab Chamber of Commerce - USACC</span> <button class="button-view-details">View details</button>
                                    </h3>
                                    <p class="totals-on-title">
                                        <span class="total-fee-number">
                                            <span style="color: #000;"> $<?= $totalAmount ?> </span> 
                                            per document, 
                                            <!-- <span style="color: #000;">$<?= ($totalAmount - 50) ?>  </span>
                                            for each additional documents. -->
                                        </span>
                                        <span style="color: green"> 
                                            Processing time is  
                                            <span class="total-time-number"  style="color: #000; "><?= $totalTime ?></span> 
                                            Business days.
                                        </span>    
                                    </p>

                                    <p class="service-table-container">
                                        US Arab Chamber of Commerce Stamp.
                                    </p>

                                </div>

                                <div class="col-sm-12 service-table-container">

                                    <div class="table-responsive">



                                        <table class="table table-bordered table-striped doctyp-tbl">

                                            <tbody>

                                                <tr>

                                                    <th width="60%">Service</th>

                                                    <!-- <th>Count</th> -->

                                                    <th>

                                                        Fee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>

                                                    <tr>

                                                        <td><b>

                                                                <?php echo $value->Name; ?>

                                                            </b></td>

                                                        <!-- <td>

                                                        <?php echo $value->Count; ?>

                                                        </td> -->

                                                        <td>

                                                            $

                                                            <?php echo $value->TotalFee; ?>

                                                        </td>

                                                    </tr>

                                                <?php } ?>

                                                <tr>

                                                    <td><b>Total Fees</b></td>

                                                    <td>

                                                        <b>$

                                                            <?php echo $totalAmount; ?>

                                                        </b>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                    </div>

                                </div>

                                <div class="col-sm-12 text-center service-table-container">

                                    <p class="clkinf-p">




                                    </p>

                                    <p>
                                        <a type="button" class="order-handle-case" data-case-consulate="0" data-case-arab="0" data-case-id="3196" data-case-name="USACC" data-toggle="modal" data-target="#exampleModal1">
                                            <button class="order-btn" style=" background-color: #b6030c; padding: 5px 65px;">Order</button>
                                        </a>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- END CASE 53 -->

                        <!-- Start New Cases for Saudi -->


                        <!-- End New Cases for Saudi -->
                    </div>

                    <div class="col-sm-4 main-sidebar">

                        <?php get_sidebar('Sidebar'); ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>