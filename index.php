<?php
//session_start();

?>
<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
?>

<!-- Header -->
<header class="masthead">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary">
            <div class="card-body">
                <h5 class="card-title">Enter the Code you received here!</h5>
                <div class="container">
                    <form action="rating.php" method="post">
                        <row>
                            <div class="input-group mb-3">
                                <input type="code" id="code" name="code" class="form-control" placeholder="Code"
                                    aria-label="Code" aria-describedby="basic-addon1">
                            </div>
                        </row>
                        <div>
                            <!--   <a href="rate_form.html" class="btn btn-block btn-success badge-pill js-scroll-trigger">Rate!</a>-->
                            <button class="btn btn-block btn-success badge-pill js-scroll-trigger" type="submit"
                                id="submitbutoon" name="submitbutoon" value="Rate">Rate</button>
                        </div>
                    </form>
                    <br>
                    <div>
                    </div>
                </div>
</header>

<!-- About Section -->
<section id="about" class="about-section text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-white mb-4">About the Project</h2>
                <p class="text-white-50">The goal of our project is to create a website that allows both students and
                    teachers to give feedback to presentations of their colleagues.
                    Teachers can create their own accounts and add students to groups. After creating a presentation,
                    the students enter a code, to get access to the feedback form.
                    Both, teachers and students will have to fill out the same form, first for the whole group of the
                    presentation. Then they can give additional feedback to
                    individuals of the group. The results are then displayed on a different webpage, whereas the left
                    side shows the feedback given by students and the right side the
                    ones given by teachers. Everything will happen anonymously. When feedback is given to an individual
                    person, this person receives an email with a link that sends
                    them back to our website, where they can view their feedback.</p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-black mb-4">Team</h2>
            </div>
        </div>

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/image1.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Christoph</h4>
                            <p class="mb-0 text-white-50">:D</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/image2.jpg" alt="">
            </div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Daniel</h4>
                            <p class="mb-0 text-white-50">:)</p>
                            <hr class="d-none d-lg-block mb-0 mr-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Project Three Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/image3.jpg" alt="">
            </div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Lucas</h4>
                            <p class="mb-0 text-white-50">:DD</p>
                            <hr class="d-none d-lg-block mb-0 ml-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Project Four Row -->
        <div class="row justify-content-center no-gutters">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/image4.jpg" alt="">
            </div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">Vincent</h4>
                            <p class="mb-0 text-white-50">:))</p>
                            <hr class="d-none d-lg-block mb-0 mr-0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section bg-black" id="helpus">
    <div class="container">

        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h2 class="text-white mb-4">Help Us Make Our Dream Come True</h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">Favoritenstraße 226, 1100 Wien</div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">
                            <a href="mailto:edmin.ratepresentations@gmail.com">edmin.ratepresentations@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fab fa-bitcoin text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Help Us</h4>
                        <hr class="my-4">
                        <div class="small text-black-50">Bitcoin Wallet:<p></p>334TkzzELYtLcozVkjehBksTnhybPuHhDQ</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="social d-flex justify-content-center">
            <a href="#" class="mx-2">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="mx-2">
                <i class="fab fa-github"></i>
            </a>
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

<!-- Custom scripts for this template -->
<script src="js/grayscale.min.js"></script>


</body>

</html>