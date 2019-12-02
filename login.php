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


  <header class="masthead">
      <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary">
          <div class="card-body">
            <h2 class="card-title">Login</h2>
            <div class="container">
              <form action="login_check.php" method="post">
              <row>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">E-Mail:</span>
                      </div>
                      <!--<input type="email" class="form-control" placeholder="yourname@example.com" aria-label="E-Mail" aria-describedby="basic-addon1">-->
                      <input type="email" class="form-control" name="email" value="teacher@test.com" aria-label="E-Mail" aria-describedby="basic-addon1" required>
                    </div>
                <!--<column class="float-left"><label for="mail">E-Mail:</label></column>
                <input type="text" id="mail" name="mail" value= "testuser" required class="float-right"><br><br>-->
              </row>
              <row>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Password:</span>
                      </div>
                      <input type="password" id="password" name ="pwd" value="test" class="form-control" placeholder="A Strong Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
                  <!--<column class="float-left"><label for="password">Password:</label></column>
                  <input type="password"  id="password" name="pwd" value= "nlkj" required class="float-right"><br><br>-->
              </row>
                <div>
                <button class="btn btn-success" type="submit" name="submit" value="Login">Login</button>
                </div>
              </form>
              <br>
              <div>
              <a class="btn btn-success" href="createaccount.html">Create new Account for Teachers</a>
              </div>
          <br>              
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
