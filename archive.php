<?php
// Template Name: Blog Posts 
get_header();
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


    <h1 class="doctit-h1">Blog Posts</h1>
    <?php
    // Query child posts
    $blog_posts_args = array(
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    );

    $blog_posts_query = new WP_Query($blog_posts_args);

    // Check if child posts are found
    if ($blog_posts_query->have_posts()) {
        while ($blog_posts_query->have_posts()) {
            $blog_posts_query->the_post();


            // Output the meta inputs as needed
            ?>
            
            <div class="subcont-div loc-div">
            
                <h3 class="countloc-h3"><?php the_title(); ?></h3>
                <div class="row">
                    <div class="col-sm-12"><p><?php the_excerpt(); ?></p></div>
                </div>
                
            </div>
            <?php
        }

        // Restore original post data
        wp_reset_postdata();
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
