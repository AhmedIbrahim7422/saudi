<?php
// Template Name: certified by state document
get_header();
//code...
?>

        <section class="blog">

    
            <div class="container">
                <div class="title">
                    <h1>
                        Documents Certified by the Secretary of State 
                    </h1>

                </div>
                <h3>Common Examples</h3>
                <div class="row">
                    <div class="col-md-4">
                        <ul>
                            <li> Power of Attorney </li>
                            <li> Affidavit </li>
                            <li> Packing list </li>
                            <li> Halal Certificate </li>
                            <li> Bill of Lading (Air, Ocean, Truck, Rail) </li>
                            <li> Insurance Certificate </li>
                            <li> Kosher Certificate </li>
                            <li> Dangerous Goods Certificate </li>
                            <li> Consular Invoice </li>
                            <li> Pro Forma Invoice </li>
                            <li> Letter of Credit </li>
                            <li> Bank Draft </li>
                            <li> Export Declaration </li>
                            <li> Shipper Letter of Instruction </li>
                         
                            <li> Certificate of Analysis </li>
                            <li> Pre-Shipment Inspection </li>
                            <li> Veterinary certificate </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                          
                         
                          
                            <li> Sales certificate </li>
                            <li> Weight Certificate </li>
                            <li> Fumigation Certificate </li>
                            <li> Certificate of Incumbency </li>
                            <li> Certificate of existence </li>
                            <li> Articles of Incorporation </li>
                            <li> Certificate of Merger </li>
                            <li> Corporate Resolution </li>
                            <li> Business License </li>
                            <li> Assignment </li>
                            <li> Shareholder certificate of Interest </li>
        
                            <li> Shareholder Contribution Schedule </li>
                            <li> Agreement to Form a Corporation </li>
                            <li> Stock Purchase Agreement </li>
                            <li> Agency Agreement </li>
                            <li> Business Letter </li>
                            <li> Letter of Authorization </li>
                            <li> Company Bylaws </li>
                           
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul>
                         
                            <li> Letter of Resignation </li>
                            <li> Distributor Agreement </li>
                            <li> Technical Data Sheet </li>
                            <li> Stock Certificate </li>
                            <li> Shareholder List </li>
                            <li> letter of Intent </li>
                            <li> Operating Agreement </li>
                            <li> Asset purchase Agreement </li>
                            <li> Bill of Sale </li>
                            <li> Change of Agent </li>
                            <li> Restated Certificate of Incorporation </li>
                            <li> Foreign Certificate of Registration </li>
                            <li> Termination of foreign Corporation </li>
                            <li> Statement of Dissolution </li>
                            <li> Amendment </li>
                            <li> Certificate of Formation </li>
                            <li> Corporate Consolidation </li>
        
                        </ul>
                    </div>
                </div>
                <section class="bgContainer"
                    style=" background-position: left;   background-attachment: fixed;background-image:
                        url(<?php bloginfo('template_directory')?>/assets/images/doc.jpg);">
                    <div class="title">
                        <p>
                            documents legalization
                        </p>
                    </div>


                </section>
                <h4>
                    Pay Attention

                </h4>
                <ul>
                    <li> The price does not include the shipping fee. Please include a prepaid airway ticket with your
                        package. </li>
                    <li> All documents must be original. If you have a copy, please call us first to confirm your
                        request before you send your package. (Not all documents can be legalized as copies) </li>
                    <li> The billing option is available for corporations that have a current “ G-account” only. </li>
                    <li> Corporations can pay using a money order or company check. </li>
                    <li> Please include your personal details such as a daytime phone number, address, and email to
                        contact you if we encounter any problems. </li>
                    <li> Send your package to our Washington DC office at the following address:
                        <p>
                            US Arab Chamber of commerce
                            <br>At Saudi Legalization
                            <br>1330 New Hampshire Ave. B1, NW,
                            <br>Washington DC 20036
                        </p>
                    </li>

                </ul>
                <?php
                                $SelectedDocument = array(
                                    "DocumentCaseId" => 1794,
                                    "HaveArabChamber" => 0,
                                    "IsArabChamber" => 0,
                                    "Count" => 1,
                                    "ArabChamberCount" => 0,
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
                            <a type="button" data-case-arab="0" data-case-id="1794" data-case-name="Corporate Document Signed and Notarized" class="btn btn-warning form-control pay-btn order-handle-case"  data-toggle="modal" data-target="#exampleModal3">Order</a>
                        </div>
                    </div>
            </div>

        </section>


<?php
get_footer();