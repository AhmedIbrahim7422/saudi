<?php
// Template Name: Page Generator
// /getcountries
// /getembassies
// /getembassiesbycountryid
// /getsearchoptionbycountryid

$allCountries = get_countries_findembassy();
// print_r($allCountries);
// exit();

$url3 = 'https://embassyapi.texasapostille.org/public/api/getembassiesbycountryid';

$response3 = wp_remote_post($url3, 
    array(
        'method'      => 'POST',
        'timeout'     => 45,
        'blocking'    => true,
        'headers'     => array(),
        'body'        => array(
            'countryId' => 99,
            'embassyId' => 0,
            'responseType' => 'all'
        ),
        'cookies'     => array()
    )
);

$embassies = json_decode($response3['body']);


// echo "<pre>";
// print_r($embassies);
// echo "</pre>";
// exit();

/**
 * 
 * 
 * Create main Countries pages
 * 
 * 
 */
// foreach($allCountries as $id => $name) {
//         // print_r($val2[0]);
//         // exit();
//         if ($id != 99) {
//             $embassy_posts_pages = array(
//                 'post_title'    => $name . " Embassies",
//                 'post_name'     => sanitize_title($name), // Set the slug
//                 'post_content'  => '',
//                 'post_status'   => 'publish',
//                 'post_type'     => 'empassy_location',
//                 'meta_input'    => array(
//                     'countryId' => $id,
//                     '_wp_page_template' => 'embassy-template.php'
//                 )
//             );
//             wp_insert_post( $embassy_posts_pages );
//         }        
// }

/**
 * 
 * 
 * Update parent Posts
 * 
 * 
 */
// foreach ($allCountries as $id => $name) {
//     $post_title_to_find = $name . " Embassies";

//     // Query to get the post based on the post title
//     $query_args = array(
//         'post_type'      => 'empassy_location',
//         'post_status'    => 'any', // Include posts with any status
//         'posts_per_page' => 1,     // Limit to one result
//         'title'          => $post_title_to_find,
//     );

//     $existing_posts = new WP_Query($query_args);

//     // Continue only if posts are found
//     if ($existing_posts->have_posts()) {
//         while ($existing_posts->have_posts()) {
//             $existing_posts->the_post();

//             $embassy_posts_pages = array(
//                 'ID'            => get_the_ID(),
//                 'post_title'    => "Saudi Embassy in " . $name . " - Egypt Embassy",
//                 'meta_input'    => array(
//                     'countryId' => $id,
//                     'countryName' => $name,
//                     '_wp_page_template' => 'embassy-template.php'
//                 )
//             );

//             wp_update_post($embassy_posts_pages);
//         }

//         // Restore original post data
//         wp_reset_postdata();
//     }
// }



/**
 * 
 * 
 * new logic create all child posts
 * 
 */
// 

// print_r($embassies->embassies[1]);
// exit();
// foreach ($embassies->embassies[0] as $embassy) {
//     $embassy_post = array(
//         'post_title'    => 'Saudi ' . (($embassy->IsEmbassy) ? 'Apostille' : 'Consulate') . ' in ' . $embassy->City . ', ' . $allCountries[$embassy->CountryEmbassyID] . ' - Saudi Apostille',
//         'post_name'     => 'saudi-' . (($embassy->IsEmbassy) ? 'Apostille' : 'consolate') . ($embassy->City != null) ? '-' . str_replace(" ", "", $embassy->City) : "",
//         'post_content'  => '',
//         'post_status'   => 'publish',
//         'post_type'     => 'empassy_location',
//         'meta_input'    => array(
//             'EmbassyName'         => $embassy->EmbassyName,
//             'EmbassyID'         => $embassy->EmbassyID,
//             'CountryEmbassyID'  => $embassy->CountryEmbassyID,
//             'Phone'             => $embassy->Phone,
//             'Fax'               => $embassy->Fax,
//             'Email'             => $embassy->Email,
//             'Website'           => $embassy->Website,
//             'CityURL'           => $embassy->CityURL,
//             'Address'           => $embassy->Address,
//             // Add other meta fields as needed
//         ),
//     );

//     $embassy_post_id = wp_insert_post($embassy_post);

//     // Set the parent post if CountryEmbassyID exists
//     if ($embassy_post_id && isset($embassy->CountryEmbassyID)) {
//         $parent_post_args = array(
//             'ID'          => $embassy_post_id,
//             'post_parent' => get_post_id_by_meta('countryId', $embassy->CountryEmbassyID), // Custom function to get post ID by meta
//         );

//         wp_update_post($parent_post_args);
//     }
// }

// // Custom function to get post ID by meta
// function get_post_id_by_meta($meta_key, $meta_value) {
//     global $wpdb;
//     $post_id = $wpdb->get_var($wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_key = %s AND meta_value = %s", $meta_key, $meta_value));
//     return $post_id;
// }
