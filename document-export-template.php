<?php 

// Template Name: export commercial document

get_header();

//code...

?>



        <section class="blog ">



    

            <div class="container">

                <div class="title">

                    <h1>

                        Export Documents legalization:

                    </h1>



                </div>

      

           

                <p>

                    These include the Certificate of Origin, Commercial Invoice, Packing lists, and Certificate of

                    Conformity(COC). Before you can request our services, your document must be an original certificate,

                    signed by a company agent (blue ink), notarized by the local notary public, and certified by the

                    local notary public in the same state where the notary is licensed.

                </p>

                <ul>

                    <li>

                        Notary Public

                    </li>

                </ul>

                <!-- <section class="bgContainer"

                style=" background-position: left;   background-attachment: fixed;background-image:

                 url(<?php bloginfo('template_directory')?>/assets/images/doc.jpg);">

                <div class="title">

                    <p>

                        documents legalization

                    </p>

                </div>





            </section> -->

                <p>

                    The county clerk of the respective county where the notary public is commissioned; the county clerk

                    is normally stationed in the court of the specific county where the notary public is commissioned by

                    the U.S. Department of State.

                </p>

                <ul>

                    <li> Documents must be certified under the seal of the local branch of the State Department.</li>

                    <li>Documents must be authenticated by the State Department Authentication Division.</li>

                    <li> Fee: Payment must be made, either through mofa.gov.sa, or one of the authorized offices.</li>

                    <li> Documents must be sent to the Consular Section of the Embassy of the Kingdom of Saudi Arabia to

                        the United States of America. </li>



                </ul>

                <h3>

                    USACC will process the following certifications:



                </h3>

                <ol>

                    <li> Authentication by US Department of State in Washington, DC</li>

                    <li> Stamp of the US Arab Chamber of Commerce</li>

                    <li> Legalization by Egypt embassy or one of its consulates</li>



                </ol>

                <?php

                            $SelectedDocument = array(

                                    "DocumentCaseId" => 1154,

                                "HaveArabChamber" => false,

                                "IsArabChamber" => false,

                                "Count" => 1,

                                "ArabChamberCount" => null,

                                "ProductList" => null,

                                "SubDocumentId" => null,

                                "StateId" => null,

                                "InvoiceList" => null,

                                "ArroundTimeId" => null,

                                "SubDocList" => [
                                    [
                                        "subId" => 1004,
                                        "subCount" => 1
                                    ],
                                    [
                                        "subId" => 1005,
                                        "subCount" => 1
                                    ]
                                ],

                                "AkinJumpCount" => null

                            );

                            $services = get_services_without_post($SelectedDocument)->Services;

                            $totalAmount = 0;

                            

                            // echo "<pre>";

                            // print_r($services);

                            // echo "</pre>";

                            ?>



                <div class="row">

                    <div class="col-sm-offset-2 col-sm-8">

                        <div class="table-responsive">

                            <table class="table table-bordered table-striped doctyp-tbl">

                                <tbody>

                                    

                                    <tr>

                                        <th width="60%">Service requested</th>

                                        <!-- <th>Count</th> -->

                                        <th>

                                        TotalFee



                                        </th>



                                    </tr>



                                    <?php foreach ($services as $key  => $value) { ?>

                                        <tr>

                                            <td><b><?php echo $value->Name; ?></b></td>

                                            <!-- <td>

                                            <?php echo $value->Count; ?>

                                            </td> -->

                                            <td>

                                            $<?php echo $value->TotalFee; $totalAmount+=$value->TotalFee; ?>

                                            </td>

                                        </tr>



                                    <?php } ?>

                                    

                                    <tr>

                                        <td><b>Total</b></td>

                                        

                                        <td>

                                        <b>$<?php echo $totalAmount; ?></b>

                                        </td>

                                    </tr>



                                </tbody>

                            </table>

                        </div>



                    </div>



                </div>

                <div class="row">

                    <div class="col-sm-offset-5 col-sm-2">

                        <a type="button" data-case-arab="0" data-case-id="1154" data-case-name="Export Documents" class="btn btn-warning form-control pay-btn order-handle-case document-with-sub" data-toggle="modal" data-target="#exampleModal2">Order</a>

                    </div>

                </div>



                <h4>

                    Pay Attention



                </h4>

                <ul>

                    <li>The price does not include the shipping fee. Please include a prepaid self-addressed return

                        airway ticket in your package.</li>

                    <li>All documents must be original. If you have a copy, please call us first to confirm your request

                        before you send your package. (Not all documents can be legalized as copies)</li>

                    <li> Corporations can pay using a money order or company check.</li>

                    <li>Please include your personal details such as a daytime phone number, address, and email to

                        contact you if we encounter any problems.</li>

                    <li> Send your package to our Washington DC office at the following address:

                        <P>

                            US Arab Chamber of commerce

                            At Saudi Legalization

                            1330 New Hampshire Ave. B1, NW,

                            Washington DC 20036

                        </P>



                    </li>



                </ul>

                <h3>

                    Marriage/Birth/Death Certificates:

                </h3>

                <ul>

                    <li> Documents must be certified and must bear the seal of the U.S. Department of State. </li>

                    <li>Documents must be authenticated by the State Department Authentication Division. </li>

                    

                    



                

            </div>

        </section>



<?php

get_footer();

?>