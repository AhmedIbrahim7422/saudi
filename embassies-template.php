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

                                $countryName = str_replace(" Embassies", "", get_the_title());

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