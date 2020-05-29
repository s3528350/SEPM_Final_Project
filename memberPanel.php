<?php
$title = 'Admin Panel';
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
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <?php include 'includes/locations.php' ?>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Upcoming...</div>
      </div>

      <?php
      include('includes/footer.php');
 else:
  header('Location: login.php');
 endif;
      ?>