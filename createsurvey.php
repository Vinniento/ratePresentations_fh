
<!DOCTYPE html>
<html lang="en">
  
<?php
include "head.php";
?>
 
  <section style="margin-top: 10rem; margin-bottom: 5rem">
      <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
          <div class="card-body">
            <h2 class="card-title">Create a new Survey!</h2>
            <div class="container justify-content-center align-items-center text-center" style="margin-top: 50px; margin-bottom: 50px;">
            <div id="test">
      <p>Create your Survey!</p>
      Survey name<input type="text" id="surveyname"  value =""><br>
        Range Input Question: <input v-model="rangename" type="text" name="" value="">
      <button type="button" name="button" class="btn btn-success badge-pill" @click="addAnotherRangeInput()">Add Another Range Question</button><br>
        Feedback Input Question: <input v-model="feedbackname" type="text" name="" value=""> 
      <button type="button" name="button" class="btn btn-success badge-pill" @click="addAnotherFeedbackInput()">Add Another Feedback Question</button><br>
      <button type="button" name="button" class="btn btn-success badge-pill" @click="sendData()">send Data</button><br>
        <!--<ul class="contents">
          <li v-for="range in contents">
            {{range.rangename}} <input type="range" class="custom-range" min="1" max="10" step="1"> <button @click="removeRangeInput(range)">remove</button>
          </li>
          <li v-for="feedback in contents">
            {{feedback.feedbackname}} <textarea class="form-control" rows="3"></textarea> <button @click="removeFeedbackInput(feedback)">remove</button>
          </li>
        </ul>-->

    </div>
      <!--
      <div id="createRating">
        <div class="d-flex justify-content-center align-items-center text-center" style="margin-bottom: 50px;">
        <button class="btn btn-success badge-pill" @click="addSection" style="margin-right: 20px;">Add a Section</button>
        <button class="btn btn-success badge-pill" @click="addRange" style="margin-right: 20px;">Add Range Slider</button>
        <button class="btn btn-success badge-pill" @click="addText">Add Text Feedback</button>         
      </div>

      <-- Add Section Heading --
      <div class="row" style="margin-bottom: 15px;" v-for="(row, index) in sections">
          <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">
            <textarea class="form-control" rows="1" v-model="row.sectionname" placeholder="Add a new Section!"></textarea>
          </div>
          <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;">
            
          </div>
          <div class="col-sm-12 col-md-2"> 
            <button class="btn btn-success badge-pill" v-on:click="removeSection(index)">Remove</button>
          </div>
        </div>

        <-- Add Ranges --

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

        <-- Add Additional Text --

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

        
      </div> --->

      <!---
    </div>
      </div>


      <button class="btn btn-success badge-pill">Create Survey</button>
      </div>
    </section>--->
    <!---

    <div id="test">
      <p>Create your Survey!</p>
        Range Input Question: <input v-model="rangename" type="text" name="" value="">
      <button type="button" name="button" @click="addAnotherRangeInput">Add Another Range Question</button>
        Feedback Input Question: <input v-model="feedbackname" type="text" name="" value="">
      <button type="button" name="button" @click="addAnotherFeedbackInput">Add Another Feedback Question</button>
      <button type="button" name="button" @click="sentdata">send Data</button>
        <ul class="contents">
          <li v-for="range in contents">
            {{range.rangename}} <input type="range" class="custom-range" min="1" max="10" step="1"> <button @click="removeRangeInput(range)">remove</button>
          </li>
          <li v-for="feedback in contents">
            {{feedback.feedbackname}} <textarea class="form-control" rows="3"></textarea> <button @click="removeFeedbackInput(feedback)">remove</button>
          </li>
        </ul>
    </div> -->


        

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