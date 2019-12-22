<!DOCTYPE html>
<html lang="en">
  
<?php
include "head.php";
?>

<body>

<section style="margin-top: 10rem; margin-bottom: 5rem">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
            <div class="card-body">
                <h2 class="card-title">Give your Rating</h2>
                <h5 class="header center-align" style="margin-bottom: 50px;">(0 is worst and 10 is best)</h5>
       
                <div class="container">
                <form action="###" method="post">
                    <div class="row" style="margin-bottom: 15px;">
                        <div class="col-sm-12 col-md-4">
                            <h5 class="header">Group-Rating for:</h5>
                        </div>  
                        <h5 class="col-sm-12 col-md-4" style="margin-bottom: 15px;">NAME der Präsentation HIER AUS DB für luci</h5>
                    </div>
                    <hr>
                    <header style="margin-bottom: 15px;"><br>
                        <h4 class="header center-align" style="margin-bottom: 50px;">Content and Structure</h4>
                    </header>
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Introduction</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="introduction"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Gave an Overview?</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="overview"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Structure of the Presentation itself</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="structure"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Content</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="content"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Conclusion</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="conclusion"></div>
                        </div>

                    <header style="margin-bottom: 15px;"><br>
                        <h4 class="header center-align" style="margin-bottom: 50px;">Visualization</h4>
                    </header>
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Visualization</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="visualization"></div>
                        </div>

                    <header style="margin-bottom: 15px;"><br>
                        <h4 class="header center-align" style="margin-bottom: 50px;">Teamwork</h4>
                    </header>
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Acted as a Team</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="actteam"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Preparation by the Team</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="prepteam"></div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Audience felt necessity to participate</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" min="0" max="10" step="1" name="audpart"></div>
                        </div>

                    <header style="margin-bottom: 15px;"><br>
                        <h4 class="header center-align" style="margin-bottom: 50px;">Additional Feedback for the group: (optional)</h4>
                    </header>
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">Additional Feedback</div>
                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><textarea class="form-control" rows="3" name="addfeedback"></textarea></div>
                        </div>
                        <button class="btn btn-success badge-pill">Create Survey</button>
                </form>
                </div>
            </div> 
        </div>
    </div>
</section>

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