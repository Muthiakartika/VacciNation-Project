<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?php echo e(asset('orthoc/images/favicon2.png')); ?>" type="">

    <title> VacciNation </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('orthoc/css/bootstrap.css')); ?>" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- font awesome style -->
    <link href="<?php echo e(asset('orthoc/css/font-awesome.min.css')); ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('orthoc/css/style.css')); ?>" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?php echo e(asset('orthoc/css/responsive.css')); ?>" rel="stylesheet" />

</head>

<body>

<div class="hero_area">

    <div class="hero_bg_box">
        <img src="<?php echo e(asset('orthoc/images/hero-bg.png')); ?>" alt="">
    </div>

    <!-- header section starts -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="/"><span>VacciNation</span></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=""> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Contact Us</a>
                        </li>
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('/home')); ?>" class="nav-link">Home</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(route('login')); ?>" class="nav-link">Log in</a>
                                </li>
                                <?php if(Route::has('register')): ?>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        Indonesia's First Digital Vaccination Ecosystem
                                    </h1>
                                    <p>
                                        Facilitate the community in getting the COVID-19 vaccine easily in order to make Indonesia a fully vaccinated nation.
                                    </p>
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="detail-box">
                                    <h1>
                                        COVID-19 vaccination is the key to controlling this pandemic
                                    </h1>
                                    <p>
                                        -Joko Widodo, President of the Republic of Indonesia
                                    </p>
                                    
                                    
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                
            </ol>
        </div>

    </section>
    <!-- end slider section -->
</div>


<!-- department section -->

<section class="department_section layout_padding">
    <div class="department_container">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2>
                    Our Departments
                </h2>
                <p>
                    Asperiores sunt consectetur impedit nulla molestiae delectus repellat laborum dolores doloremque accusantium
                </p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="<?php echo e(asset('orthoc/images/s1.png')); ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Cardiology
                            </h5>
                            <p>
                                fact that a reader will be distracted by the readable page when looking at its layout.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="<?php echo e(asset('orthoc/images/s2.png')); ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Diagnosis
                            </h5>
                            <p>
                                fact that a reader will be distracted by the readable page when looking at its layout.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="<?php echo e(asset('orthoc/images/s3.png')); ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                Surgery
                            </h5>
                            <p>
                                fact that a reader will be distracted by the readable page when looking at its layout.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box ">
                        <div class="img-box">
                            <img src="<?php echo e(asset('orthoc/images/s4.png')); ?>" alt="">
                        </div>
                        <div class="detail-box">
                            <h5>
                                First Aid
                            </h5>
                            <p>
                                fact that a reader will be distracted by the readable page when looking at its layout.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-box">
                <a href="">
                    View All
                </a>
            </div>
        </div>
    </div>
</section>

<!-- end department section -->

<!-- about section -->

<section class="about_section layout_margin-bottom">
    <div class="container  ">
        <div class="row">
            <div class="col-md-6 ">
                <div class="img-box">
                    <img src="<?php echo e(asset('orthoc/images/about-img.jpg')); ?>" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-box">
                    <div class="heading_container">
                        <h2>
                            About <span>VacciNation</span>
                        </h2>
                    </div>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
                        in some form, by injected humour, or randomised words which don't look even slightly believable. If you
                        are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
                        the middle of text. All
                    </p>
                    <a href="">
                        Read More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- end about section -->

<!-- doctor section -->






























































































































































<!-- end contact section -->

<!-- client section -->



























































































<!-- end client section -->

<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 footer_col">
                <div class="footer_contact">
                    <h4>
                        Reach at..
                    </h4>
                    <div class="contact_link_box">










                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>vnsuper2022@gmail.com</span>
                        </a>
                    </div>
                </div>














            </div>
            <div class="col-md-6 col-lg-3 footer_col">
                <div class="footer_detail">
                    <h4>
                        About
                    </h4>
                    <p>
                        Beatae provident nobis mollitia magnam voluptatum, unde dicta facilis minima veniam corporis laudantium alias tenetur eveniet illum reprehenderit fugit a delectus officiis blanditiis ea.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mx-auto footer_col">
                <div class="footer_link_box">
                    <h4>
                        Links
                    </h4>
                    <div class="footer_links">
                        <a class="active" href="<?php echo e(url('/')); ?>">
                            Home
                        </a>
                        <a class="" href="#">
                            About
                        </a>
                        <a class="" href="#">
                            Departments
                        </a>
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(url('/home')); ?>" class="">Home</a>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="">Log in</a>

                                <?php if(Route::has('register')): ?>
                                    <a href="<?php echo e(route('register')); ?>" class="">Register</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>











        </div>
        <div class="footer-info">
            <p>
                &copy; <span id="displayYear"></span> VacciNation
                
                
            </p>

        </div>
    </div>
</footer>
<!-- footer section -->
<!-- jQery -->
<script type="text/javascript" src="<?php echo e(asset('orthoc/js/jquery-3.4.1.min.js')); ?>"></script>
<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script type="text/javascript" src="<?php echo e(asset('orthoc/js/bootstrap.js')); ?>"></script>
<!-- owl slider -->
<script type="text/javascript" src="<?php echo e(asset('orthoc/https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js')); ?>">
</script>
<!-- custom js -->
<script type="text/javascript" src="<?php echo e(asset('orthoc/js/custom.js')); ?>"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

</body>

</html>
<?php /**PATH C:\xampp\htdocs\vaccination\resources\views/welcome.blade.php ENDPATH**/ ?>