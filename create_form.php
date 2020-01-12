<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
?>

<section style="margin-top: 10rem; margin-bottom: 5rem">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
            <div class="card-body">
                <h2 class="card-title">Create a new Form!</h2>
                <div class="container justify-content-center align-items-center text-center"
                    style="margin-top: 50px; margin-bottom: 50px;">
                    <div id="test">
                        <p>Create your Form!</p>
                        <div class="input-group justify-content-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Form Name:</span>
                            </div>
                            <input type="text" id="formname" value="">
                        </div><br>

                        <!--<div class="input-group justify-content-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Section Heading:</span>
                            </div>
                            <input v-model="sectionheading" type="text" class="form-control" name="" value="">
                        </div><br>
                        <button type="button" name="button" class="btn btn-success badge-pill"
                            @click="addAnotherSectionHeading()">Add Another Section Heading</button><br><br>-->

                        <div class="input-group justify-content-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Range Input Question:</span>
                            </div>
                            <input v-model="rangename" type="text" class="form-control" name="" value="">
                        </div><br>
                        <button type="button" name="button" class="btn btn-success badge-pill"
                            @click="addAnotherRangeInput()">Add Another Range Question</button><br><br>


                        <div class="input-group justify-content-center">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Feedback Input Question:</span>
                            </div>
                            <input v-model="feedbackname" type="text" class="form-control" name="" value="">
                        </div><br>
                        <button type="button" name="button" class="btn btn-success badge-pill"
                            @click="addAnotherFeedbackInput()">Add Another Feedback Question</button><br><br>
                        <button type="button" name="button" class="btn btn-success badge-pill" @click="sendData()">send
                            Data</button><br><br><br>

                        <ul class="contents" v-for="range in contents">
                            <div class="row" style="margin-bottom: 15px;" v-if="range.type === 'range'">
                                <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">{{range.rangename}}</div>
                                <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range"
                                        class="custom-range" min="0" value="5" max="10" step="1"></div>
                                <button @click="removeRangeInput(range)"
                                    class="btn btn-success badge-pill">remove</button>
                            </div>
                            <div class="row" style="margin-bottom: 15px;" v-else>
                                <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">{{range.feedbackname}}
                                </div>
                                <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><textarea
                                        class="form-control" rows="3"></textarea></div>
                                <button @click="removeRangeInput(range)"
                                    class="btn btn-success badge-pill">remove</button>
                            </div>
                        </ul>

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