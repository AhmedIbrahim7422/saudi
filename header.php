<!DOCTYPE html>

<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->

<!--[if IE 8]>

<html class="ie ie8" <?php language_attributes(); ?>>

<![endif]-->

<!--[if !(IE 7) & !(IE 8)]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width" />

<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="profile" href="https://gmpg.org/xfn/11" />

<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>

<!--[if lt IE 9]>



<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js?ver=3.7.0" type="text/javascript"></script>

<![endif]-->

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link

        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"

        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preconnect" href="https://fonts.googleapis.com">





    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"

        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&display=swap"

        rel="stylesheet">

    

<script>

        window.dataLayer = window.dataLayer || [];

        function gtag() { dataLayer.push(arguments); }

        gtag('js', new Date());



        gtag('config', 'UA-49959454-1');

</script>

<?php 

    wp_head(); 



?>





</head>



<body  id="page" class="saudiEmbassy">

<?php wp_body_open(); ?>

    <!-- <header class="mainHeader">



        <p class="text-center">

            Welcome to SaudiEmbassy.com

        </p>

    </header> -->

    <main>

  

<!-- <div class="page-header header-div no-print">

    <div class="container">

        <div class="row">

            <div class="col-sm-7">

               

                <div class="logo-img">

                    <img src="<?php bloginfo('template_directory')?>/assets/images/logo.png" class="img-responsive">

                </div>

            </div>

        </div>

    </div>

</div>

<div class="page-header headmenu-div no-print">

    <div class="container mainmenu-div">

        <div class="row">

            <div class="col-sm-12">

                <div class="bs-component">     

                    <nav class="navbar navbar-expand-lg navbar-dark bg-black">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

                            <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarNavDropdown">

                            <ul class="navbar-nav">

                                <li class="nav-item active">

                                    <a class="nav-link" href="<?php echo site_url(); ?>">Home <span class="sr-only">(current)</span></a>

                                </li>

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Services</a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                                        <ul>

                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/services/">All Services</a></li>

                                            <li class="nav-item dropdown sup-menu">

                                                <a class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-expanded="false">Document Certification</a>

                                                <div class="dropdown-menu sup-menu-items" aria-labelledby="navbarDropdownMenuLink">

                                                    <ul>

                                                        <li class="nav-item"><a class="dropdown-item" href="<?php echo site_url(); ?>/services/documents-legalization/">All Document Certification</a></li>

                                                        <li class="nav-item"><a class="dropdown-item" href="<?php echo site_url(); ?>/services/documents-legalization/export-documents/">Export Documents</a></li>

                                                        <li class="nav-item"><a class="dropdown-item" href="<?php echo site_url(); ?>/services/documents-legalization/federal-documents/">Federal Documents</a></li>

                                                        <li class="nav-item"><a class="dropdown-item" href="<?php echo site_url(); ?>/services/documents-legalization/state-certified-documents/">Documents Certified by SOS</a></li>
                                                        <li class="nav-item"><a class="dropdown-item" href="<?php echo site_url(); ?>/services/documents-legalization/company-documents-notarized/">Notarized Company Document</a></li>
                                                    </ul>

                                                </div>

                                            </li>

                                            <li><a class="dropdown-item" href="<?php echo site_url(); ?>/services/arab-chamber-of-commerce/">Arab Chamber of Commerce</a></li>

                                           

                                        </ul>



                                    </div>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url('/location'); ?>/">Locations</a>

                                </li>

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        Travel
                                    </a>

                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/travel/">Travel to Egypt</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/travel/visa-requirements/">Visa Requirements</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/travel/passport/">Issuing Passport</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/travel/bringing-pets/">Bringing Pets</a>                                        
                                            </li>
                                        </ul>
                                    </div>

                                </li>

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">

                                        Citizenship

                                    </a>

                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/citizenship/">Saudi Citizenship</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/citizenship/acquireing/">Acquire Egypt Citizenship</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/citizenship/dual-approval/">Dual Citizenship Approval</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/citizenship/retrieval-request/">Request for Retrieval of Egypt Citizenship</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/citizenship/foreign-permit/">Permit for Foreign Citizenship</a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>/immigration/to-foreign-country/">Immigration</a>
                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url(); ?>/about-egypt/">About Egypt</a>

                                </li>

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">

                                        Egypt Information

                                    </a>

                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/agriculture/">Agriculture & Watar</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/culture/">Culture</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/economy-trade/">Economy & Global Trade</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/education/">Education</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/energy/">Energy</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/facts/">Facts & Figures</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/helth-and-social-service/">Health & Social Services</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/laws/">Laws</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/sports-and-recreation/">Sports & Recreation</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/transportation-and-communication/">Transportation & Communication</a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">

                                        About Government

                                    </a>

                                    <div class="dropdown-menu">
                                        <ul>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/government-system/">Basic System of Government</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/ministries/">Ministries</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="dropdown-item" href="<?php echo site_url(); ?>/about-egypt/provincial-system/">Provincial System</a>
                                            </li>
                                        </ul>
                                    </div>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url(); ?>/faqs/">Faqs</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url(); ?>/blogs/">Blog</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url(); ?>/resources/">Resources</a>

                                </li>

                                <li class="nav-item">

                                    <a class="nav-link" href="<?php echo site_url(); ?>/contact-us/">Contact Us</a>

                                </li>

                            </ul>

                        </div>

                    </nav>

                </div>



            </div>

        </div>



    </div>



</div> -->

<header>
        <div class="logo">
            <img src="https://www.saudiapostille.com/wp-content/themes/saudi-theme/assets/images/logo.png" alt="logo">
        </div>

        <ul class="links">
            <li>
                <a href="<?php echo site_url(); ?>">Home</a>
            </li>
            <li>
                <a href="https://www.saudiapostille.com/documents">Documents</a>
            </li>
			<li>
                <a href="https://www.saudiapostille.com/apostille-services">Apostille Services</a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>/about/">About</a>
            </li>
            <li>
                <a href="<?php echo site_url(); ?>/contact-us/">Contact Us</a>
            </li>
            <li>
                <a href="<?php echo site_url('/location'); ?>/">Locations</a>
            </li>
        </ul>
</header>





