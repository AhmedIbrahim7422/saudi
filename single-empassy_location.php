<?php
get_header();

$allCountries = get_countries_findembassy();
?>
<style>
    .subcont-div {
        border: 1px solid #eee;
        border-radius: 8px;
        padding: 15px 5px 15px 15px;
        margin-top: 14px;
    }
    .loc-div {
        padding: 20px;
    }
    .frm-txt {
        color: #124293;
    }
    .countloc-h3 {
        font-size: 25px;
        color: #b70000;
        margin-top: 5px;
    }
    .doctit-h1 {
    font-size: 29px;
    color: #000000;
    line-height: 40px;
    padding-left: 0px;
    margin-top: -32px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 90px;
}
</style>
<div class="container row m-auto" style="background: #fff;padding:15px;">
<div class="col-sm-8 main-content">
    <section class="blog offices">

<?php
$current_post_id = get_the_ID();

// Check if the current post has no parent
if ($current_post_id && !wp_get_post_parent_id($current_post_id)) {

    $countryId = get_post_meta(get_the_id(), 'countryId', true);
    $countryName = $allCountries[$countryId];
    ?>
    <h1 class="doctit-h1">List of Consulates and Embassies in <?= $countryName ?></h1>
    <?php
    // Query child posts
    $child_posts_args = array(
        'post_type'      => 'empassy_location',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'post_parent'    => $current_post_id,
    );

    $child_posts_query = new WP_Query($child_posts_args);

    // Check if child posts are found
    if ($child_posts_query->have_posts()) {
        while ($child_posts_query->have_posts()) {
            $child_posts_query->the_post();

            // Render meta inputs for each child post
            $child_post_id = get_the_ID();
            $name = get_post_meta($child_post_id, 'EmbassyName', true);
            $phone = get_post_meta($child_post_id, 'Phone', true);
            $fax = get_post_meta($child_post_id, 'Fax', true);
            $email = get_post_meta($child_post_id, 'Email', true);
            $website = get_post_meta($child_post_id, 'Website', true);
            $address = get_post_meta($child_post_id, 'Address', true);

            // Output the meta inputs as needed
            ?>
            
            <div class="subcont-div loc-div">
            
                <h3 class="countloc-h3"><?= $name ?></h3>
                <?php if ($address != null) { ?>
                <div class="row">
                    <div class="col-sm-12"><p><i class="fa fa-map-marker fa-icon"></i>&nbsp;<?= $address ?></p></div>
                </div>
                <?php } ?>
                <?php if ($phone != null) { ?>
                <div class="row">
                    <div class="col-sm-12"><p><i class="fa fa-phone fa-icon"></i>&nbsp;<?= $phone ?></p></div>
                </div>
                <?php } ?>
                <?php if ($email != null) { ?>
                <div class="row">
                    <div class="col-sm-12"><p><i class="fa fa-envelope fa-icon"></i>&nbsp;<a href="mailto:<?= $email ?>"><?= $email ?></a></p></div>
                </div>
                <?php } ?>
                <?php if ($website != null) { ?>
                <div class="row">
                    <div class="col-sm-12"><p><i class="fa fa-chain fa-icon"></i>&nbsp;<a href="<?= $website ?>" style="word-wrap: break-word;"><?= $website ?></a></p></div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-sm-12"><p><a href="<?php echo get_post_field('post_name', $child_post_id); ?>/">Details...</a></p></div>
                </div>
                
            </div>
            <?php
        }

        // Restore original post data
        wp_reset_postdata();
    } else {
        ?>
            <h3 class="text-center">
                Egypt has no embassy or consulate in <?= $countryName ?><br>
                <br>
                <a href="<?php echo site_url('/location'); ?>/" class="btn btn-danger">Back</a>

            </h3>
        <?php
    }
} else {
    $name = get_post_meta($current_post_id, 'EmbassyName', true);
    $phone = get_post_meta($current_post_id, 'Phone', true);
    $fax = get_post_meta($current_post_id, 'Fax', true);
    $email = get_post_meta($current_post_id, 'Email', true);
    $website = get_post_meta($current_post_id, 'Website', true);
    $address = get_post_meta($current_post_id, 'Address', true);
    ?>
    <h1 class="doctit-h1"><?= $name; ?></h1>
    <div class="subcont-div loc-div">
            
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-user fa-icon"></i>&nbsp;<span class="frm-txt">Name</span></p></div>
            <div class="col-sm-9"><p><?= $name ?></p></div>
        </div>
        <?php if ($address != null) { ?>
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-map-marker fa-icon"></i>&nbsp;<span class="frm-txt">Address</span></p></div>
            <div class="col-sm-9"><p><?= $address ?></p></div>
        </div>
        <?php } ?>
        <?php if ($phone != null) { ?>
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-phone fa-icon"></i>&nbsp;<span class="frm-txt">Phone</span></p></div>
            <div class="col-sm-9"><p><?= $phone ?></p></div>
        </div>
        <?php } ?>
        <?php if ($fax != null) { ?>
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-phone-square fa-icon"></i>&nbsp;<span class="frm-txt">Fax</span></p></div>
            <div class="col-sm-9"><p><?= $fax ?></p></div>
        </div>
        <?php } ?>
        <?php if ($email != null) { ?>
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-envelope fa-icon"></i>&nbsp;<span class="frm-txt">Email</span></p></div>
            <div class="col-sm-9"><p><a href="mailto:<?= $email ?>"><?= $email ?></a></p></div>
        </div>
        <?php } ?>
        <?php if ($website != null) { ?>
        <div class="row">
            <div class="col-sm-3"><p><i class="fa fa-link" aria-hidden="true" style="color: #05499d;"></i>&nbsp;<span class="frm-txt">Website</span></p></div>
            <div class="col-sm-9"><p><a href="<?= $website ?>"  style="word-wrap: break-word;"><?= $website ?></a></p></div>
        </div>
        <?php } ?>
        <div class="row">
            
            <div class="col-sm-9"><p></p></div>
        </div>
    </div>
<?php
}
?>


    
        
    </section>
</div>

        <div class="col-sm-4 main-sidebar">
            <?php get_sidebar('Sidebar'); ?>
        </div>
</div>

<?php
get_footer();
