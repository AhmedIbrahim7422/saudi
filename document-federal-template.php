<?php
// Template Name: federal document
get_header();
//code...
?> 

        <section class="blog">

   
            <div class="container">
                <div class="title">
                    <h1>
                    Federal Documents Legalization
                    </h1>

                </div>
        
                <p>
                    A federal document must be issued through a U.S. federal agency, such as FDA, FBI, USDA, DHS, IRS,
                    HHS, EPA, DOJ, DOS, DOE, APHIS, SSA and USPTO...etc.
                    The document must be original, signed by a federal official, and bear the seal of the federal agency
                    that issued the document.

                </p>
                <h3>
                    The document will be:
                </h3>
                <ul>
                    <li>
                        Certified under the seal of the U.S. Department of State. </li>
                    <li> Authenticated by the State Department Authentication Division.</li>


                    <li> <b>Fee:</b> Payment must be made, either through mofa.gov.sa, or one of the authorized offices.
                    </li>
                    <li>Documents must be sent to the Consular Section of the Embassy of the Kingdom of Saudi
                        Arabia in the United States of America.</li>


                </ul>
                
                <?php
                            $SelectedDocument = array(
                                 "DocumentCaseId" => 1792,
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
                            // print_r($services);
                            ?>

                            <div class="row">
                                <div class=" col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped doctyp-tbl">
                                            <tbody>
                                                <tr>
                                                    <th>Service requested</th>
                                                    <!-- <th>Count</th> -->
                                                    <th>
                                                    TotalFee

                                                    </th>

                                                </tr>

                                                <?php foreach ($services as $key => $value) { ?>
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
                                    <a type="button" data-case-arab="0" data-case-id="1792" data-case-name="Federal documents" class="btn btn-warning form-control pay-btn order-handle-case" data-toggle="modal" data-target="#exampleModal1">Order</a>
                                </div>
                            </div>
                <br> 
                <hr>
                <br><br>
                <section class="bgContainer"
            style=" background-position: left;   background-attachment: fixed;background-image:
                url(<?php bloginfo('template_directory')?>/assets/images/doc.jpg);">
            <div class="title">
                <p>
                    documents legalization
                </p>
            </div>


        </section>
                <h2>
                    Federally Issued Documents - Common Certificates

                </h2>
                <div class="row">
                    <div class="col-md-4">
                        <ul>
                            <li> Risk of Bovine Origin Materials </li>
                            <li> Certificate to Foreign Government - CFG </li>
                            <li> CertificateSpecified of Pharmaceutical Product </li>
                            <li> U.S. Tax Residency - Form 6166 </li>
                            <li> Certificate of Free Sale - CFS </li>
                            <li> Certificate of Exportability </li>
                   
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                            <li> COPP - Foreign Manufacturer </li>
                            <li> Non- Clinical Research Use </li>
                            <li> Sanitation certificate </li>
                            <li> Phytosanitary Certificate </li>
                            <li> Animal Health certificate </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                  
                    
                            <li> Plant Certificate </li>
                            <li> Patent - Trademark </li>
                            <li> FBI background Check </li>
                            <li> Naturalization Certificate </li>
                            <li> S.S.A. Benefit Letter </li>
                        </ul>
                    </div>
                </div>
                <br> 
                <hr>
                <br><br>
                <h2>
                    U.S. Federal Government - Federal Agencies
                </h2>
                <div class="row">
                    <div class="col-md-8">
                        <ul>
                            <li> Centers for Disease Control and Prevention and Agency for Toxic Substances and Disease Registry
                                - CDC/ATSDR (HHS) </li>
                            <li> Bureau of Alcohol, Tobacco, Firearms, and Explosives - ATF (DOJ) </li>
                            <li> Center for Medicare & Medicaid Services - CMS (HHS) </li>
                            <li> Food & Drug Administration - FDA (HHS) </li>
                            <li> Department of Health and Human Services </li>
                            <li> National Institutes of Health - NIH (HHS) </li>
                            <li> Drug Enforcement Administration - DEA (DOJ) </li>
                            <li> Department of Justice - DOJ </li>
          
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                   
                            <li> Department of Labor - DOL </li>
                            <li> Department of Commerce - DOC </li>
                            <li> Department of State - DOS </li>
                            <li> Food Safety & Inspection Service - FSIS (USDA) </li>
                            <li> Department of Agriculture - USDA </li>
                            <li> Department of Veterans Affairs </li>
                            <li> Office of the U.S. Trade Representative - USTR </li>
                            <li> Social Security Administration SSA </li>
                        </ul>
                    </div>
                </div>


                <h4>Pay Attention</h4>
                <ul>
                    <li> The price does not include the shipping fee. Please include a prepaid airway ticket with your
                        package.</li>
                    <li> All documents must be original. If you have a copy, please call us first to confirm your
                        request before you send your package. (Not all documents can be legalized as copies)</li>
                    <li> The billing option is available for corporations that have a current “ G-account” only.</li>
                    <li> Corporations can pay using a money order or company check.</li>
                    <li> Please include your personal details such as a daytime phone number, address, and email to
                        contact you if we encounter any problems.</li>
                    <li> Send your package to our Washington DC office at the following address:
                        <p>
                            US Arab Chamber of commerce
                            <br>At Saudi Legalization
                            <br> 1330 New Hampshire Ave. B1, NW,
                            <br> Washington DC 20036
                        </p>
                    </li>
                </ul>
            </div>
        </section>

<?php
get_footer();