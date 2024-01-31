<?php

// Template Name: Order Form 2

session_start();

get_header();



@$session = retreive_session();



$websiteData = retrieveWebsiteData();



// echo "<pre>";

// print_r($session['user']['fedexData']);

// echo "</pre>";



    if (!isset($session['user']['serviceInfo']) && !isset($session['lastOrder22'])) {

        ?> 

        <section style="height: 50vh">

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



    <section class="container">

        <div class="order-form-22 the-order-form-fields" style="<?php echo (isset($session['user']['currentStep']) && $session['user']['currentStep'] == 1) ? "display:block;" :  "display:none;"; ?>">

            

            <div class="block-Gray">

                <!-- <h2>United State Apostile</h2> -->

                <h3>Application for Expedited Service.</h3>

                <div class="">

                    <div class=" content-Info">

                        <form>

                            <div class="p-12" style="font-weight: bold;">

                                <div class="row busDays">

                                <?php 

                                    $date = date('d m y');

                                    $time = 0;

                                    $totalFee = 0;

                                    foreach ($session['user']['serviceInfo']['table'] as $key => $value) {

                                        # code...

                                        $time += $value->Time;

                                        $totalFee += $value->TotalFee;

                                    }

                                    ?>



                                    <p>

                                        This service is provided by US Arab Chamber of Commerce

                                    </p>

                                </div>

                                    

                                    <h1 class=" h1-main" style="text-transform: capitalize; font-size: 28px; color: rgb(193 0 25);"><i class="fa-solid fa-pencil"></i> Please complete this form...</h1>

                            </div> 

                            <div class="form1">

                                <div class="row"> 

                                    <div class="form-group col-md-6">

                                        <label for="email_address_of22">Email</label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['email'])) ? $session['user']['userInfo']['email'] : "" ?>" type="email" class="form-control" id="email_address_of22" placeholder="Email">

                                    </div>

                                    <div class="form-group col-md-4 col-8">

                                        <label for="company_of22">Company Name</label>

                                        <input type="text" class="form-control" id="company_of22" placeholder="company name" >

                                    </div>

                                    <div class="col-md-2 col-4 p-0 ps-3" style="height: 47px;">

                                        <div class=" checkOut" style="margin-top: 30px;">

                                            <div class="form-group form-check" id="individual" style="display:flex; margin: 0;padding: 0;">

                                                <div style="margin-right:6px;">

                                                    <input type="checkbox" class="form-control individual-radio" style="display:inline-block;" name="individual">

                                                </div>

                                                <label style="font-size:15px;display:inline;line-height: 13px;">I have a personal document</label>

                                            </div>



                                        </div>

                                    </div>

                                    <div class="col-md-6 row p-0">

                                        <div class="form-group col-8 inoutUSAZip" style="position: relative;">

                                            <label for="zipcode_of22">Zipcode</label>

                                            <input value="<?php echo (isset($session['user']['userInfo']['zipcode'])) ? $session['user']['userInfo']['zipcode'] : "" ?>" type="text" class="form-control" id="zipcode_of22" maxlength="5">

                                        </div>

                                        <div class="col-4">

                                            <div class=" checkOut">

                                                <div class="form-check" style="padding-top: 30px;">

                                                    <input class="form-check-input" type="checkbox" id="outUsaCheckBox" name="outside" value="1">

                                                    <label class="form-check-label" for="OutUSA" style="font-size: 15px;">

                                                        Out USA

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for="address_of22">Address <span class="outUSA" style="font-size: 20px; display: inline-block;">1</span></label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['address'])) ? $session['user']['userInfo']['address'] : "" ?>" type="text" class="form-control" id="address_of22" placeholder="1234 Main St">

                                    </div>

                                    <div class="form-group col-md-6" style=" ">

                                        <label for="firstname_of22">First Name</label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['firstname'])) ? $session['user']['userInfo']['firstname'] : "" ?>" type="text" class="form-control" id="firstname_of22" placeholder="First Name">

                                    </div>

                                    <div class="form-group col-md-6" style="padding-right:0">

                                        <label for="lastname_of22">Last Name</label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['lastname'])) ? $session['user']['userInfo']['lastname'] : "" ?>" type="text" class="form-control" id="lastname_of22" placeholder="Last Name">

                                    </div>

                                    <div class="form-group col-md-4 outUSA" style=" display: none;">

                                        <label for="inputAddress">Address <span class="outUSA" style="font-size: 20px; display: inline-block;">2</span><span style="font-size: 14px">(optional)</span></label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['address2'])) ? $session['user']['userInfo']['address2'] : "" ?>" type="text" class="form-control" id="address2_of22" placeholder="Address line 2">

                                    </div>

                                    <div class="form-group col-md-4 ">

                                        <label for="tel_of22">Company Phone </label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['tel'])) ? $session['user']['userInfo']['tel'] : ""; ?>" type="text" class="form-control" id="tel_of22" placeholder="Company Phone" maxlength="14">

                                    </div>

                                    

                                    <div class="form-group col-md-4 inUSA" style="padding-right:0">

                                        <label for="tel_cell">Cell Phone <span>(optional)</span></label>

                                        <input type="text" class="form-control" id="tel_cell" placeholder="Cell Phone">

                                    </div>

                                    <div class="form-group col-md-4 " style="padding-right:0">

                                        <label for="tel_cell">Reference</label>

                                        <input type="text" class="form-control" id="reference" placeholder="Reference">

                                    </div>

                                    

                                    <div class="form-group col-md-6 inoutUSACity">

                                        <label for="city_of22">City</label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['city'])) ? $session['user']['userInfo']['city'] : "" ?>" disabled type="text" class="form-control" id="city_of22">

                                    </div>
                                    <div class="form-group col-md-6 outUSA" style="padding-right:0;display:none;">

                                        <label for="tel_cell">Country</label>

                                        <select id="country_of22" type="text" name="country" class="form-control">

                                            <option value="">Select Country</option>

                                            <option data-code="AF" value="Afghanistan">Afghanistan</option>

                                            <option data-code="AX" value="Aland Islands">Aland Islands</option>

                                            <option data-code="AL" value="Albania">Albania</option>

                                            <option data-code="DZ" value="Algeria">Algeria</option>

                                            <option data-code="AS" value="American Samoa">American Samoa</option>

                                            <option data-code="AD" value="Andorra">Andorra</option>

                                            <option data-code="AO" value="Angola">Angola</option>

                                            <option data-code="AI" value="Anguilla">Anguilla</option>

                                            <option data-code="AQ" value="Antarctica">Antarctica</option>

                                            <option data-code="AG" value="Antigua And Barbuda">Antigua And Barbuda</option>

                                            <option data-code="AR" value="Argentina">Argentina</option>

                                            <option data-code="AM" value="Armenia">Armenia</option>

                                            <option data-code="AW" value="Aruba">Aruba</option>

                                            <option data-code="AU" value="Australia">Australia</option>

                                            <option data-code="AT" value="Austria">Austria</option>

                                            <option data-code="AZ" value="Azerbaijan">Azerbaijan</option>

                                            <option data-code="BS" value="Bahamas">Bahamas</option>

                                            <option data-code="BH" value="Bahrain">Bahrain</option>

                                            <option data-code="BD" value="Bangladesh">Bangladesh</option>

                                            <option data-code="BB" value="Barbados">Barbados</option>

                                            <option data-code="BY" value="Belarus">Belarus</option>

                                            <option data-code="BE" value="Belgium">Belgium</option>

                                            <option data-code="BZ" value="Belize">Belize</option>

                                            <option data-code="BJ" value="Benin">Benin</option>

                                            <option data-code="BM" value="Bermuda">Bermuda</option>

                                            <option data-code="BT" value="Bhutan">Bhutan</option>

                                            <option data-code="BO" value="Bolivia">Bolivia</option>

                                            <option data-code="BA" value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>

                                            <option data-code="BW" value="Botswana">Botswana</option>

                                            <option data-code="BV" value="Bouvet Island">Bouvet Island</option>

                                            <option data-code="BR" value="Brazil">Brazil</option>

                                            <option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>

                                            <option data-code="BN" value="Brunei Darussalam">Brunei Darussalam</option>

                                            <option data-code="BG" value="Bulgaria">Bulgaria</option>

                                            <option data-code="BF" value="Burkina Faso">Burkina Faso</option>

                                            <option data-code="BI" value="Burundi">Burundi</option>

                                            <option data-code="KH" value="Cambodia">Cambodia</option>

                                            <option data-code="CM" value="Cameroon">Cameroon</option>

                                            <option data-code="CA" value="Canada">Canada</option>

                                            <option data-code="CV" value="Cape Verde">Cape Verde</option>

                                            <option data-code="KY" value="Cayman Islands">Cayman Islands</option>

                                            <option data-code="CF" value="Central African Republic">Central African Republic</option>

                                            <option data-code="TD" value="Chad">Chad</option>

                                            <option data-code="CL" value="Chile">Chile</option>

                                            <option data-code="CN" value="China">China</option>

                                            <option data-code="CX" value="Christmas Island">Christmas Island</option>

                                            <option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

                                            <option data-code="CO" value="Colombia">Colombia</option>

                                            <option data-code="KM" value="Comoros">Comoros</option>

                                            <option data-code="CG" value="Congo">Congo</option>

                                            <option data-code="CD" value="Congo, Democratic Republic">Congo, Democratic Republic</option>

                                            <option data-code="CK" value="Cook Islands">Cook Islands</option>

                                            <option data-code="CR" value="Costa Rica">Costa Rica</option>

                                            <option data-code="CI" value="Cote D ivoire">Cote D'Ivoire</option>

                                            <option data-code="HR" value="Croatia">Croatia</option>

                                            <option data-code="CU" value="Cuba">Cuba</option>

                                            <option data-code="CY" value="Cyprus">Cyprus</option>

                                            <option data-code="CZ" value="Czech Republic">Czech Republic</option>

                                            <option data-code="DK" value="Denmark">Denmark</option>

                                            <option data-code="DJ" value="Djibouti">Djibouti</option>

                                            <option data-code="DM" value="Dominica">Dominica</option>

                                            <option data-code="DO" value="Dominican Republic">Dominican Republic</option>

                                            <option data-code="EC" value="Ecuador">Ecuador</option>

                                            <option data-code="EG" value="Egypt">Egypt</option>

                                            <option data-code="SV" value="El Salvador">El Salvador</option>

                                            <option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>

                                            <option data-code="ER" value="Eritrea">Eritrea</option>

                                            <option data-code="EE" value="Estonia">Estonia</option>

                                            <option data-code="ET" value="Ethiopia">Ethiopia</option>

                                            <option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>

                                            <option data-code="FO" value="Faroe Islands">Faroe Islands</option>

                                            <option data-code="FJ" value="Fiji">Fiji</option>

                                            <option data-code="FI" value="Finland">Finland</option>

                                            <option data-code="FR" value="France">France</option>

                                            <option data-code="GF" value="French Guiana">French Guiana</option>

                                            <option data-code="PF" value="French Polynesia">French Polynesia</option>

                                            <option data-code="TF" value="French Southern Territories">French Southern Territories</option>

                                            <option data-code="GA" value="Gabon">Gabon</option>

                                            <option data-code="GM" value="Gambia">Gambia</option>

                                            <option data-code="GE" value="Georgia">Georgia</option>

                                            <option data-code="DE" value="Germany">Germany</option>

                                            <option data-code="GH" value="Ghana">Ghana</option>

                                            <option data-code="GI" value="Gibraltar">Gibraltar</option>

                                            <option data-code="GR" value="Greece">Greece</option>

                                            <option data-code="GL" value="Greenland">Greenland</option>

                                            <option data-code="GD" value="Grenada">Grenada</option>

                                            <option data-code="GP" value="Guadeloupe">Guadeloupe</option>

                                            <option data-code="GU" value="Guam">Guam</option>

                                            <option data-code="GT" value="Guatemala">Guatemala</option>

                                            <option data-code="GG" value="Guernsey">Guernsey</option>

                                            <option data-code="GN" value="Guinea">Guinea</option>

                                            <option data-code="GW" value="Guinea-Bissau">Guinea-Bissau</option>

                                            <option data-code="GY" value="Guyana">Guyana</option>

                                            <option data-code="HT" value="Haiti">Haiti</option>

                                            <option data-code="HM" value="Heard Island &amp; Mcdonald Islands">Heard Island &amp; Mcdonald Islands</option>

                                            <option data-code="VA" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>

                                            <option data-code="HN" value="Honduras">Honduras</option>

                                            <option data-code="HK" value="Hong Kong">Hong Kong</option>

                                            <option data-code="HU" value="Hungary">Hungary</option>

                                            <option data-code="IS" value="Iceland">Iceland</option>

                                            <option data-code="IN" value="India">India</option>

                                            <option data-code="ID" value="Indonesia">Indonesia</option>

                                            <option data-code="IR" value="Iran">Iran</option>

                                            <option data-code="IQ" value="Iraq">Iraq</option>

                                            <option data-code="IE" value="Ireland">Ireland</option>

                                            <option data-code="IM" value="Isle Of Man">Isle Of Man</option>

                                            <option data-code="IL" value="Israel">Israel</option>

                                            <option data-code="IT" value="Italy">Italy</option>

                                            <option data-code="JM" value="Jamaica">Jamaica</option>

                                            <option data-code="JP" value="Japan">Japan</option>

                                            <option data-code="JE" value="Jersey">Jersey</option>

                                            <option data-code="JO" value="Jordan">Jordan</option>

                                            <option data-code="KZ" value="Kazakhstan">Kazakhstan</option>

                                            <option data-code="KE" value="Kenya">Kenya</option>

                                            <option data-code="KI" value="Kiribati">Kiribati</option>

                                            <option data-code="KR" value="Korea">Korea</option>

                                            <option data-code="KW" value="Kuwait">Kuwait</option>

                                            <option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>

                                            <option data-code="LA" value="Lao People's democratic republic">Lao People's Democratic Republic</option>

                                            <option data-code="LV" value="Latvia">Latvia</option>

                                            <option data-code="LB" value="Lebanon">Lebanon</option>

                                            <option data-code="LS" value="Lesotho">Lesotho</option>

                                            <option data-code="LR" value="Liberia">Liberia</option>

                                            <option data-code="LY" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>

                                            <option data-code="LI" value="Liechtenstein">Liechtenstein</option>

                                            <option data-code="LT" value="Lithuania">Lithuania</option>

                                            <option data-code="LU" value="Luxembourg">Luxembourg</option>

                                            <option data-code="MO" value="Macao">Macao</option>

                                            <option data-code="MK" value="Macedonia">Macedonia</option>

                                            <option data-code="MG" value="Madagascar">Madagascar</option>

                                            <option data-code="MW" value="Malawi">Malawi</option>

                                            <option data-code="MY" value="Malaysia">Malaysia</option>

                                            <option data-code="MV" value="Maldives">Maldives</option>

                                            <option data-code="ML" value="Mali">Mali</option>

                                            <option data-code="MT" value="Malta">Malta</option>

                                            <option data-code="MH" value="Marshall Islands">Marshall Islands</option>

                                            <option data-code="MQ" value="Martinique">Martinique</option>

                                            <option data-code="MR" value="Mauritania">Mauritania</option>

                                            <option data-code="MU" value="Mauritius">Mauritius</option>

                                            <option data-code="YT" value="Mayotte">Mayotte</option>

                                            <option data-code="MX" value="Mexico">Mexico</option>

                                            <option data-code="FM" value="Micronesia, Federated States Of">Micronesia, Federated States Of</option>

                                            <option data-code="MD" value="Moldova">Moldova</option>

                                            <option data-code="MC" value="Monaco">Monaco</option>

                                            <option data-code="MN" value="Mongolia">Mongolia</option>

                                            <option data-code="ME" value="Montenegro">Montenegro</option>

                                            <option data-code="MS" value="Montserrat">Montserrat</option>

                                            <option data-code="MA" value="Morocco">Morocco</option>

                                            <option data-code="MZ" value="Mozambique">Mozambique</option>

                                            <option data-code="MM" value="Myanmar">Myanmar</option>

                                            <option data-code="NA" value="Namibia">Namibia</option>

                                            <option data-code="NR" value="Nauru">Nauru</option>

                                            <option data-code="NP" value="Nepal">Nepal</option>

                                            <option data-code="NL" value="Netherlands">Netherlands</option>

                                            <option data-code="AN" value="Netherlands Antilles">Netherlands Antilles</option>

                                            <option data-code="NC" value="New Caledonia">New Caledonia</option>

                                            <option data-code="NZ" value="New Zealand">New Zealand</option>

                                            <option data-code="NI" value="Nicaragua">Nicaragua</option>

                                            <option data-code="NE" value="Niger">Niger</option>

                                            <option data-code="NG" value="Nigeria">Nigeria</option>

                                            <option data-code="NU" value="Niue">Niue</option>

                                            <option data-code="NF" value="Norfolk Island">Norfolk Island</option>

                                            <option data-code="MP" value="Northern Mariana Islands">Northern Mariana Islands</option>

                                            <option data-code="NO" value="Norway">Norway</option>

                                            <option data-code="OM" value="Oman">Oman</option>

                                            <option data-code="PK" value="Pakistan">Pakistan</option>

                                            <option data-code="PW" value="Palau">Palau</option>

                                            <option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>

                                            <option data-code="PA" value="Panama">Panama</option>

                                            <option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>

                                            <option data-code="PY" value="Paraguay">Paraguay</option>

                                            <option data-code="PE" value="Peru">Peru</option>

                                            <option data-code="PH" value="Philippines">Philippines</option>

                                            <option data-code="PN" value="Pitcairn">Pitcairn</option>

                                            <option data-code="PL" value="Poland">Poland</option>

                                            <option data-code="PT" value="Portugal">Portugal</option>

                                            <option data-code="PR" value="Puerto Rico">Puerto Rico</option>

                                            <option data-code="QA" value="Qatar">Qatar</option>

                                            <option data-code="RE" value="Reunion">Reunion</option>

                                            <option data-code="RO" value="Romania">Romania</option>

                                            <option data-code="RU" value="Russian Federation">Russian Federation</option>

                                            <option data-code="RW" value="Rwanda">Rwanda</option>

                                            <option data-code="BL" value="Saint Barthelemy">Saint Barthelemy</option>

                                            <option data-code="SH" value="Saint Helena">Saint Helena</option>

                                            <option data-code="KN" value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>

                                            <option data-code="LC" value="Saint Lucia">Saint Lucia</option>

                                            <option data-code="MF" value="Saint Martin">Saint Martin</option>

                                            <option data-code="PM" value="Saint Pierre And Miquelon">Saint Pierre And Miquelon</option>

                                            <option data-code="VC" value="Saint Vincent And Grenadines">Saint Vincent And Grenadines</option>

                                            <option data-code="WS" value="Samoa">Samoa</option>

                                            <option data-code="SM" value="San Marino">San Marino</option>

                                            <option data-code="ST" value="Sao Tome And Principe">Sao Tome And Principe</option>

                                            <option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>

                                            <option data-code="SN" value="Senegal">Senegal</option>

                                            <option data-code="RS" value="Serbia">Serbia</option>

                                            <option data-code="SC" value="Seychelles">Seychelles</option>

                                            <option data-code="SL" value="Sierra Leone">Sierra Leone</option>

                                            <option data-code="SG" value="Singapore">Singapore</option>

                                            <option data-code="SK" value="Slovakia">Slovakia</option>

                                            <option data-code="SI" value="Slovenia">Slovenia</option>

                                            <option data-code="SB" value="Solomon Islands">Solomon Islands</option>

                                            <option data-code="SO" value="Somalia">Somalia</option>

                                            <option data-code="ZA" value="South Africa">South Africa</option>

                                            <option data-code="GS" value="South Georgia And Sandwich Isl.">South Georgia And Sandwich Isl.</option>

                                            <option data-code="ES" value="Spain">Spain</option>

                                            <option data-code="LK" value="Sri Lanka">Sri Lanka</option>

                                            <option data-code="SD" value="Sudan">Sudan</option>

                                            <option data-code="SR" value="Suriname">Suriname</option>

                                            <option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option>

                                            <option data-code="SZ" value="Swaziland">Swaziland</option>

                                            <option data-code="SE" value="Sweden">Sweden</option>

                                            <option data-code="CH" value="Switzerland">Switzerland</option>

                                            <option data-code="SY" value="Syrian Arab Republic">Syrian Arab Republic</option>

                                            <option data-code="TW" value="Taiwan">Taiwan</option>

                                            <option data-code="TJ" value="Tajikistan">Tajikistan</option>

                                            <option data-code="TZ" value="Tanzania">Tanzania</option>

                                            <option data-code="TH" value="Thailand">Thailand</option>

                                            <option data-code="TL" value="Timor-Leste">Timor-Leste</option>

                                            <option data-code="TG" value="Togo">Togo</option>

                                            <option data-code="TK" value="Tokelau">Tokelau</option>

                                            <option data-code="TO" value="Tonga">Tonga</option>

                                            <option data-code="TT" value="Trinidad And Tobago">Trinidad And Tobago</option>

                                            <option data-code="TN" value="Tunisia">Tunisia</option>

                                            <option data-code="TR" value="Turkey">Turkey</option>

                                            <option data-code="TM" value="Turkmenistan">Turkmenistan</option>

                                            <option data-code="TC" value="Turks And Caicos Islands">Turks And Caicos Islands</option>

                                            <option data-code="TV" value="Tuvalu">Tuvalu</option>

                                            <option data-code="UG" value="Uganda">Uganda</option>

                                            <option data-code="UA" value="Ukraine">Ukraine</option>

                                            <option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>

                                            <option data-code="GB" value="United Kingdom">United Kingdom</option>

                                            <option data-code="UY" value="Uruguay">Uruguay</option>

                                            <option data-code="UZ" value="Uzbekistan">Uzbekistan</option>

                                            <option data-code="VU" value="Vanuatu">Vanuatu</option>

                                            <option data-code="VE" value="Venezuela">Venezuela</option>

                                            <option data-code="VN" value="Viet Nam">Viet Nam</option>

                                            <option data-code="VG" value="Virgin Islands, British">Virgin Islands, British</option>

                                            <option data-code="VI" value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>

                                            <option data-code="WF" value="Wallis And Futuna">Wallis And Futuna</option>

                                            <option data-code="EH" value="Western Sahara">Western Sahara</option>

                                            <option data-code="YE" value="Yemen">Yemen</option>

                                            <option data-code="ZM" value="Zambia">Zambia</option>

                                            <option data-code="ZW" value="Zimbabwe">Zimbabwe</option>

                                        </select>

                                        <input type="hidden" id="selectedCountryCode" name="countryCode" value="">

                                    </div>

                                    <div class="form-group col-md-6 inUSA" style="">

                                        <label for="state_of22">State</label>

                                        <input value="<?php echo (isset($session['user']['userInfo']['state'])) ? $session['user']['userInfo']['state'] : "" ?>" disabled type="text" class="form-control" id="state_of22">

                                    </div>

                                </div>

                               

                                

                              

                            </div>

                            <br>

                        </form> 

                    </div>

                </div>

            

            </div>

            <div class="row actions-Btn">

                <div class="">

                    <button class="btn btn-info backBtn backbtnof22"> back</button>

                </div>

                <div class=" d-flex   justify-content-end">

                    <a class="btn btn-danger nextBtn nxtbtnof22" data-currentstep="1" data-next="the-shipping-option-inputs" type="button"> Next</a>

                </div>

            </div>

            

        </div>



        <!-- shipping -->



        <div class="order-form-22 the-shipping-option-inputs" style="<?php echo (isset($session['user']['currentStep']) && $session['user']['currentStep'] == 2) ? "display:block;" :  "display:none;"; ?>">

            

            

                <div class="row">

                    <div class="col-md-12">

                        <h2 style="padding-top: 30px; padding-left: 20px; color: #c21125">

                            Shipping

                        </h2>

                        <form class="" style="padding-left: 25px">

                            <br>

                        

                            <div class="p-12 radio-Container">

                        

                                <div class="form-row shippingoptiontype">

                                    <div class="col-xs-12 p-0">

                                        <div class="form-check ">

                                            <input class="form-check-input col-xs-1 shipping-option-of22 fedex-type-to-get-value" type="radio" name="shipping_info" id="myown_shipping" value="own">

                                            <label class="form-check-label col-xs-11" for="myown_shipping">

                                                I will ship my document(s) using my own account

                                            </label>

                                        </div>

                                    </div>

                                </div>



                                <div class="form-row shippingoptiontype outUSA" style="<?php echo (isset($session['user']['userInfo']['outUsa']) && $session['user']['userInfo']['outUsa'] == 1) ? "display:block;" : "display:none;" ?>">

                                    <div class="col-xs-12 p-0">

                                        <div class="form-check ">

                                            <input class="form-check-input col-xs-1 shipping-option-of22 fedex-type-to-get-value international-outusa" type="radio" name="shipping_info" id="international_shipping" value="international">

                                            <label class="form-check-label col-xs-11" for="international_shipping">

                                                International FedEx envelope for $65

                                            </label>

                                        </div>

                                    </div>

                                </div>

                        

                                <!--<div class="form-row shippingoptiontype">

                                    <div class="col-xs-12 p-0">

                                        <div class="form-check ">

                                            <input class="form-check-input col-xs-1 shipping-option-of22 box-check2" type="radio" name="shipping_info" id="2days_shipping" value="2days">

                                            <label class="form-check-label col-xs-11" for="2days_shipping" id="2days_fedex">

                                                I would like to buy 2 FedEx airway bills based on <span style="color: red;font-size:27px;">2</span> days delivery for $<span class="single_envelope" style="font-size:27px;"><?php echo (isset($session['user']['rate_from'][0])) ? $session['user']['rate_from'][0] : "11"; ?></span> each. Total of $<span class="double_envelopes" style="font-size:27px;"><?php echo (isset($session['user']['rate_from'])) ? $session['user']['rate_from'][0]*2 : "11"; ?></span>  (48 states)

                                            </label>

                                        </div>

                                    </div>

                                </div>-->

                                <!-- 

                                    shipping-use-egypt



                                    buy-fedex-sendto

                                    buy-fedex-return

                             -->

                                <div class="form-row shippingoptiontype portorico inUSA" style="<?php echo ((isset($session['user']['userInfo']['outUsa']) && $session['user']['userInfo']['outUsa'] == 1) || isset($session['portorico'])) ? "display:none;" : "display:block;" ?>">

                                    <div class="col-xs-12 p-0">

                                        <div class="form-check ">

                                            <input class="form-check-input col-xs-1 shipping-use-egypt box-check" type="radio" name="shipping_info" id="use-owr-shipping" value="1day">

                                            <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                Use Egypt Embassy Shipping to ship or return my documents.

                                            </label>

                                        </div>

                                    </div>

                                </div>

                                <div class="fedex-types-container additional-innusa portorico" style="display: none;">

                                    <div class="form-row shippingoptiontype">

                                        <div class="col-xs-12 p-0">

                                            <div class="form-check ">

                                                <input class="form-check-input col-xs-1 buy-fedex-sendto box-check checkbox-new-shipping" type="checkbox" id="shippingFromUserChoice" value="1day">

                                                <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                    buy fedex to send my documents to Egypt Embassy

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="fedex-shipping-from" style="display:none;">

                                        <div class="form-row shippingoptiontype">

                                            <div class="col-xs-12 p-0">

                                                <div class="form-check ">

                                                    <input class="form-check-input col-xs-1 shipping-option-of22 box-check fedex-type-to-get-value" type="radio" name="shipping_info_sendto" id="1day_shipping" value="2dayfrom">

                                                    <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                        2 days delivery (by the end of the day) for $<span class="single_envelope" style="font-size:27px;"><?php echo (isset($session['user']['rate_from'])) ? $session['user']['rate_from'][0] : "20"; ?></span> (Billing is not available).

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-row shippingoptiontype">

                                            <div class="col-xs-12 p-0">

                                                <div class="form-check ">

                                                    <input class="form-check-input col-xs-1 shipping-option-of22 box-check fedex-type-to-get-value" type="radio" name="shipping_info_sendto" id="1day_shipping" value="1dayfrom">

                                                    <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                        A Priority next day delivery (by 10:30 AM) for $<span class="single_envelope_next" style="font-size:27px;"><?php echo (isset($session['user']['rate_from'])) ? $session['user']['rate_from'][1] : "35"; ?></span> (Billing is not available).

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-row shippingoptiontype">

                                        <div class="col-xs-12 p-0">

                                            <div class="form-check ">

                                                <input class="form-check-input col-xs-1 buy-fedex-return box-check checkbox-new-shipping" type="checkbox" id="shippingToUserChoice" value="1day">

                                                <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                buy fedex to return my documents from Egypt Embassy

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <!-- 2 days delivery (by the end of the day) for $20 (Billing is not available)



                                    A Priority next day delivery (by 10:30 AM) for $35 (Billing is not available)



                                    An International FedEx airway bill for estimated fee of $65 -->

                                    <div class="fedex-shipping-to" style="display:none;">

                                        <div class="form-row shippingoptiontype">

                                            <div class="col-xs-12 p-0">

                                                <div class="form-check ">

                                                    <input class="form-check-input col-xs-1 shipping-option-of22 box-check fedex-type-to-get-value fedex-to-choice" type="radio" name="shipping_info_return" id="1day_shipping" value="2dayto">

                                                    <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                    2 days delivery (by the end of the day) for $<span class="single_envelope" style="font-size:27px;"><?php echo (isset($session['user']['rate_to'])) ? $session['user']['rate_to'][0] : "20"; ?></span> (Billing is not available).

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-row shippingoptiontype">

                                            <div class="col-xs-12 p-0">

                                                <div class="form-check ">

                                                    <input class="form-check-input col-xs-1 shipping-option-of22 box-check fedex-type-to-get-value fedex-to-choice" type="radio" name="shipping_info_return" id="1day_shipping" value="1dayto">

                                                    <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                    A Priority next day delivery (by 10:30 AM) for $<span class="single_envelope_next" style="font-size:27px;"><?php echo (isset($session['user']['rate_to'])) ? $session['user']['rate_to'][1] : "35"; ?></span> (Billing is not available).

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-row shippingoptiontype">

                                            <div class="col-xs-12 p-0">

                                                <div class="form-check ">

                                                    <input class="form-check-input col-xs-1 shipping-option-of22 box-check fedex-type-to-get-value international-choice" type="radio" name="shipping_info_return" id="1day_shipping" value="international">

                                                    <label class="form-check-label col-xs-11" for="1day_shipping" id="1day_fedex">

                                                    An International FedEx airway bill for estimated fee of $65.

                                                    </label>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="form-group internationall-address-container" style="display:none;">

                                            <form class="international-form" id="international_form" action="">

                                                <div style="display: flex;justify-content:flex-start;width:95%">

                                                    <label for="internationalAddress" style="width: 29ch;">Please type your shipping address:</label>

                                                    

                                                    <div style="width: 79%;">

                                                        <div style="width:100%;display:flex;">

                                                            

                                                            <input type="text" class="form-control" name="nameinternational" placeholder="Recipient name" style="width: 100%;margin-bottom:3px;">

                                                            

                                                        </div>

                                                        <input type="text" class="form-control" name="companyNameinternational" placeholder="Company Name" style="width: 100%;margin-bottom:3px;">

                                                        <input type="text" class="form-control" name="addressinternational" placeholder="Street address" style="width: 100%;margin-bottom:3px;">

                                                        <input type="text" class="form-control" name="addressinternational2" placeholder="Apt, Floor, Suite, etc..(optional)" style="width: 100%;margin-bottom:3px;">

                                                        <div style="width:100%;display:flex;">

                                                            <input type="text" class="form-control" name="cityinternational" placeholder="City" style="width: 100%;margin-bottom:3px;margin-right:3px;">

                                                            <input type="text" class="form-control" name="internationalAddress51" placeholder="Province(optional)" style="width: 100%;margin-bottom:3px;margin-right:3px; ">

                                                            <select id="country" type="text" name="countryinternational" class="form-control" style="appearance: auto;">

                                                                <option value="">Select Country</option>

                                                                <option data-code="AF" value="Afghanistan">Afghanistan</option>

                                                                <option data-code="AX" value="Aland Islands">Aland Islands</option>

                                                                <option data-code="AL" value="Albania">Albania</option>

                                                                <option data-code="DZ" value="Algeria">Algeria</option>

                                                                <option data-code="AS" value="American Samoa">American Samoa</option>

                                                                <option data-code="AD" value="Andorra">Andorra</option>

                                                                <option data-code="AO" value="Angola">Angola</option>

                                                                <option data-code="AI" value="Anguilla">Anguilla</option>

                                                                <option data-code="AQ" value="Antarctica">Antarctica</option>

                                                                <option data-code="AG" value="Antigua And Barbuda">Antigua And Barbuda</option>

                                                                <option data-code="AR" value="Argentina">Argentina</option>

                                                                <option data-code="AM" value="Armenia">Armenia</option>

                                                                <option data-code="AW" value="Aruba">Aruba</option>

                                                                <option data-code="AU" value="Australia">Australia</option>

                                                                <option data-code="AT" value="Austria">Austria</option>

                                                                <option data-code="AZ" value="Azerbaijan">Azerbaijan</option>

                                                                <option data-code="BS" value="Bahamas">Bahamas</option>

                                                                <option data-code="BH" value="Bahrain">Bahrain</option>

                                                                <option data-code="BD" value="Bangladesh">Bangladesh</option>

                                                                <option data-code="BB" value="Barbados">Barbados</option>

                                                                <option data-code="BY" value="Belarus">Belarus</option>

                                                                <option data-code="BE" value="Belgium">Belgium</option>

                                                                <option data-code="BZ" value="Belize">Belize</option>

                                                                <option data-code="BJ" value="Benin">Benin</option>

                                                                <option data-code="BM" value="Bermuda">Bermuda</option>

                                                                <option data-code="BT" value="Bhutan">Bhutan</option>

                                                                <option data-code="BO" value="Bolivia">Bolivia</option>

                                                                <option data-code="BA" value="Bosnia And Herzegovina">Bosnia And Herzegovina</option>

                                                                <option data-code="BW" value="Botswana">Botswana</option>

                                                                <option data-code="BV" value="Bouvet Island">Bouvet Island</option>

                                                                <option data-code="BR" value="Brazil">Brazil</option>

                                                                <option data-code="IO" value="British Indian Ocean Territory">British Indian Ocean Territory</option>

                                                                <option data-code="BN" value="Brunei Darussalam">Brunei Darussalam</option>

                                                                <option data-code="BG" value="Bulgaria">Bulgaria</option>

                                                                <option data-code="BF" value="Burkina Faso">Burkina Faso</option>

                                                                <option data-code="BI" value="Burundi">Burundi</option>

                                                                <option data-code="KH" value="Cambodia">Cambodia</option>

                                                                <option data-code="CM" value="Cameroon">Cameroon</option>

                                                                <option data-code="CA" value="Canada">Canada</option>

                                                                <option data-code="CV" value="Cape Verde">Cape Verde</option>

                                                                <option data-code="KY" value="Cayman Islands">Cayman Islands</option>

                                                                <option data-code="CF" value="Central African Republic">Central African Republic</option>

                                                                <option data-code="TD" value="Chad">Chad</option>

                                                                <option data-code="CL" value="Chile">Chile</option>

                                                                <option data-code="CN" value="China">China</option>

                                                                <option data-code="CX" value="Christmas Island">Christmas Island</option>

                                                                <option data-code="CC" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>

                                                                <option data-code="CO" value="Colombia">Colombia</option>

                                                                <option data-code="KM" value="Comoros">Comoros</option>

                                                                <option data-code="CG" value="Congo">Congo</option>

                                                                <option data-code="CD" value="Congo, Democratic Republic">Congo, Democratic Republic</option>

                                                                <option data-code="CK" value="Cook Islands">Cook Islands</option>

                                                                <option data-code="CR" value="Costa Rica">Costa Rica</option>

                                                                <option data-code="CI" value="Cote D ivoire">Cote D Ivoire</option>

                                                                <option data-code="HR" value="Croatia">Croatia</option>

                                                                <option data-code="CU" value="Cuba">Cuba</option>

                                                                <option data-code="CY" value="Cyprus">Cyprus</option>

                                                                <option data-code="CZ" value="Czech Republic">Czech Republic</option>

                                                                <option data-code="DK" value="Denmark">Denmark</option>

                                                                <option data-code="DJ" value="Djibouti">Djibouti</option>

                                                                <option data-code="DM" value="Dominica">Dominica</option>

                                                                <option data-code="DO" value="Dominican Republic">Dominican Republic</option>

                                                                <option data-code="EC" value="Ecuador">Ecuador</option>

                                                                <option data-code="EG" value="Egypt">Egypt</option>

                                                                <option data-code="SV" value="El Salvador">El Salvador</option>

                                                                <option data-code="GQ" value="Equatorial Guinea">Equatorial Guinea</option>

                                                                <option data-code="ER" value="Eritrea">Eritrea</option>

                                                                <option data-code="EE" value="Estonia">Estonia</option>

                                                                <option data-code="ET" value="Ethiopia">Ethiopia</option>

                                                                <option data-code="FK" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>

                                                                <option data-code="FO" value="Faroe Islands">Faroe Islands</option>

                                                                <option data-code="FJ" value="Fiji">Fiji</option>

                                                                <option data-code="FI" value="Finland">Finland</option>

                                                                <option data-code="FR" value="France">France</option>

                                                                <option data-code="GF" value="French Guiana">French Guiana</option>

                                                                <option data-code="PF" value="French Polynesia">French Polynesia</option>

                                                                <option data-code="TF" value="French Southern Territories">French Southern Territories</option>

                                                                <option data-code="GA" value="Gabon">Gabon</option>

                                                                <option data-code="GM" value="Gambia">Gambia</option>

                                                                <option data-code="GE" value="Georgia">Georgia</option>

                                                                <option data-code="DE" value="Germany">Germany</option>

                                                                <option data-code="GH" value="Ghana">Ghana</option>

                                                                <option data-code="GI" value="Gibraltar">Gibraltar</option>

                                                                <option data-code="GR" value="Greece">Greece</option>

                                                                <option data-code="GL" value="Greenland">Greenland</option>

                                                                <option data-code="GD" value="Grenada">Grenada</option>

                                                                <option data-code="GP" value="Guadeloupe">Guadeloupe</option>

                                                                <option data-code="GU" value="Guam">Guam</option>

                                                                <option data-code="GT" value="Guatemala">Guatemala</option>

                                                                <option data-code="GG" value="Guernsey">Guernsey</option>

                                                                <option data-code="GN" value="Guinea">Guinea</option>

                                                                <option data-code="GW" value="Guinea-Bissau">Guinea-Bissau</option>

                                                                <option data-code="GY" value="Guyana">Guyana</option>

                                                                <option data-code="HT" value="Haiti">Haiti</option>

                                                                <option data-code="HM" value="Heard Island &amp; Mcdonald Islands">Heard Island &amp; Mcdonald Islands</option>

                                                                <option data-code="VA" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>

                                                                <option data-code="HN" value="Honduras">Honduras</option>

                                                                <option data-code="HK" value="Hong Kong">Hong Kong</option>

                                                                <option data-code="HU" value="Hungary">Hungary</option>

                                                                <option data-code="IS" value="Iceland">Iceland</option>

                                                                <option data-code="IN" value="India">India</option>

                                                                <option data-code="ID" value="Indonesia">Indonesia</option>

                                                                <option data-code="IR" value="Iran">Iran</option>

                                                                <option data-code="IQ" value="Iraq">Iraq</option>

                                                                <option data-code="IE" value="Ireland">Ireland</option>

                                                                <option data-code="IM" value="Isle Of Man">Isle Of Man</option>

                                                                <option data-code="IL" value="Israel">Israel</option>

                                                                <option data-code="IT" value="Italy">Italy</option>

                                                                <option data-code="JM" value="Jamaica">Jamaica</option>

                                                                <option data-code="JP" value="Japan">Japan</option>

                                                                <option data-code="JE" value="Jersey">Jersey</option>

                                                                <option data-code="JO" value="Jordan">Jordan</option>

                                                                <option data-code="KZ" value="Kazakhstan">Kazakhstan</option>

                                                                <option data-code="KE" value="Kenya">Kenya</option>

                                                                <option data-code="KI" value="Kiribati">Kiribati</option>

                                                                <option data-code="KR" value="Korea">Korea</option>

                                                                <option data-code="KW" value="Kuwait">Kuwait</option>

                                                                <option data-code="KG" value="Kyrgyzstan">Kyrgyzstan</option>

                                                                <option data-code="LA" value="Lao People\" s="" democratic="" republic'="">Lao People\'s Democratic Republic</option>

                                                                <option data-code="LV" value="Latvia">Latvia</option>

                                                                <option data-code="LB" value="Lebanon">Lebanon</option>

                                                                <option data-code="LS" value="Lesotho">Lesotho</option>

                                                                <option data-code="LR" value="Liberia">Liberia</option>

                                                                <option data-code="LY" value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>

                                                                <option data-code="LI" value="Liechtenstein">Liechtenstein</option>

                                                                <option data-code="LT" value="Lithuania">Lithuania</option>

                                                                <option data-code="LU" value="Luxembourg">Luxembourg</option>

                                                                <option data-code="MO" value="Macao">Macao</option>

                                                                <option data-code="MK" value="Macedonia">Macedonia</option>

                                                                <option data-code="MG" value="Madagascar">Madagascar</option>

                                                                <option data-code="MW" value="Malawi">Malawi</option>

                                                                <option data-code="MY" value="Malaysia">Malaysia</option>

                                                                <option data-code="MV" value="Maldives">Maldives</option>

                                                                <option data-code="ML" value="Mali">Mali</option>

                                                                <option data-code="MT" value="Malta">Malta</option>

                                                                <option data-code="MH" value="Marshall Islands">Marshall Islands</option>

                                                                <option data-code="MQ" value="Martinique">Martinique</option>

                                                                <option data-code="MR" value="Mauritania">Mauritania</option>

                                                                <option data-code="MU" value="Mauritius">Mauritius</option>

                                                                <option data-code="YT" value="Mayotte">Mayotte</option>

                                                                <option data-code="MX" value="Mexico">Mexico</option>

                                                                <option data-code="FM" value="Micronesia, Federated States Of">Micronesia, Federated States Of</option>

                                                                <option data-code="MD" value="Moldova">Moldova</option>

                                                                <option data-code="MC" value="Monaco">Monaco</option>

                                                                <option data-code="MN" value="Mongolia">Mongolia</option>

                                                                <option data-code="ME" value="Montenegro">Montenegro</option>

                                                                <option data-code="MS" value="Montserrat">Montserrat</option>

                                                                <option data-code="MA" value="Morocco">Morocco</option>

                                                                <option data-code="MZ" value="Mozambique">Mozambique</option>

                                                                <option data-code="MM" value="Myanmar">Myanmar</option>

                                                                <option data-code="NA" value="Namibia">Namibia</option>

                                                                <option data-code="NR" value="Nauru">Nauru</option>

                                                                <option data-code="NP" value="Nepal">Nepal</option>

                                                                <option data-code="NL" value="Netherlands">Netherlands</option>

                                                                <option data-code="AN" value="Netherlands Antilles">Netherlands Antilles</option>

                                                                <option data-code="NC" value="New Caledonia">New Caledonia</option>

                                                                <option data-code="NZ" value="New Zealand">New Zealand</option>

                                                                <option data-code="NI" value="Nicaragua">Nicaragua</option>

                                                                <option data-code="NE" value="Niger">Niger</option>

                                                                <option data-code="NG" value="Nigeria">Nigeria</option>

                                                                <option data-code="NU" value="Niue">Niue</option>

                                                                <option data-code="NF" value="Norfolk Island">Norfolk Island</option>

                                                                <option data-code="MP" value="Northern Mariana Islands">Northern Mariana Islands</option>

                                                                <option data-code="NO" value="Norway">Norway</option>

                                                                <option data-code="OM" value="Oman">Oman</option>

                                                                <option data-code="PK" value="Pakistan">Pakistan</option>

                                                                <option data-code="PW" value="Palau">Palau</option>

                                                                <option data-code="PS" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>

                                                                <option data-code="PA" value="Panama">Panama</option>

                                                                <option data-code="PG" value="Papua New Guinea">Papua New Guinea</option>

                                                                <option data-code="PY" value="Paraguay">Paraguay</option>

                                                                <option data-code="PE" value="Peru">Peru</option>

                                                                <option data-code="PH" value="Philippines">Philippines</option>

                                                                <option data-code="PN" value="Pitcairn">Pitcairn</option>

                                                                <option data-code="PL" value="Poland">Poland</option>

                                                                <option data-code="PT" value="Portugal">Portugal</option>

                                                                <option data-code="PR" value="Puerto Rico">Puerto Rico</option>

                                                                <option data-code="QA" value="Qatar">Qatar</option>

                                                                <option data-code="RE" value="Reunion">Reunion</option>

                                                                <option data-code="RO" value="Romania">Romania</option>

                                                                <option data-code="RU" value="Russian Federation">Russian Federation</option>

                                                                <option data-code="RW" value="Rwanda">Rwanda</option>

                                                                <option data-code="BL" value="Saint Barthelemy">Saint Barthelemy</option>

                                                                <option data-code="SH" value="Saint Helena">Saint Helena</option>

                                                                <option data-code="KN" value="Saint Kitts And Nevis">Saint Kitts And Nevis</option>

                                                                <option data-code="LC" value="Saint Lucia">Saint Lucia</option>

                                                                <option data-code="MF" value="Saint Martin">Saint Martin</option>

                                                                <option data-code="PM" value="Saint Pierre And Miquelon">Saint Pierre And Miquelon</option>

                                                                <option data-code="VC" value="Saint Vincent And Grenadines">Saint Vincent And Grenadines</option>

                                                                <option data-code="WS" value="Samoa">Samoa</option>

                                                                <option data-code="SM" value="San Marino">San Marino</option>

                                                                <option data-code="ST" value="Sao Tome And Principe">Sao Tome And Principe</option>

                                                                <option data-code="SA" value="Saudi Arabia">Saudi Arabia</option>

                                                                <option data-code="SN" value="Senegal">Senegal</option>

                                                                <option data-code="RS" value="Serbia">Serbia</option>

                                                                <option data-code="SC" value="Seychelles">Seychelles</option>

                                                                <option data-code="SL" value="Sierra Leone">Sierra Leone</option>

                                                                <option data-code="SG" value="Singapore">Singapore</option>

                                                                <option data-code="SK" value="Slovakia">Slovakia</option>

                                                                <option data-code="SI" value="Slovenia">Slovenia</option>

                                                                <option data-code="SB" value="Solomon Islands">Solomon Islands</option>

                                                                <option data-code="SO" value="Somalia">Somalia</option>

                                                                <option data-code="ZA" value="South Africa">South Africa</option>

                                                                <option data-code="GS" value="South Georgia And Sandwich Isl.">South Georgia And Sandwich Isl.</option>

                                                                <option data-code="ES" value="Spain">Spain</option>

                                                                <option data-code="LK" value="Sri Lanka">Sri Lanka</option>

                                                                <option data-code="SD" value="Sudan">Sudan</option>

                                                                <option data-code="SR" value="Suriname">Suriname</option>

                                                                <option data-code="SJ" value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option>

                                                                <option data-code="SZ" value="Swaziland">Swaziland</option>

                                                                <option data-code="SE" value="Sweden">Sweden</option>

                                                                <option data-code="CH" value="Switzerland">Switzerland</option>

                                                                <option data-code="SY" value="Syrian Arab Republic">Syrian Arab Republic</option>

                                                                <option data-code="TW" value="Taiwan">Taiwan</option>

                                                                <option data-code="TJ" value="Tajikistan">Tajikistan</option>

                                                                <option data-code="TZ" value="Tanzania">Tanzania</option>

                                                                <option data-code="TH" value="Thailand">Thailand</option>

                                                                <option data-code="TL" value="Timor-Leste">Timor-Leste</option>

                                                                <option data-code="TG" value="Togo">Togo</option>

                                                                <option data-code="TK" value="Tokelau">Tokelau</option>

                                                                <option data-code="TO" value="Tonga">Tonga</option>

                                                                <option data-code="TT" value="Trinidad And Tobago">Trinidad And Tobago</option>

                                                                <option data-code="TN" value="Tunisia">Tunisia</option>

                                                                <option data-code="TR" value="Turkey">Turkey</option>

                                                                <option data-code="TM" value="Turkmenistan">Turkmenistan</option>

                                                                <option data-code="TC" value="Turks And Caicos Islands">Turks And Caicos Islands</option>

                                                                <option data-code="TV" value="Tuvalu">Tuvalu</option>

                                                                <option data-code="UG" value="Uganda">Uganda</option>

                                                                <option data-code="UA" value="Ukraine">Ukraine</option>

                                                                <option data-code="AE" value="United Arab Emirates">United Arab Emirates</option>

                                                                <option data-code="GB" value="United Kingdom">United Kingdom</option>

                                                                <option data-code="UY" value="Uruguay">Uruguay</option>

                                                                <option data-code="UZ" value="Uzbekistan">Uzbekistan</option>

                                                                <option data-code="VU" value="Vanuatu">Vanuatu</option>

                                                                <option data-code="VE" value="Venezuela">Venezuela</option>

                                                                <option data-code="VN" value="Viet Nam">Viet Nam</option>

                                                                <option data-code="VG" value="Virgin Islands, British">Virgin Islands, British</option>

                                                                <option data-code="VI" value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>

                                                                <option data-code="WF" value="Wallis And Futuna">Wallis And Futuna</option>

                                                                <option data-code="EH" value="Western Sahara">Western Sahara</option>

                                                                <option data-code="YE" value="Yemen">Yemen</option>

                                                                <option data-code="ZM" value="Zambia">Zambia</option>

                                                                <option data-code="ZW" value="Zimbabwe">Zimbabwe</option>

                                                            </select>

                                                            <input type="hidden" id="selectedCountryCode" name="countryCode" value="">

                                                        </div>

                                                        <input type="text" class="form-control" name="zipcodeinternational" placeholder="Zipcode" style="width: 100%;margin-bottom:3px;">

                                                        <input type="text" class="form-control" name="phoneinternational" placeholder="Phone" style="width: 100%;">

                                                    </div>

                                                </div>                                                                                         

                                            </form>

                                        </div>

                                    </div>

                                </div>

                                

                        

                            </div>

                

                            

                            <div class="row actions-Btn">

                                <div class="">

                                    <a class="btn btn-info backBtn backbtnof22" data-back="the-order-form-fields" type="button"> back</a>

                                    <!-- <button class="btn btn-danger edit-btn" style="display: none;">EDit</button> -->

                                </div>

                                <div class=" d-flex justify-content-end">

                                    <a class="btn btn-danger nextBtn nxtbtnof22" data-currentstep="2" data-next="the-payment-form-fields"> Next</a>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            

        </div>



        <!-- payment -->



        <div class="order-form-22 the-payment-form-fields"  style="<?php echo (isset($session['user']['currentStep']) && $session['user']['currentStep'] == 3) ? "display:block;" :  "display:none;"; ?>">

        

        

            <div id="payinfoDiv" style="" class="container cont-data radio-Container block-Gray">

                <h2 class="stp-spn">Payment</h2>

                <br>

                <?php 

                    $feeService = (isset($session['user']['feeService'])) ? $session['user']['feeService'] : " ";

                    $feeFedex = (isset($session['user']['feeFedex'])) ? $session['user']['feeFedex'] : " ";

                    $feeHandeling = (isset($session['user']['feeHandeling'])) ? $session['user']['feeHandeling'] : " ";

                    $totalFee = (float)$feeService + (float)$feeFedex + (float)$feeHandeling;

                ?>

                <div class="row form-group">

                    <div class="col-md-12">

                        <div class="badge badge-warning" style="color:#000;width:fit-content;padding:3px;background:#59958b4a;text-align:left;margin-bottom:20px;">

                            <span >Service Fee: $<span class="feeService-at-credit-of22"><?php echo (isset($feeService)) ? $feeService : ""; ?></span></span><br>

                            <span class="feeFedex-show" style="<?php echo ($feeFedex != 0) ? " " : "display:none;" ?>">FedEx Fee: $<span class="feeFedex-at-credit-of22"><?php echo (isset($feeFedex)) ? $feeFedex : ""; ?></span></span><br>

                            <span class="handling-of22">Handling Fee: $<span class="feeHandeling-at-credit-of22"><?php echo (isset($feeHandeling)) ? $feeHandeling : ""; ?></span></span>

                            

                        </div>

                        <br>

                    </div>



                    <div class="col-sm-4" id="spncredit">

                        <input class="payment-method-input_of22" type="radio" id="rdCredit" name="rdpay" value="1" required="" checked>

                        <label class="valtyp-lbl" for="rdCredit">

                            Credit Card

                        </label>

                    </div>

                    <div class="col-sm-4 feeFedex-hide" id="spnbilling" style="<?php echo ($feeFedex == 0) ? "display:block;" : "display:none;" ?>">

                        <input class="payment-method-input_of22" type="radio" id="rdBillirdBilling" name="rdpay" value="2" required="">

                        <label class="valtyp-lbl" for="rdBillirdBilling">

                            Billing

                        </label>

                    </div>

                    <div class="col-sm-4 feeFedex-hide" id="spnCheck" style="<?php echo ($feeFedex == 0) ? "display:block;" : "display:none;" ?>">

                        <input class="payment-method-input_of22" type="radio" id="rdCheck" name="rdpay" value="3" required="">

                        <label class="valtyp-lbl" for="rdCheck">

                            Check

                        </label>

                    </div>









                </div>

                <br>

                <br>

                <div class="credit-Content">

                    <div class="row rdCredit check-Content" >



                        <div id="divcredit">

                            <div class="paymentMethod" style="display: block;">

                                <div class="">



                                    <div class="row">

                                        <div class="col-lg-7">

                                            <div class="creditCardForm">

                                                <div  class="payment-steps">



                                                    <div class="form-group owner">

                                                        <label for="owner">Owner</label>

                                                        <input type="text" class="form-control" id="owner-of22">

                                                    </div>

                                                  	<div class="row">

                                                      <div class="form-group col-md-8" id="cardnumber-field">

                                                          <label for="cardNumber">Card Number</label>

                                                          <input type="text" class="form-control" id="card-number-of22">

                                                        </div>

                                                        <div class="form-group col-md-4" id="cvv-field">

                                                          <label for="cardNumber">Cvv</label>

                                                          <input type="text" class="form-control" id="cvv-of22">

                                                        </div>

                                                    </div>

                                                    

                                                    <label>Expiration Date</label>

                                                    <div class="row">

                                                        <div class="col-md-6 ">

                                                            <div class="form-group" id="exp-date"

                                                                style="display: flex;">



                                                                <div class="row">

                                                                    <div class="col-md-6 ">

                                                                        <select id="month-of22"

                                                                            class="select2 d-comment "

                                                                            placeholder="January" data-select2-id="month"

                                                                            tabindex="-1">

                                                                            <?php for ($i=0; $i < 12; $i++) { 

                                                                                # code...

                                                                                ?>

                                                                                <option value="<?php echo date('m', strtotime("Jan +$i months"));  ?>" data-select2-id="4"> <?php echo date('F', strtotime(" Jan +$i months"));  ?>

                                                                            <?php } ?>

                                                                        </select>

                                                                    </div>

                                                                    <div class="col-md-6 ps-5">

                                                                        <select id="year-of22"

                                                                            class="select2 d-comment "

                                                                            placeholder="2023" data-select2-id="year"

                                                                            tabindex="-1" >

                                                                            <?php for ($i=0; $i < 30; $i++) { 

                                                                                # code...

                                                                                ?>

                                                                                <option value="<?php echo date('y', strtotime("+$i years"));  ?>" data-select2-id="4"> <?php echo date('Y', strtotime("+$i years"));  ?>

                                                                            <?php } ?>

                                                                            </option>

                                                                            

                                                                        </select>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="col-md-6 ">

                                                            <div class="form-group" id="credit_cards">

                                                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/visa.jpg" id="visa" alt="visa">

                                                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/mastercard.jpg" id="mastercard"

                                                                    alt="master">

                                                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/amex.jpg" id="amex" class="selected"

                                                                    alt="amex">

                                                            </div>

                                                        </div>

                                                    </div>





                                                    <div class="form-group" id="pay-now">

                                                        <a type="button" class="btn btn-default confirm-purchase-of22" id="confirm-purchase"

                                                           >Confirm</a>

                                                    </div>

                                                    <div class="row rdCheck " style="text-align:center;">

                        

                                                        <div class="text-center">

                                                            <a class=" backbtnof22 back-to-shipping" data-back="the-shipping-option-inputs" style="cursor: pointer;"> BacK </a>

                                                        </div>

                                                    </div>



                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-5">

                                            <div class="card">

                                                <div class="card_bar"></div>

                                                <p class="chipContainer">

                                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/chip-pin-01.png" class="chipImg">

                                                    <span>World Bank</span>

                                                </p>

                                                <!-- <div class="cvv_card">

                                                    <span>0000</span>

                                                </div> -->

                                                <form action="" method="post" class="form">

                                                    <div class="card__number form__field">

                                                        <span id="name-card"></span>

                                                    </div>



                                                    <div class="card__number form__field">

                                                        <span id="num-card"></span>

                                                    </div>





                                                    <div class="card__expiration form__field">



                                                        <span id="month-card">01</span>



                                                        <span style="color:#FFF">/</span>

                                                        <span id="year-card">24</span>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>







                                </div>



                            </div>

                        </div>

                    </div>



                    <div class="row check-Content rdBillirdBilling" style="display: none;">

                        

                        <div class="text-right actions-Btn" style="display: flex;justify-content: flex-start;align-items:center;">

                            <button class="btn btn-primary orderBtn confirm-purchase-of22"> Order </button>

                             <button class="btn btn-info backBtn backbtnof22" data-back="the-shipping-option-inputs"> BacK </button>

                        </div>

                    </div>

                    <div class="row check-Content rdCheck " style="display: none;">

                        

                        <div class="text-right actions-Btn" style="display: flex;justify-content: flex-start;align-items:center;">

                            <button class="btn btn-primary orderBtn confirm-purchase-of22"> Order </button>

                             <button class="btn btn-info backBtn backbtnof22" data-back="the-shipping-option-inputs"> BacK </button>

                        </div>

                    </div>

                </div>



            </div>

        </div>



        <div class="blog order-form-22 the-invoice-form-finish" style="<?php echo (isset($session['lastOrder22']) && !isset($session['user'])) ? "display:block;" :  "display:none;"; ?>">

            <?php 

            //code...

            

            ?>

            <div class="container ">

                <?php if (isset($session['lastOrder22']['fedex_file_path_from']) || isset($session['lastOrder22']['fedex_file_path_to'])) { ?>

                    <button class="print_fedex_ticket no-print" style="

                        padding: 10px 20px;

                        font-size: 16px;

                        font-weight: bold;

                        text-align: center;

                        text-decoration: none;

                        color: #4d148c; /* Purple */

                        background: #bdb2ab; /* Orange */

                        border: none;

                        border-radius: 5px;

                        font-size: 26px;

                        margin-bottom: 12px;

                    "><span>Print</span> Fed<span style="color: #ff6600;">Ex</span></button>

                    <?php } ?>

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

                                        

                                        <h2 >Invoice for expedited  services</h2>

                                    <ul>

                                        <li><?php echo  $websiteData->SenderStreetLines . ", " . $websiteData->SenderCity . ", " . $websiteData->SenderStateOrProvinceCode . " " . $websiteData->SenderPostalCode; ?></li>

                                        <li><span style="margin-right: 6px;display: inline-block;">Phone:</span><?php echo $websiteData->SenderPhoneNumber; ?></li>

                                    </ul>

                                </div>

                                <div class="col-xs-2">

                                    <img src="https://www.usapostille.com/wp-content/themes/usApostille/images/codeBar.png" alt="barcode">

                                </div>

                            </div>

                           

                        <div class="row">

                            <div class="col-xs-6 p-0">

                            

                            

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

                                <?php if ($session['lastOrder22']['shippingInternational'] != null && $session['lastOrder22']['shippingInternational']['nameinternational'] != "") {

                                    ?>

                                    <ul style="padding: 20px">

                                        <li class="spncompsend"><b>Shipping Address:</b></li>

                                        <li> <?= $session['lastOrder22']['shippingInternational']['nameinternational'] ?> </li>

                                        <li> <?= $session['lastOrder22']['shippingInternational']['companyNameinternational'] ?> </li>

                                        <li> <?= $session['lastOrder22']['shippingInternational']['addressinternational'] ?> </li>

                                        <li> <?= $session['lastOrder22']['shippingInternational']['addressinternational2'] ?> </li>

                                        <li> <?= $session['lastOrder22']['shippingInternational']['zipcodeinternational'] ?>, 

                                        <?= $session['lastOrder22']['shippingInternational']['cityinternational'] ?>, 

                                        <?= $session['lastOrder22']['shippingInternational']['countryinternational'] ?> </li>

                                    </ul>

                                    <?php

                                } ?>

                            </div>

                                    <?php 

                                    $date = date('d m y');

                                    $time = 0;

                                    foreach ($session['lastOrder22']['services'] as $key => $value) {

                                        # code...

                                        $time += $value->Time;

                                    }

                                    ?>

                        

                            <div class="col-xs-6">

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

                                    

                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo (isset($session['lastOrder22']['trackingIn']) && $session['lastOrder22']['trackingIn'] != null && $session['lastOrder22']['trackingIn'] != "")? "" :"display: none;" ?>">

                                        <label for="">Tracking In :</label>

                                        <span class="fed_tracking_in" style="color: #b32134;"><?php echo $session['lastOrder22']['trackingIn']; ?></span>

                                    </div>

                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo (isset($session['lastOrder22']['trackingOut']) && $session['lastOrder22']['trackingOut'] != null && $session['lastOrder22']['trackingOut'] != "")? "" :"display: none;" ?>">

                                        <label for="">Tracking Out :</label>

                                        <span class="fed_tracking_out" style="color: #b32134;"><?php echo $session['lastOrder22']['trackingOut']; ?></span>

                                    </div>

                                    <div class="form-group fedex-info-option hide-on-no-fedex" style="<?php echo ((isset($session['lastOrder22']['trackingIn']) && $session['lastOrder22']['trackingIn'] != null && $session['lastOrder22']['trackingIn'] != "") || (isset($session['lastOrder22']['trackingOut']) && $session['lastOrder22']['trackingOut'] != null && $session['lastOrder22']['trackingOut'] != "" && $session['lastOrder22']['trackingOut'] != "Return envelope will be created later."))? "" :"display: none;" ?>">

                                        <label for="">Carrier :</label>

                                        <span class="shipping-carrier" style="color: #b32134;">FedEx</span>

                                    </div>

                                    <div class="form-group">

                                        <label for="">Payment Method :</label>

                                        <span class="shipping-method-Payment-lable" style="color: #b32134;"><?php echo $session['lastOrder22']['paymentMethod']; ?></span>

                                    </div>

                                    <div class="form-group">

                                        <span>Estimated Date to finish:</span><span class="day-mon-time" style="color: #b32134;"><?php echo date("M", strtotime(" + $time days")); ?></span> <span class="day-num-time" style="color: #b32134;"><?php echo date("d", strtotime(" + $time days")); ?></span> <span class="day-year-time" style="color: #b32134"><?php echo date("Y", strtotime(" + $time days")); ?></span>

                                    </div>

                                    <div class="form-group">

                                        <label for="">Reference :</label>

                                        <span class="shipping-method-Payment-lable" style="color: #b32134;"><?php echo $session['lastOrder22']['reference']; ?></span>

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

