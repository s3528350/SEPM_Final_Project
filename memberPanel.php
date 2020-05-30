<?php
$title = 'Members Panel';
include 'includes/header.php';
include 'includes/nav.php';
 if(isset($_SESSION['admin']) or isset($_SESSION['root']) or isset($_SESSION['assistant'])) :
?>
  <div class="container" id="main-container">
    <h1 class="text-center">Members Panel</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">

      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Locations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tours</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tour_type-tab" data-toggle="tab" href="#tour_type" role="tab" aria-controls="contact" aria-selected="false">Tour Types</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <?php include 'includes/locations.php' ?>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <?php include 'includes/tours.php' ?>
        <div class="tab-pane fade" id="tour_type" role="tabpanel" aria-labelledby="tour_type-tab">
        <?php include 'includes/tour_type.php' ?>
      </div>

      <?php
      include('includes/footer.php');
 else:
  header('Location: login.php');
 endif;
      ?>