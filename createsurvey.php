<?php
session_start();
if(isset($_SESSION['person_id'])) {
 // header("location: index.php");
}
if(isset($_SESSION['login_failed'])){
  echo "<script>alert('username/password wrong, try again ')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rate Presentations</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">
  <script src="https://unpkg.com/vue"></script>
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top bg-dark" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.html">Rate Presentations</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
        
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.html">Help Us</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
                <a class="nav-link"><i class="fas fa-user-circle" href=""></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Login -->


  <header style="margin-top: 10rem; margin-bottom: 5rem">
      <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
          <div class="card-body">
            <h2 class="card-title">Create a new Survey!</h2>
            <div class="container justify-content-center align-items-center text-center" style="margin-top: 50px; margin-bottom: 50px;">
      <div id="createRating">
        <div class="d-flex justify-content-center align-items-center text-center" style="margin-bottom: 50px;">
          <button class="btn btn-success badge-pill" @click="addRange" style="margin-right: 20px;">Add Range Slider</button>
          <button class="btn btn-success badge-pill" @click="addText" style="margin-left: 20px;">Add Text Feedback</button>
          <button class="btn btn-success badge-pill" @click="addSection" style="margin-left: 20px;">Add a Section</button>       
        </div>

        <div class="row" style="margin-bottom: 15px;" v-for="(row, index) in ranges">
          <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="1" v-model="row.question" placeholder="Enter your Question!"></textarea>
          </div>
          <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;">
            <input type="range" class="custom-range" min="1" max="10" step="1" v-model="row.slider">
          </div>
          <div class="col-sm-12 col-md-2"> 
            <button class="btn btn-success badge-pill" v-on:click="removeRange(index)">Remove</button>
          </div>
        </div>

        <div class="row" style="margin-bottom: 15px;" v-for="(row, index) in texts">
          <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="1" v-model="row.feedback" placeholder="Enter your Question!"></textarea>
          </div>
          <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="3" v-model="row.text"></textarea>
          </div>
          <div class="col-sm-12 col-md-2"> 
            <button class="btn btn-success badge-pill" v-on:click="removeText(index)">Remove</button>
          </div>
        </div>

        <div class="row" style="margin-bottom: 15px;" v-for="(row, index) in sections">
          <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="1" v-model="row.sectionname" placeholder="Add a new Section!"></textarea>
          </div>
          <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="3" v-model="row.sectiontest"></textarea>
          </div>
          <div class="col-sm-12 col-md-2"> 
            <button class="btn btn-success badge-pill" v-on:click="removeSection(index)">Remove</button>
          </div>
        </div>

        <!--<div class="row" style="margin-bottom: 15px;" v-for="(row, index) in sections">
          <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="1" v-model="row.sectionname" placeholder="Enter your Section!"></textarea>
          </div>
        <div class="col-sm-12 col-md-2">
          <button class="btn btn-success badge-pill" v-on:click="removeSection(index)">Remove</button>

        </div>-->

        

      </div>
    </div>
      </div>
    </header>

  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
      <div class="container">
        Copyright &copy; Rate Presentations - 2019
      </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="js/app.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  

</body>

</html>