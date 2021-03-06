<?php
include_once 'config/Database.php';
include_once 'admin/class/News.php';
include_once 'admin/class/Event.php';
include_once 'admin/class/Slider.php';
include_once 'admin/class/SocialLink.php';
include_once 'admin/class/MetaContent.php';
include_once 'admin/class/NavLink.php';






$newsInstance = new News();
$eventInstance = new Event();
$sliderInstance = new Slider();
$socialLinkInstance = new SocialLink();
$metaContentInstance = new MetaContent();
$navLinkInstance = new NavLink();


$allNews = $newsInstance->lastAdded();
$events = $eventInstance->lastAdded();
$sliders = $sliderInstance->publishedOnly();
$socialLinks = $socialLinkInstance->publishedOnly();
$metaContent = $metaContentInstance->all();
$headerLinks = $navLinkInstance->headerLinks();
$footerLinks = $navLinkInstance->footerLinks();

// print_r($footerLinks);
// die();



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="images/icons/favicon.png">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="fonts/fontawesome-free-5.15.3-web/css/all.min.css">
  <!--load all styles -->
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/content.css">
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-default.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
  <title><?= $metaContent[0]['content'] ?></title>
</head>

<body>
  <!-- preloader start -->
  <div id="preloader">
    <div id="status">
    </div>
  </div>
  <!-- preloader end -->

  <!-- header start -->
  <div class="container navbar d-none d-md-flex justify-content-between">
    <a class="navbar-brand" href="index.php"><img src="images/group-4.png" alt="siences university"></a>
    <div class="nav-icons d-flex align-items-center">
    <?php foreach($socialLinks as $socialLink): ?>
      <a class="fab fa-<?= $socialLink['name'] == 'linkedin' ? $socialLink['name'] : $socialLink['name'].'-square' ?> fa-2x" href="<?= $socialLink['url'] ?>"></a>
      <?php endforeach; ?>
      <a href="#search" class="px-3 fas fa-search fa-2x btn nav-btn"></a>
    </div>
  </div>
  <!-- navbar start -->
  <header class="sticky-top">
    <nav class="align-items-center d-flex">
      <div class="container navbar navbar-light navbar-expand-md py-md-0 justify-content-between justify-content-md-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand d-block d-md-none" href="index.php">
          <picture>
            <source media="(min-width:768px)" srcset="images/brand-white.png">
            <img src="images/group-4.png" alt="siences university">
          </picture>
        </a>
        <a href="#search" class="px-3 fas fa-search fa-2x btn nav-btn d-inline d-md-none"></a>
        <div id="search">
          <button type="button" class="close">??</button>
          <form>
            <input type="search" placeholder="What are you looking for?">
            <button type="submit" class="btn btn-primary button">Search</button>
          </form>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav mt-4 mt-md-0">
          <?php foreach($headerLinks as $link): ?>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline text-uppercase" href="about.html"><?= $link['name'] ?></a>
            </li>
            <?php endforeach; ?>
            <li class="d-block d-md-none d-flex align-items-center justify-content-center my-4 px-3">
              <a class="mr-2 fab fa-linkedin fa-2x mx-2" href="#"></a>
              <a class="mr-2 fab fa-youtube-square fa-2x mx-2" href="#"></a>
              <a class="mr-2 fab fa-instagram-square fa-2x mx-2" href="#"></a>
              <a class="mr-2 fab fa-twitter-square fa-2x mx-2" href="#"></a>
              <a class="mr-2 fab fa-facebook-square fa-2x mx-2" href="#"></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- navbar end -->

  <!-- slider start -->
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators d-flex">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <?php $count = 1 ?>
      <?php foreach($sliders as $slider): ?>
        <?php if($count == count($sliders)) break; ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count++ ?>"></li>
      <?php endforeach; ?>
    </ol>
    <div class="carousel-inner position-relative">

      <?php $count = 0 ?>
      <?php foreach($sliders as $slider): ?>
        <?php $media = $sliderInstance->getMedia($slider['hero_slider_id']);?>

      <div class="carousel-item <?= $count++ == 1 ? 'active' : '' ?>">
        <div class="slider-box  d-flex justify-content-center align-items-center py-lg-5 px-lg-3">
          <p class="text-center text-uppercase text-white m-4"><?= $slider['text'] ?></p>
        </div>
        <?php if ($media) : ?>
        <img src="images/entities/<?= $media['id'] ?>/<?= $media['name'] ?>" class="d-block w-100" alt="bulding">
        <?php else : ?>
          <img src="images/slider1.jpg" class="d-block w-100" alt="bulding">
          <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <header>
    <h1 class="invisible">Siences University</h1>
  </header>
  <!-- scroll top button -->
  <a id="button" class="d-flex justify-content-center align-items-center"><i class="scroll-up-icon fas fa-arrow-up fa-2x"></i></a>
  <!-- slider end -->
  <!-- header end -->

  <main>
    <!-- news section start -->
    <div class="container  mt-5">
      <div class="row">
        <div class="col-12 col-xl-6">
          <div class="row">
            <div class="col-12 col-sm-6 mb-4 img-box hover11">
              <a class="zoom-effect" href="#">
                <div class="overflow-hidden">
                  <img src="images/news1.png" alt="college students">
                </div>
                <div class="col-12">
                  <div class="img-title text-white font-weight-bold d-flex align-items-center justify-content-center text-center px-1 px-md-2 py-4 py-md-3"> UNDERGRADUATE COURSES </div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 mb-4 img-box">
              <a class="zoom-effect" href="#">
                <div class="overflow-hidden">
                  <img src="images/news2.jpg" alt="graduated students">
                </div>
                <div class="col-12">
                  <div class="img-title text-white font-weight-bold d-flex align-items-center justify-content-center text-center px-1 px-md-2 py-4 py-md-3"> GRADUATE COURSES </div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 mb-4 img-box">
              <a class="zoom-effect" href="#">
                <div class="overflow-hidden">
                  <img src="images/news4.jpg" alt="students studying">
                </div>
                <div class="col-12">
                  <div class="img-title text-white font-weight-bold d-flex align-items-center justify-content-center text-center px-1 px-md-2 py-4 py-md-3"> INTERNATIONAL STUDENTS </div>
                </div>
              </a>
            </div>
            <div class="col-12 col-sm-6 mb-4 img-box">
              <a class="zoom-effect" href="#">
                <div class="overflow-hidden">
                  <img src="images/news3.jpg" alt="student writing">
                </div>
                <div class="col-12">
                  <div class="img-title text-white font-weight-bold d-flex align-items-center justify-content-center px-1 px-md-2 py-4 py-md-3"> SCHOLARSHIPS </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-xl-6 mb-5">
          <div class="news">
            <div class="wrapper mb-4 pt-3">
              <a href="#">
                <h2 class="text-uppercase heading link d-inline-block"> news </h2>
              </a>
            </div>
            <?php $i = 0 ?>
            <?php foreach ($allNews as $news) : ?>
              <div class="wrapper">
                <p class="text-primary text-capitalize info mb-2 mt-4"><?= date("F j, Y", strtotime($news['created_at'])); ?></p>
                <a class="mb-2 overflow-2l d-block" href="#">
                  <h3 class="text-capitalize title link d-inline"> <?= $news['title'] ?> </h3>
                </a>
                <p class="text mt-2 overflow-3l"> <?= $news['highlight'] ?> </p>
                <div class="d-flex justify-content-end">
                  <a href="#" class="font-weight-bold more link mb-3">READ MORE</a>
                </div>
                <?php if (++$i < count($allNews)) : ?>
                  <hr class="mt-1">
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <!-- news section end -->
    <!-- statistics section start-->
    <div class="statistics container-fluid bg-primary statistics mt-md-4 mb-5">
      <div class="container">
        <div class="row justify-content-center py-5">
          <div class="col-12 col-sm-6 col-md-4 mt-5 justify-content-between text-center d-flex flex-column">
            <div class="justify-content-center d-flex">
              <img class="d-block mb-3" src="images/icons/worker.png" alt="worker" width="70px">
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
              <div id="odometer1" class="number text-secondary font-weight-bold odometer"> 0 </div>
              <span class="number text-secondary font-weight-bold">+</span>
            </div>
            <div class="justify-content-center d-flex">
              <p class="text-secondary text-center mb-3 d-inline-block overflow-3l"> Profession-ready degree programs </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mt-5 justify-content-between text-center d-flex flex-column">
            <div class="justify-content-center d-flex">
              <img class="d-block mb-3" src="images/icons/mail.png" alt="mail" width="80px">
            </div>
            <div class="mb-3 d-flex justify-content-center align-items-center">
              <span class="number text-secondary font-weight-bold">#</span>
              <div id="odometer2" class="number text-secondary font-weight-bold odometer"> 0 </div>
            </div>
            <div class="justify-content-center d-flex">
              <p class="text-secondary text-center mb-3 d-inline-block overflow-3l"> Our MBA for salary-to-debt ratio </p>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4 mt-5 justify-content-between text-center d-flex flex-column">
            <div class="justify-content-center d-flex">
              <img class="d-block mb-3" src="images/icons/hat.png" alt="graduation hat" width="70px">
            </div>
            <div class="mb-3">
              <div id="odometer3" class="number text-secondary font-weight-bold odometer"> 0 </div>
            </div>
            <div class="justify-content-center d-flex">
              <p class="text-secondary text-center mb-3 d-inline-block over overflow-3l"> Sciences University alumni worldwide </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- statistics section end -->

    <!-- events section start -->
    <div class="container text-center py-5 mb-0 mb-md-4">
      <div class="mb-3">
        <a href="#">
          <h2 class="text-uppercase heading link d-inline-block"> events </h2>
        </a>
      </div>
      <div class="row">
        <?php foreach ($events as $event) : ?>
          <?php $media = $eventInstance->getMedia($event['event_id']);
          ?>
          <div class="col-12 col-md-4 mt-3">
            <div class="card card-wrapper box-shadow-hover border-0 text-left" data-aos="zoom-in" data-aos-duration="1500">
              <div class="icon-wrapper">
                <div class="position-relative w-100 h-100">
                  <div class="icon-day text-primary"> <?= date('w', strtotime($event['date'])) ?> </div>
                  <div class="icon-month text-primary"> <?= date('F', strtotime($event['date'])) ?> </div>
                </div>
              </div>
              <?php if ($media) : ?>
                <img class="card-img-top" src="images/entities/<?= $media['id'] ?>/<?= $media['name'] ?>" alt="Postgraduate Drop-in Evening">
              <?php else : ?>
                <img class="card-img-top" src="images/events2.png" alt="Postgraduate Drop-in Evening">
              <?php endif; ?>
              <div class="border card-border d-flex flex-column">
                <div class="card-body">
                  <ul class="list-inline mb-2 overflow-2l">
                    <li class="list-inline-item info text-primary"><?= date('h:i A', strtotime($event['start_time'])) ?> - <?= date('h:i A', strtotime($event['end_time'])) ?></li>
                    <li class="list-inline-item text">|</li>
                    <li class="list-inline-item info text-primary"><?= $event['location'] ?></li>
                  </ul>
                  <a href="events.html">
                    <h3 class="card-text title text-primary link overflow-2l"> <?= $event['title'] ?> </h3>
                  </a>
                  <p class="card-text overflow-3l text mb-auto mt-2 w-100"> <?= $event['highlight'] ?> </p>
                </div>
                <div class="text-right mb-2 pb-1 pr-1">
                  <a href="events.html" class="more link font-weight-bold mr-3 stretched-link">LEARN MORE</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <!-- events section end -->
    <!-- apply-now section start -->
    <div class="apply-now d-flex align-items-center">
      <div class="container text-center">
        <div class="col-12 mb-5 overflow-3l-lg">
          <span class="apply-now-text text-primary"> ADMISSIONS ARE NOW OPEN FOR 2017/2018 INTAKE </span>
        </div>
        <div class="col-12">
          <button class="button-xl btn btn-primary px-5 py-4 text-nowrap"> APPLY NOW! </button>
        </div>
      </div>
    </div>
    <!-- apply-now section end -->

    <!-- get-in-touch section start -->
    <div class="container my-5">
      <div class="row justify-content-center pb-5">
        <div class="col-12 col-md-10 get-in-touch">
          <form id="get-in-touch" name="get-in-touch" action="admin/messages/store.php" method="post">
            <div class="row px-lg-5 py-5 justify-content-center">
              <div class="col-12 text-center my-4">
                <span class="heading text-primary"> GET IN TOUCH </span>
              </div>
              <div class="col-12">

                <?php
                if (isset($_SESSION['error'])) {
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                  foreach ($_SESSION['error'] as $error) {
                    echo "-$error<br>";
                  }
                  echo "</div>\n";
                  unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">' . $_SESSION['success'] . "</div>\n";
                  unset($_SESSION['success']);
                }
                ?>
              </div>

              <div class="col-12 col-md-6 pl-md-5 my-2 ml-md">
                <input class="form-control" type="text" name="fullname" placeholder="Full Name" maxlength=250 required>
              </div>
              <div class="col-12 col-md-6 pr-md-5 my-2">
                <input class="form-control" type="text" name="phone" placeholder="Phone Number" maxlength=250 required>
              </div>
              <div class="col-12 px-md-5 my-2">
                <input class="form-control" type="email" name="email" placeholder="Email" maxlength=250 required>
              </div>
              <div class="col-12 px-md-5 my-2">
                <textarea id="form-textarea" class="form-control" name="content" cols="30" rows="7" placeholder="Message" required></textarea>
                <div class="text-right">
                  <span id="display_count">0</span><span>/</span><span id="word_left">50</span>
                </div>
              </div>
              <div class="col-12 mt-4 mb-2 text-center">
                <button class="btn btn-primary button font-weight-bold px-5 py-3" type="submit" name="submit">SUBMIT</button>
              </div>
            </div>
          </form>
          <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Message sent successfully !
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- get-in-touch section end -->

  <!-- footer start -->
  <footer class="bg-primary text-start mt-5">
    <div class="container p-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 border-left order-1 text-center text-md-left">
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu1" role="button" aria-expanded="false" aria-controls="footer-menu1">EXPLORE</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mb-0 mt-3 mb-4" id="footer-menu1">
          <?php foreach($footerLinks as $link): ?>
          <?php if($link['parent'] == 'explore'): ?>
            <li>
              <a href="#!" class="text-capitalize link"><?= $link['name'] ?></a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 border-left order-2 text-center text-md-left">
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu2" role="button" aria-expanded="false" aria-controls="footer-menu2">QUICK LINKS</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mt-3 mb-4" id="footer-menu2">
          <?php foreach($footerLinks as $link): ?>
          <?php if($link['parent'] == 'quick links'): ?>
            <li>
              <a href="#!" class="text-capitalize link"><?= $link['name'] ?></a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
          </ul>
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu3" role="button" aria-expanded="false" aria-controls="footer-menu3">USING OUR SITE</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mt-3 mb-4" id="footer-menu3">
          <?php foreach($footerLinks as $link): ?>
          <?php if($link['parent'] == 'using our site'): ?>
            <li>
              <a href="#!" class="text-capitalize link"><?= $link['name'] ?></a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>

          </ul>
        </div>
        <div class="col-lg-3 col-md-6 border-left order-3 text-center text-md-left">
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu4" role="button" aria-expanded="false" aria-controls="footer-menu4">HOW TO FIND US</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mb-0 mt-3 mb-4" id="footer-menu4">
          <?php foreach($footerLinks as $link): ?>
          <?php if($link['parent'] == 'how to find us'): ?>
            <li>
              <a href="#!" class="text-capitalize link"><?= $link['name'] ?></a>
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0 border-left order-last order-md-4">
          <div class="mb-5 mt-4 text-center text-md-left">
            <a href="index.php">
              <img src="images/brand-white.png" alt="Sciences University">
            </a>
          </div>
          <div class="text-secondary font-weight-bold title mb-2 text-center text-md-left">FOLLOW US</div>
          <ul class="list-unstyled text-center text-md-left">
            <li>
            <?php foreach($socialLinks as $socialLink): ?>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fa-<?= $socialLink['name'] != 'linkedin' ? $socialLink['name'] : $socialLink['name'].'-in' ?>" href="<?= $socialLink['url'] ?> fa-sm"></i>
              </a>
              <?php endforeach; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center text-white copy-rights p-2">
      <?= $metaContent[1]['content'] ?>
    </div>
  </footer>
  <!-- footer end -->

  <script src="js/jquery/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="http://github.hubspot.com/odometer/odometer.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="plugins/jquery-validation-1.19.1/dist/jquery.validate.min.js"></script>
  <script src="js/script.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>