<?php
// Template Name: Services Template
get_header();

?>
 <!-- your code here -->
 <div class="page-header">
    <div class="container inthead-div">
        <div class="row">
            <div class="col-sm-12">
                <p class="inthead-txt">This site is provided by the US Arab Chamber of Commerce in Washington D.C. to facilitate the certification and legalization of business documents from the embassy/consulate of Egypt.</p>
            </div>
        </div>
    </div>
</div>
<div class="container maincontainer">
    <div class="row">
        <div class="col-sm-8 main-content" style="padding: 10px">
            <div class="content-div">
                <?php the_content();?>
            </div>
        </div>
        <div class="col-sm-4 main-sidebar">
            <?php get_sidebar('Sidebar'); ?>
        </div>
    </div>
</div>

<?php
get_footer();