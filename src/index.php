<?php
include_once 'config/Database.php';
include_once 'admin/class/News.php';

$database = new Database();
$conn = $database->getConnection();

$news = new News($conn);
$allNews = $news->all();

$conn->close;
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
  <title>Siences University</title>
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
    <a class="navbar-brand" href="index.html"><img src="images/group-4.png" alt="siences university"></a>
    <div class="nav-icons d-flex align-items-center">
      <a class="fab fa-linkedin fa-2x" href="#"></a>
      <a class="fab fa-youtube-square fa-2x" href="#"></a>
      <a class="fab fa-instagram-square fa-2x" href="#"></a>
      <a class="fab fa-twitter-square fa-2x" href="#"></a>
      <a class="fab fa-facebook-square fa-2x" href="#"></a>
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
        <a class="navbar-brand d-block d-md-none" href="index.html">
          <picture>
            <source media="(min-width:768px)" srcset="images/brand-white.png">
            <img src="images/group-4.png" alt="siences university">
          </picture>
        </a>
        <a href="#search" class="px-3 fas fa-search fa-2x btn nav-btn d-inline d-md-none"></a>
        <div id="search">
          <button type="button" class="close">×</button>
          <form>
            <input type="search" placeholder="What are you looking for?">
            <button type="submit" class="btn btn-primary button">Search</button>
          </form>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav mt-4 mt-md-0">
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline" href="about.html">ABOUT</a>
            </li>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline" href="academics.html">ACADEMICS</a>
            </li>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline" href="admissions.html">ADMISSIONS</a>
            </li>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline" href="international.html">INTERNATIONAL</a>
            </li>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline" href="events.html">EVENTS</a>
            </li>
            <li class="nav-item position-relative mr-3 mx-lg-4  d-flex justify-content-center">
              <a class="nav-link text-left text-center ltr-hover mobile-link-underline text-nowrap" href="contact.html">CONTACT US</a>
            </li>
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
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner position-relative">
      <div class="slider-box  d-flex justify-content-center align-items-center py-lg-5 px-lg-3">
        <p class="text-center text-uppercase text-white m-4">one of the top 10 universities in design</p>
      </div>
      <!-- <p class="slider-p text-uppercase d-none text-white">one of the top 10 universities in design</p> -->
      <div class="carousel-item active">
        <img src="images/slider1.jpg" class="d-block w-100" alt="bulding">
      </div>
      <div class="carousel-item">
        <img src="images/slider5.jpg" class="d-block w-100" alt="bulding">
      </div>
      <div class="carousel-item">
        <img src="images/slider4.jpg" class="d-block w-100" alt="bulding">
      </div>
      <div class="carousel-item ">
        <img src="images/slider5.jpg" class="d-block w-100" alt="bulding">
      </div>
      <div class="carousel-item">
        <img src="images/slider3.jpg" class="d-block w-100" alt="bulding">
      </div>
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
                <?php if(++$i < count($allNews)): ?>
                <hr class="mt-1">
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
            <!-- <div class="wrapper">
              <p class="text-primary text-capitalize info mb-2 mt-4">December 13, 2016</p>
              <a class="mb-2 overflow-2l d-block" href="#">
                <h3 class="text-capitalize title link d-inline"> Sciences University To Offer Now Undergraduate Major In Creative Writing </h3>
              </a>
              <p class="text mt-2 overflow-3l"> The Department of English Language and Literature will offer a new undergraduate major in creative writing, beginning </p>
              <div class="d-flex justify-content-end">
                <a href="#" class="font-weight-bold more link mb-3">READ MORE</a>
              </div>
              <hr class="mt-1">
            </div>
            <div class="wrapper">
              <p class="text-primary text-capitalize info mb-2 mt-4">November 13, 2016</p>
              <a class="mb-2 overflow-2l d-block" href="#">
                <h3 class="text-capitalize title link d-inline"> New Method Uses Heat Flow To Levitate Variety Of Objects </h3>
              </a>
              <p class="text mt-2 overflow-3l"> Even the most casual observer is probably acquainted with the Classical style, that aesthetic anchored in the ancient</p>
              <div class="d-flex justify-content-end">
                <a href="#" class="font-weight-bold more link mb-3">READ MORE</a>
              </div>
            </div> -->
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
        <div class="col-12 col-md-4 mt-3">
          <div class="card card-wrapper box-shadow-hover border-0 text-left" data-aos="zoom-in" data-aos-duration="1500">
            <div class="icon-wrapper">
              <div class="position-relative w-100 h-100">
                <div class="icon-day text-primary"> 18 </div>
                <div class="icon-month text-primary"> March </div>
              </div>
            </div>
            <img class="card-img-top" src="images/events1.png" alt="Postgraduate Drop-in Evening">
            <div class="border card-border d-flex flex-column">
              <div class="card-body">
                <ul class="list-inline mb-2 overflow-2l">
                  <li class="list-inline-item info text-primary">2:00 P.M - 4:00 P.M.</li>
                  <li class="list-inline-item text">|</li>
                  <li class="list-inline-item info text-primary">Ajloun Campus</li>
                </ul>
                <a href="events.html">
                  <h3 class="card-text title text-primary link overflow-2l"> Postgraduate Drop-in Evening </h3>
                </a>
                <p class="card-text overflow-3l text mb-auto mt-2 w-100"> Our Postgraduate Drop-in Evenings are an excellent opportunity for you to meet our staff and talk to current students </p>
              </div>
              <div class="text-right mb-2 pb-1 pr-1">
                <a href="events.html" class="more link font-weight-bold mr-3 stretched-link">LEARN MORE</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4 mt-3">
          <div class="card card-wrapper box-shadow-hover border-0 text-left" data-aos="zoom-in" data-aos-duration="1500">
            <div class="icon-wrapper">
              <div class="position-relative w-100 h-100">
                <div class="icon-day text-primary"> 07 </div>
                <div class="icon-month text-primary"> May </div>
              </div>
            </div>
            <img class="card-img-top" src="images/events2.png" alt="Undergraduate Music Open Day">
            <div class="border card-border d-flex flex-column">
              <div class="card-body py-3">
                <ul class="list-inline mb-2 overflow-2l">
                  <li class="list-inline-item info text-primary">2:00 P.M - 4:00 P.M.</li>
                  <li class="list-inline-item text">|</li>
                  <li class="list-inline-item info text-primary">Irbed Campus</li>
                </ul>
                <a href="events.html">
                  <h3 class="card-text title text-primary link overflow-2l"> Undergraduate Music Open Day </h3>
                </a>
                <p class="card-text overflow-3l text mt-2 w-100"> Music open days are aimed at candidates who have made Kingston University one of their university choices </p>
              </div>
              <div class="text-right mb-2 pb-1 pr-1">
                <a href="events.html" class="more link font-weight-bold mr-3 stretched-link">LEARN MORE</a>
              </div>
            </div>
          </div>
        </div>
        <div class=" col-12 col-md-4 mt-3">
          <div class="card card-wrapper box-shadow-hover border-0 text-left" data-aos="zoom-in" data-aos-duration="1500">
            <div class="icon-wrapper">
              <div class="position-relative w-100 h-100">
                <div class="icon-day text-primary"> 20 </div>
                <div class="icon-month text-primary"> August </div>
              </div>
            </div>
            <img class="card-img-top" src="images/events3.png" alt="people in event">
            <div class="border card-border d-flex flex-column">
              <div class="card-body">
                <ul class="list-inline mb-2 overflow-2l">
                  <li class="list-inline-item info text-primary">4:00 P.M - 6:00 P.M.</li>
                  <li class="list-inline-item text">|</li>
                  <li class="list-inline-item info text-primary">Amman Campus</li>
                </ul>
                <a href="events.html">
                  <h3 class="card-text title text-primary link overflow-2l"> Making Nature’ Exhibition At Wellcome Collection </h3>
                </a>
                <p class="card-text overflow-3l text mb-auto mt-2 w-100"> The question of how humans relate to other animals has captivated, scientists, ethicists and artists for centuries </p>
              </div>
              <div class="text-right mb-2 pb-1 pr-1">
                <a href="events.html" class="more link font-weight-bold mr-3 stretched-link">LEARN MORE</a>
              </div>
            </div>
          </div>
        </div>
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
          <form name="get-in-touch" action="#" method="get">
            <div class="row px-lg-5 py-5 justify-content-center">
              <div class="col-12 text-center my-4">
                <span class="heading text-primary"> GET IN TOUCH </span>
              </div>
              <div class="col-12 col-md-6 pl-md-5 my-2 ml-md">
                <input class="form-control" type="text" name="fullname" placeholder="Full Name" required>
              </div>
              <div class="col-12 col-md-6 pr-md-5 my-2">
                <input class="form-control" type="text" name="phone" placeholder="Phone Number" required>
              </div>
              <div class="col-12 px-md-5 my-2">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
              </div>
              <div class="col-12 px-md-5 my-2">
                <textarea id="form-textarea" class="form-control" name="message" cols="30" rows="7" placeholder="Message" required></textarea>
                <div class="text-right">
                  <span id="display_count">0</span><span>/</span><span id="word_left">50</span>
                </div>
              </div>
              <div class="col-12 mt-4 mb-2 text-center">
                <button class="btn btn-primary button font-weight-bold px-5 py-3" type="submit">SUBMIT</button>
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
            <li>
              <a href="#!" class="text-capitalize link">Privacy and Cookies</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Legal Information</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">About the University</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">News and Events</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Research</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Schools and Departments</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">International</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Job Vacancies</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 border-left order-2 text-center text-md-left">
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu2" role="button" aria-expanded="false" aria-controls="footer-menu2">QUICK LINKS</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mt-3 mb-4" id="footer-menu2">
            <li>
              <a href="#!" class="text-capitalize link">Online Payments</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Library</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Alumni</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Community Information</a>
            </li>
          </ul>
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu3" role="button" aria-expanded="false" aria-controls="footer-menu3">USING OUR SITE</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mt-3 mb-4" id="footer-menu3">
            <li>
              <a href="#!" class="text-capitalize link">Accessibilty</a>
            </li>
            <li>
              <a href="#!" class="text-capitalize link">Freedom of Information</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 border-left order-3 text-center text-md-left">
          <a class="d-block text-secondary font-weight-bold title text-center text-md-left mb-2" data-toggle="collapse" href="#footer-menu4" role="button" aria-expanded="false" aria-controls="footer-menu4">HOW TO FIND US</a>
          <ul class="footer-menu collapse list-unstyled text-center text-md-left mb-0 mt-3 mb-4" id="footer-menu4">
            <li class="my-2">
              <i class="fas fa-phone-alt text-white pr-2"></i>
              <a href="#!" class="text-capitalize link">+ 1 (408) 703 8738</a>
            </li>
            <li class="my-2">
              <i class="fas fa-phone-alt text-white pr-2"></i>
              <a href="#!" class="text-capitalize link">+ 962 6 581 7612</a>
            </li>
            <li class="my-2">
              <i class="fas fa-envelope text-white pr-2"></i>
              <a href="#!" class="text-capitalize link">info@SciencesUniversity.edu</a>
            </li>
            <li class="my-2">
              <i class="fas fa-envelope text-white pr-2"></i>
              <a href="#!" class="text-capitalize link">Contact Us</a>
            </li>
            <li class="my-2">
              <i class="fas fa-map-marker-alt text-white pr-2"></i>
              <a href="#!" class="text-capitalize link">Find Us</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0 border-left order-last order-md-4">
          <div class="mb-5 mt-4 text-center text-md-left">
            <a href="index.html">
              <img src="images/brand-white.png" alt="Sciences University">
            </a>
          </div>
          <div class="text-secondary font-weight-bold title mb-2 text-center text-md-left">FOLLOW US</div>
          <ul class="list-unstyled text-center text-md-left">
            <li>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fa-linkedin-in fa-sm"></i>
              </a>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fa-facebook-f fa-sm"></i>
              </a>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fab fa-instagram fa-sm"></i>
              </a>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fa-twitter fa-sm"></i>
              </a>
              <a href="#!" class="text-capitalize link-social mr-3">
                <i class="fab fa-youtube  fa-sm"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center text-white copy-rights p-2">
      © 2017 <a class="link text-white" href="index.html">Sciences University</a>. All Rights Reserved.
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