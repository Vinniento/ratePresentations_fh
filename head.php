<?php
session_start();

?>
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
  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">
  <script src="https://unpkg.com/vue"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="login.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="index.php">Rate Presentations</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#projects">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="index.php#helpus">Help Us</a>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['email'])) :
              ?>
              <a class="nav-link" href="logout.php">Logout</a>
            <?php
            else :
              ?>
              <a class="nav-link" href="login.php">Login</a>
            <?php endif; ?>
          </li>
          <li class="nav-item">
            <?php
            if (isset($_SESSION['email'])) :
              ?>
              <?php
                if ($_SESSION['isteacher'] == 1) :
                  ?>
                <a href="teacher.php" class="nav-link">Teacher <i class="fas fa-user-circle"></i></a>
              <?php
                else :
                  ?>
                <a href="student.php" class="nav-link">Student <i class="fas fa-user-circle"></i></a>
              <?php
                // echo $_SESSION['isteacher'];
                endif; ?>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

