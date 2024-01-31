<?php

// Template Name: Empassies Template

get_header();



$allCountries = get_countries_findembassy();

?>



<section class="blog">



    <div class="container worldWideOffices main-content">

        <div class="title">

            <h1 class="locacoun-h1">Locations of Egypt Embassy and Consulate Around the World</h1>

            <br>

        </div>

        <div class="row">

            <div class="col-sm-6"><h2 class="embcons-h2">Egypt Embassy or Consulate Located in </h2></div>

            <div class="col-sm-4">
                <div class="form-group">
                    <select class="form-control count-ddown" id="Countries" name="Countries"><option value="">Choose Country</option>
                        <option value="afghanistan">Afghanistan</option>
                        <option value="albania">Albania</option>
                        <option value="algeria">Algeria</option>
                        <option value="american-samoa">American Samoa</option>
                        <option value="andorra">Andorra</option>
                        <option value="angola">Angola</option>
                        <option value="antigua-and-barbuda">Antigua and Barbuda</option>
                        <option value="argentina">Argentina</option>
                        <option value="armenia">Armenia</option>
                        <option value="aruba">Aruba</option>
                        <option value="australia">Australia</option>
                        <option value="austria">Austria</option>
                        <option value="azerbaijan">Azerbaijan</option>
                        <option value="bahamas">Bahamas</option>
                        <option value="bahrain">Bahrain</option>
                        <option value="bangladesh">Bangladesh</option>
                        <option value="barbados">Barbados</option>
                        <option value="belarus">Belarus</option>
                        <option value="belgium">Belgium</option>
                        <option value="belize">Belize</option>
                        <option value="benin">Benin</option>
                        <option value="bermuda">Bermuda</option>
                        <option value="bhutan">Bhutan</option>
                        <option value="bolivia">Bolivia</option>
                        <option value="bosnia-and-herzegovina">Bosnia and Herzegovina</option>
                        <option value="botswana">Botswana</option>
                        <option value="brazil">Brazil</option>
                        <option value="brunei">Brunei</option>
                        <option value="bulgaria">Bulgaria</option>
                        <option value="burkina-faso">Burkina Faso</option>
                        <option value="burundi">Burundi</option>
                        <option value="cambodia">Cambodia</option>
                        <option value="cameroon">Cameroon</option>
                        <option value="canada">Canada</option>
                        <option value="cape-verde">Cape Verde</option>
                        <option value="cayman-islands">Cayman Islands</option>
                        <option value="central-african-republic">Central African Republic</option>
                        <option value="chad">Chad</option>
                        <option value="channel-islands">Channel Islands</option>
                        <option value="chile">Chile</option>
                        <option value="china">China</option>
                        <option value="colombia">Colombia</option>
                        <option value="comoros">Comoros</option>
                        <option value="cook-islands">Cook Islands</option>
                        <option value="costa-rica">Costa Rica</option>
                        <option value="croatia">Croatia</option>
                        <option value="cuba">Cuba</option>
                        <option value="cyprus">Cyprus</option>
                        <option value="czech-republic">Czech Republic</option>
                        <option value="denmark">Denmark</option>
                        <option value="djibouti">Djibouti</option>
                        <option value="dominica">Dominica</option>
                        <option value="dominican-republic">Dominican Republic</option>
                        <option value="ecuador">Ecuador</option>
                        <option value="el-salvador">El Salvador</option>
                        <option value="equatorial-guinea">Equatorial Guinea</option>
                        <option value="eritrea">Eritrea</option>
                        <option value="estonia">Estonia</option>
                        <option value="ethiopia">Ethiopia</option>
                        <option value="fiji">Fiji</option>
                        <option value="finland">Finland</option>
                        <option value="france">France</option>
                        <option value="french-polynesia">French Polynesia</option>
                        <option value="gabon">Gabon</option>
                        <option value="gambia">Gambia</option>
                        <option value="georgia">Georgia</option>
                        <option value="germany">Germany</option>
                        <option value="ghana">Ghana</option>
                        <option value="gibraltar">Gibraltar</option>
                        <option value="greece">Greece</option>
                        <option value="greenland">Greenland</option>
                        <option value="grenada">Grenada</option>
                        <option value="guatemala">Guatemala</option>
                        <option value="guinea">Guinea</option>
                        <option value="guinea-bissau
                        ">Guinea Bissau
                        </option>
                        <option value="guyana">Guyana</option>
                        <option value="haiti">Haiti</option>
                        <option value="honduras">Honduras</option>
                        <option value="hungary">Hungary</option>
                        <option value="iceland">Iceland</option>
                        <option value="india">India</option>
                        <option value="indonesia">Indonesia</option>
                        <option value="iran">Iran</option>
                        <option value="iraq">Iraq</option>
                        <option value="ireland">Ireland</option>
                        <option value="israel">Israel</option>
                        <option value="italy">Italy</option>
                        <option value="ivory-coast">Ivory Coast</option>
                        <option value="jamaica">Jamaica</option>
                        <option value="japan">Japan</option>
                        <option value="jordan">Jordan</option>
                        <option value="kazakhstan">Kazakhstan</option>
                        <option value="kenya">Kenya</option>
                        <option value="kiribati">Kiribati</option>
                        <option value="kitts-and-nevis">Kitts and Nevis</option>
                        <option value="kosovo">Kosovo</option>
                        <option value="kuwait">Kuwait</option>
                        <option value="kyrgyzstan">Kyrgyzstan</option>
                        <option value="laos">Laos</option>
                        <option value="latvia">Latvia</option>
                        <option value="lebanon">Lebanon</option>
                        <option value="lesotho">Lesotho</option>
                        <option value="liberia">Liberia</option>
                        <option value="libya">Libya</option>
                        <option value="liechtenstein">Liechtenstein</option>
                        <option value="lithuania">Lithuania</option>
                        <option value="luxembourg">Luxembourg</option>
                        <option value="macedonia">Macedonia</option>
                        <option value="madagascar">Madagascar</option>
                        <option value="malawi">Malawi</option>
                        <option value="malaysia">Malaysia</option>
                        <option value="maldives">Maldives</option>
                        <option value="mali">Mali</option>
                        <option value="malta">Malta</option>
                        <option value="marshall-islands">Marshall Islands</option>
                        <option value="martinique">Martinique</option>
                        <option value="mauritania">Mauritania</option>
                        <option value="mauritius">Mauritius</option>
                        <option value="mexico">Mexico</option>
                        <option value="micronesia">Micronesia</option>
                        <option value="moldova">Moldova</option>
                        <option value="monaco">Monaco</option>
                        <option value="mongolia">Mongolia</option>
                        <option value="montenegro">Montenegro</option>
                        <option value="morocco">Morocco</option>
                        <option value="mozambique">Mozambique</option>
                        <option value="myanmar">Myanmar</option>
                        <option value="namibia">Namibia</option>
                        <option value="nauru">Nauru</option>
                        <option value="nepal">Nepal</option>
                        <option value="netherlands">Netherlands</option>
                        <option value="new-caledonia">New Caledonia</option>
                        <option value="new-guinea">New Guinea</option>
                        <option value="new-zealand">New Zealand</option>
                        <option value="nicaragua">Nicaragua</option>
                        <option value="niger">Niger</option>
                        <option value="nigeria">Nigeria</option>
                        <option value="niue">Niue</option>
                        <option value="north-korea">North Korea</option>
                        <option value="norway">Norway</option>
                        <option value="oman">Oman</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="palau">Palau</option>
                        <option value="palestine">Palestine</option>
                        <option value="panama">Panama</option>
                        <option value="papua-new-guinea">Papua New Guinea</option>
                        <option value="paraguay">Paraguay</option>
                        <option value="peru">Peru</option>
                        <option value="philippines">Philippines</option>
                        <option value="poland">Poland</option>
                        <option value="portugal">Portugal</option>
                        <option value="puerto-rico">Puerto Rico</option>
                        <option value="qatar">Qatar</option>
                        <option value="republic-of-the-congo">Republic of the Congo</option>
                        <option value="romania">Romania</option>
                        <option value="russia">Russia</option>
                        <option value="rwanda">Rwanda</option>
                        <option value="saint-lucia">Saint Lucia</option>
                        <option value="saint-vincent-and-the-grenadines">Saint Vincent and the Grenadines</option>
                        <option value="samoa">Samoa</option>
                        <option value="san-marino">San Marino</option>
                        <option value="sao-tome-and-principe">Sao Tome and Principe</option>
                        <option value="saudi-arabia">Saudi Arabia</option>
                        <option value="scotland">Scotland</option>
                        <option value="senegal">Senegal</option>
                        <option value="serbia">Serbia</option>
                        <option value="seychelles">Seychelles</option>
                        <option value="sierra-leone">Sierra Leone</option>
                        <option value="singapore">Singapore</option>
                        <option value="slovakia">Slovakia</option>
                        <option value="slovenia">Slovenia</option>
                        <option value="solomon-islands">Solomon Islands</option>
                        <option value="somalia">Somalia</option>
                        <option value="south-africa">South Africa</option>
                        <option value="south-korea">South Korea</option>
                        <option value="spain">Spain</option>
                        <option value="sri-lanka">Sri Lanka</option>
                        <option value="sudan">Sudan</option>
                        <option value="suriname">Suriname</option>
                        <option value="swaziland">Swaziland</option>
                        <option value="sweden">Sweden</option>
                        <option value="switzerland">Switzerland</option>
                        <option value="syria">Syria</option>
                        <option value="taiwan">Taiwan</option>
                        <option value="tajikistan">Tajikistan</option>
                        <option value="tanzania">Tanzania</option>
                        <option value="thailand">Thailand</option>
                        <option value="tibet">Tibet</option>
                        <option value="timor-leste">Timor Leste</option>
                        <option value="togo">Togo</option>
                        <option value="tonga">Tonga</option>
                        <option value="trinidad-and-tobago
                        ">Trinidad and Tobago
                        </option>
                        <option value="tunisia">Tunisia</option>
                        <option value="turkey">Turkey</option>
                        <option value="turkmenistan">Turkmenistan</option>
                        <option value="tuvalu">Tuvalu</option>
                        <option value="uae">UAE</option>
                        <option value="uganda">Uganda</option>
                        <option value="uk">UK</option>
                        <option value="ukraine">Ukraine</option>
                        <option value="uruguay">Uruguay</option>
                        <option value="us-virgin-islands">US Virgin Islands</option>
                        <option value="usa">USA</option>
                        <option value="uzbekistan">Uzbekistan</option>
                        <option value="vanuatu">Vanuatu</option>
                        <option value="vatican">Vatican</option>
                        <option value="venezuela">Venezuela</option>
                        <option value="vietnam">Vietnam</option>
                        <option value="wales">Wales</option>
                        <option value="yemen">Yemen</option>
                        <option value="zambia">Zambia</option>
                        <option value="zimbabwe">Zimbabwe</option>
                    </select>

                </div>

            </div>
            <div class="col-sm-2">
                <button  class="form-control btn btn-primary active search-btn">Search</button>
            </div>           
        </div>
        <div class="page-header">
            <div class="container inthead-div">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="inthead-txt">This site is provided by the US Arab Chamber of Commerce in Washington D.C. to facilitate the certification and legalization of business documents from the embassy/consulate of Egypt.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-div">



            <div class="subcont-div loc-div">





                <div class="row">





                    <div class="col-md-6">

                        <?php

                        $keyArr = array();
                        $countriesNamesArr = [];
                        $keyNo = 0;

                        $parentless_posts_args = array(
                            'post_type'      => 'empassy_location',
                            'post_status'    => 'publish',
                            'posts_per_page' => -1,
                            'orderby'        => 'title', // Order by post title
                            'order'          => 'ASC',  
                            'post_parent'    => 0, // Posts without parents
                        );
                        
                        $parentless_posts_query = new WP_Query($parentless_posts_args);
                        
                        // Check if parentless posts are found
                        if ($parentless_posts_query->have_posts()) {
                            while ($parentless_posts_query->have_posts()) {
                                $parentless_posts_query->the_post();


                                $countryId = get_post_meta(get_the_id(), 'countryId', true);
                                $countryName = $allCountries[$countryId];

                                // $countryName = str_replace(" Embassies", "", get_the_title());

                                $firstChar = substr($countryName, 0, 1);

                                if (!in_array($countryName, $countriesNamesArr)) {
                                    $countriesNamesArr[] = $countryName;




                        ?>



                                    <?php



                                    if (!in_array(strtolower($firstChar), $keyArr)) {

                                        $keyNo++;

                                        $keyArr[] = strtolower($firstChar);

                                    ?>



                                        <?php if (strtolower($firstChar) == 'm') {

                                            # code...

                                            echo '</div>';

                                            echo '<div class="col-md-6">';
                                        } ?>



                                        <div id="<?php echo strtolower($firstChar); ?>">



                                            <center>

                                                <h3 class="redcolor"><?php echo strtoupper($firstChar); ?></h3>

                                            </center>

                                            <hr>



                                        </div>

                                        <div>

                                            <a href="<?php the_permalink(); ?>">

                                                <?php echo $countryName; ?>

                                            </a>

                                        </div>

                                    <?php } else { ?>

                                        <div>

                                            <a href="<?php the_permalink(); ?>">

                                                <?php echo $countryName; ?>

                                            </a>

                                        </div>

                                <?php

                                    }
                                }

                                ?>



                        <?php

                            }

                            wp_reset_postdata();

                        }

                        ?>

                    </div>

                </div>











            </div>



        </div>

    </div>

</section>



<?php



get_footer();



?>