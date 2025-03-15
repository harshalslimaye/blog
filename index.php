<?php
include_once "PostController.php";

$postCtrl = new PostController();

$posts = isset($_GET['filter']) ? $postCtrl->getPostsByCategory($_GET['filter']) : $postCtrl->getPosts();
$featuredPosts = $postCtrl->getFeaturedPosts();
$categories = $postCtrl->getCategories();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Argon - Bloging site</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="assets/brand/favicon.png" type="image/png">

    <!-- STYLES -->
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/frontend/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/frontend/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/frontend/css/simple-line-icons.css" type="text/css" media="all">
    <link rel="stylesheet" href="assets/frontend/css/style.css" type="text/css" media="all">

    <!-- aos scroll plugin -->
    <link rel="stylesheet" href="assets/plugins/aos/aos.css" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-personal">
            <div class="container-xl header-top">
                <div class="row align-items-center">

                    <div class="col-4 d-none d-md-block d-lg-block">
                        <!-- social icons -->
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12 text-center">
                        <!-- site logo -->
                        <a class="navbar-brand" href="personal.html"><img
                                src="assets/frontend/images/other/avatar-lg.png" alt="logo" /></a>
                        <a href="/" class="d-block text-logo">Argon<span class="dot">.</span></a>
                        <span class="slogan d-block">Professional Writer & Personal Blogger</span>
                    </div>

                    <div class="col-md-4 col-sm-12 col-xs-12">
                        <!-- header buttons -->
                        <div class="header-buttons float-md-end mt-4 mt-md-0">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button ms-2 float-end float-md-none">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">

                    <div class="collapse navbar-collapse justify-content-center centered-nav">
                        <!-- menus -->
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Web Development</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Fashion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Inspiration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Vacation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">Worship</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>
        </header>

        <section class="hero-carousel">

            <div class="row post-carousel-featured post-carousel">
                <?php foreach ($featuredPosts as $post) { ?>
                    <!-- post -->
                    <div class="post featured-post-md">
                        <div class="details clearfix">
                            <a href="?filter=<?= $post['cat_id'] ?>" class="category-badge">
                                <?= $post['cat_name'] ?></a>
                            <h4 class="post-title"><a
                                    href='post-details.php?post-id=<?= $post['post_id'] ?>'><?= $post['post_title'] ?></a>
                            </h4>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                <li class="list-inline-item">2021-09-18 12:46:22</li>
                            </ul>
                        </div>
                        <a href=''>
                            <div class="thumb rounded">
                                <div class="inner data-bg-image"
                                    data-bg-image="post_images/post_<?= $post['post_id'] ?>/<?= $post['post_image'] ?>">
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>
        </section>

        <!-- section main content -->
        <section class="main-content">
            <div class="container-xl">

                <div class="row gy-4">

                    <div class="col-lg-8">
                        <div class="row gy-4">
                            <?php foreach ($posts as $key => $post) { ?>
                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-grid rounded bordered" data-aos="fade-up" data-aos-offset="220"
                                        data-aos-duration="1000">
                                        <div class="thumb top-rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute"><?= $post['cat_name'] ?></a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="post-details.php?post-id=<?= $post['post_id'] ?>">
                                                <div class="inner">
                                                    <?php if (empty($post['post_image'])) { ?>
                                                        <img src="assets/frontend/images/posts/post-md-2.jpg"
                                                            alt="post-title" />
                                                    <?php } else { ?>
                                                        <img src="post_images/post_<?= $post['post_id'] ?>/<?= $post['post_image'] ?>"
                                                            alt="post-title" />
                                                    <?php } ?>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#"><img src="assets/frontend/images/other/author-sm.png"
                                                            class="author" alt="author" />Katen Doe</a>
                                                </li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3">
                                                <a
                                                    href="post-details.php?post-id=<?= $post['post_id'] ?>"><?= $post['post_title'] ?></a>
                                            </h5>
                                            <p class="excerpt mb-0">
                                                <?= substr(strip_tags(html_entity_decode($post['post_content'])), 0, 60) ?>...
                                            </p>
                                        </div>
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="social-share me-auto">
                                                <button class="toggle-button icon-share"></button>
                                                <ul class="icons list-unstyled list-inline mb-0">
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-facebook-f"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-twitter"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-linkedin-in"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-pinterest"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="fab fa-telegram-plane"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i
                                                                class="far fa-envelope"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="more-button float-end">
                                                <a href="post-details.php?post-id=<?= $post['post_id'] ?>"><span
                                                        class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-lg-4">

                        <!-- sidebar -->
                        <div class="sidebar">
                            <!-- widget about -->
                            <div class="widget rounded">
                                <div class="widget-about data-bg-image text-center"
                                    data-bg-image="assets/frontend/images/map-bg.png">
                                    <img src="assets/brand/blue.png" alt="logo" class="mb-4" />
                                    <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                                        celebrity and lifestyle. We helps clients bring the right content to the right
                                        people.</p>
                                    <ul class="social-icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- widget categories -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Explore Posts by categories</h3>
                                    <img src="assets/frontend/images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <ul class="list">
                                        <?php foreach ($categories as $key => $category) { ?>
                                            <li>
                                                <a href="?filter=<?= $category['cat_id'] ?>">
                                                    <?= $category['cat_name'] ?>
                                                </a>
                                                <span>(<?= $category['num_of_posts'] ?>)</span>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2021 argon. All rights reserved.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to
                                Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input class="form-control me-2" type="search" placeholder="Search and press enter ..."
                    aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="assets/brand/blue.png" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="/">Home</a>
                </li>
                <li><a href="category.html">Web Development</a></li>
                <li><a href="category.html">Fashion</a></li>
                <li><a href="category.html">Inspiration</a></li>
                <li><a href="category.html">Vacation</a></li>
                <li><a href="category.html">Worship</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="assets/frontend/js/jquery.min.js"></script>
    <script src="assets/frontend/js/popper.min.js"></script>
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <script src="assets/frontend/js/slick.min.js"></script>
    <script src="assets/frontend/js/jquery.sticky-sidebar.min.js"></script>
    <script src="assets/frontend/js/custom.js"></script>

    <script src="assets/plugins/aos/aos.js"></script>
    <script>
        $(function () {
            AOS.init();
        });
    </script>

</body>

</html>