?>

                                </tbody>

                                <tbody class="invoice-table-body2">

                                    <tr>

                                        <td colspan="8" class="bl-1">Total:</td>

                                        <td><span class="total_amount_fees"><?php echo $totalFee; ?></span></td>

                                    </tr>

                                </tbody>

                                

                            </table>

<?php if ($session['lastOrder22']['paymentMethod'] == "Credit") { ?>

                            <table style="margin-top: 20px;">

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

                                            <td><span class="doc_count"><?php echo $totalFee; ?> </span></td>

                                        </tr>

                                    <?php 

                                    //code...

                                    

                                    

                                    $feeFedex = (isset($session['lastOrder22']['feeFedex'])) ? $session['lastOrder22']['feeFedex'] : 0;

                                    if ($feeFedex != 0) {



                                foreach ($session['lastOrder22']['fedexArrForInvoice'] as $key => $value) {

                                        

                                    ?>

                                                                <tr>

                                    <td colspan="8" class="bl-1"><?php echo $value[0]; ?></td>

                                    <td><span class="doc_count"><?php echo $value[1]; ?> </span></td>

                                </tr>

                                <?php

                                    }

                                

                                 $totalFee += $feeFedex;

                                    }



                                    

                                        $handlingFee = $totalFee * .05;

                                ?>

                                    <tr>

                                        

                                    <td colspan="8" class="bl-1">Handling Fee</td>

                                    <td><?php echo $handlingFee; ?></td>

                                </tr>

                                    <?php

                                $totalFee += $handlingFee;

                                ?>

                                </tbody>

                                <tbody class="invoice-table-body2">

                                    <tr>

                                        <td colspan="8" class="bl-1">Total:</td>

                                        <td><span class="total_amount_fees"><?php echo $totalFee; ?></span></td>

                                    </tr>

                                </tbody>

                                

                            </table>

<?php } ?>

                        <!--    <div class="comment">

                                <p>Please print this page and include it in your package with your document.</p>

                                <div class="fedex-comment"></div>

                            </div> -->

                        </div>

                    </main>

                    </div>

                </form>

            </div>



        </div>



        <?php 

        $fedexFilesFlag = true;

        if(isset($session['lastOrder22']['fedex_file_path_from'])) {

            if ($session['lastOrder22']['fedex_file_path_from'] == "" || $session['lastOrder22']['fedex_file_path_from'] == null ) {

                $fedexFilesFlag = false;

            }

        }



            

        ?>

        

        <div id="" class="row  no-print" style="<?php echo (isset($session['lastOrder22']) && !isset($session['user'])) ? "" :  "display:none;"; ?>">

        <?php if ($fedexFilesFlag) { ?>

            <div class="col-md-6">

                <iframe class="fedextickets1" src="<?php echo $session['lastOrder22']['fedex_file_path_from']; ?>" style="width:100%;height:400px;" frameborder="0"></iframe>

            </div>

            <?php } ?>

        <?php

        $fedexFilesFlag = true;

        if(isset($session['lastOrder22']['fedex_file_path_to'])) {

           

            if ($session['lastOrder22']['fedex_file_path_to'] == "" || $session['lastOrder22']['fedex_file_path_to'] == null ) {

                $fedexFilesFlag = false;

            }

        }

        if ($fedexFilesFlag) { ?>

            <div class="col-md-6">

                <iframe class="fedextickets2" src="<?php echo $session['lastOrder22']['fedex_file_path_to']; ?>" style="width:100%;height:400px;" frameborder="0"></iframe>

            </div>

        <?php } ?>

        </div>



    </section>

        

        <?php

get_footer();