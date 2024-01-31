<?php // Template Name: USD Form Template
    $usd = get_usd_form();
    $css = "<link rel='stylesheet' href='". $usd->css->usd."'>";
    $js = "<script src='".$usd->js->usd."'></script>";
    $imask = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js'></script>";
    $usd_html = $usd->html->usd;

    $args = array(
        'formcss' => $css
    );

    set_query_var('query_css', $args);

    get_header('', $args);
?>

<div class="block stateCase alabamaForm" id="formStyle">
    <div id="parentdiv">
        <div id="state-step" class="state show">
            <div class="row no-print">
                <div class="col-md-9">
                    <h2 class="slctcou-h2 py-3">
                        Please fill the US Department of State form, then click to 
                        <button class="btn btn-default" onclick="window.print();"><i class="fas fa-print"></i> Print</button>
                    </h2>
                </div>
            </div>
            <div class="row m-0">
                
                <div class="col-md-12 scrolling">
                    <?php echo $usd_html; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";

    $args = array(
        'formjs' => $js,
        'imaskjs' => $imask
    );

    set_query_var('query_js', $args);

    get_footer('', $args);
    ?>

