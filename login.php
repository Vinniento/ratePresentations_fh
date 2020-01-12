<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
?>

<!-- Login -->


<header class="masthead">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary">
            <div class="card-body">
                <h2 class="card-title">Login</h2>
                <div class="container">
                    <form method="post">
                        <row>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">E-Mail:</span>
                                </div>

                                <input type="email" class="form-control" name="email" id="email"
                                    value="teacher@test.com" aria-label="E-Mail" aria-describedby="basic-addon1"
                                    required>
                            </div>

                        </row>
                        <row>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Password:</span>
                                </div>
                                <input type="password" id="password" name="password" value="test" class="form-control"
                                    placeholder="A Strong Password" aria-label="Password"
                                    aria-describedby="basic-addon1" required>
                            </div>

                        </row>
                        <div>
                            <button class="btn btn-success" type="submit" id="submit" name="submit"
                                value="Login">Login</button>
                        </div>
                    </form>
                    <br>
                    <div>
                        <a class="btn btn-success" href="createaccount.php">Create new Account for Teachers</a>
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