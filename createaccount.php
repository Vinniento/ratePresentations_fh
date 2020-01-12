<!DOCTYPE html>
<html lang="en">

  <?php
  include "head.php";
  ?>

  <!-- Create Account -->
    
    <header class="masthead">
        <div class="container h-100 d-flex justify-content-center align-items-center text-center">
          <div class="card bg-secondary">
            <div class="card-body">
              <h2 class="card-title">Create your Teacher Account</h5>
              <div class="container">
                  <br>
                <form action="create_account_check.php" method="post">
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">First Name:</span>
                        </div>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="John" aria-label="firstname" aria-describedby="basic-addon1">
                      </div>
                </row>
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Last Name:</span>
                        </div>
                        <input type="text" id="lasttname" name="lasttname" class="form-control" placeholder="Doe" aria-label="lastname" aria-describedby="basic-addon1">
                      </div>
                </row>
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">E-Mail:</span>
                        </div>
                        <input type="text" id="mail" name="mail" class="form-control" placeholder="yourname@example.com" aria-label="email" aria-describedby="basic-addon1">
                      </div>
                </row>
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <!-- Hier eventuell Dropdown? -->
                          <span class="input-group-text" id="basic-addon1">Institution</span>
                        </div>
                        <input type="text" id="institution" name="institution" class="form-control" aria-label="institution" aria-describedby="basic-addon1">
                      </div>
                </row>
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Password</span>
                        </div>
                        <input type="password" id="password" name="pwd" class="form-control" aria-label="pwd" aria-describedby="basic-addon1">
                      </div>
                </row>
                <row>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Password again:</span>
                        </div>
                        <input type="password" id="password1" name="pwd1" class="form-control" aria-label="pwd1" aria-describedby="basic-addon1">
                      </div>
                </row>
                <br>
                
                  <div>
                  <button class="btn btn-success badge-pill" type="submit" name="submit" value="Login">Create Account</button>
                  <input type="hidden" name="submit" value="validate"><br><br>
                  </div>
                </form>
                
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
