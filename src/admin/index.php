<?php
session_start();
include_once 'class/User.php';
include_once 'class/Event.php';
include_once 'class/NavLink.php';
include_once 'class/News.php';
include_once 'class/Slider.php';


$user = new User();
$event = new Event();
$navlink = new NavLink();
$news = new News();
$slider = new Slider();

$media = $user->getMedia($_SESSION['user_id']);

if (!$user->loggedIn()) {
  header('Location:users/login.php');
}

$userCount = $user->rowsCount();
$eventCount = $event->rowsCount();
$navlinkCount = $navlink->rowsCount();
$newsCount = $news->rowsCount();
$sliderCount = $slider->rowsCount();

// print_r($eventCount);
// die();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <?php include 'header.php' ?>
</head>


<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
  <?php include 'layout.php' ?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-md-6 col-lg-6 col-xl-3">
        <a href="users">
          <div class="media widget-media p-4 bg-white border">
            <div class="icon rounded-circle mr-4 bg-primary">
              <i class="mdi mdi-account-group text-white "></i>
            </div>

            <div class="media-body align-self-center">
              <h4 class="text-primary mb-2"><?= $userCount['count'] ?></h4>
              <p>Users</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <a href="news">
          <div class="media widget-media p-4 bg-white border">
            <div class="icon rounded-circle bg-warning mr-4">
              <i class="mdi mdi-newspaper text-white "></i>
            </div>

            <div class="media-body align-self-center">
              <h4 class="text-primary mb-2"><?= $newsCount['count'] ?></h4>
              <p>News</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <a href="events">
          <div class="media widget-media p-4 bg-white border">
            <div class="icon rounded-circle mr-4 bg-danger">
              <i class="mdi mdi-view-dashboard-outline text-white "></i>
            </div>

            <div class="media-body align-self-center">
              <h4 class="text-primary mb-2"><?= $eventCount['count'] ?></h4>
              <p>Events</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-6 col-lg-6 col-xl-3">
        <a href="sliders">
          <div class="media widget-media p-4 bg-white border">
            <div class="icon bg-secondary rounded-circle mr-4">
              <i class="mdi mdi-page-next-outline text-white "></i>
            </div>

            <div class="media-body align-self-center">
              <h4 class="text-primary mb-2"><?= $sliderCount['count'] ?></h4>
              <p>Sliders</p>
            </div>

          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-6 col-xl-3">
        <a href="nav_links">

          <div class="media widget-media p-4 bg-white border">
            <div class="icon bg-success rounded-circle mr-4">
              <i class="mdi mdi-link-variant text-white "></i>
            </div>

            <div class="media-body align-self-center">
              <h4 class="text-primary mb-2"><?= $navlinkCount['count'] ?></h4>
              <p>navlinks</p>
            </div>

          </div>
        </a>
      </div>
    </div>
  </div>

  

  </div>
  </div>


  <?php include 'footer.php' ?>




</body>

</html>