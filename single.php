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
            <h1 class="doctit-h1"><?php the_title(); ?></h1>
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="">
            <div class="subcont-div loc-div">
                <div class="row">
                    <div class="col-sm-12"><p><?php the_content(); ?></p></div>
                </div>
                
            </div>
        </section>
    </div>

    <div class="col-sm-4 main-sidebar">
        <?php get_sidebar('Sidebar'); ?>
    </div>
</div>

<?php
get_footer();
