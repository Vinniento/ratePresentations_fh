<!DOCTYPE html>
<html lang="en">
  
<?php
include "head.php";
if((!isset($_SESSION['email'])) || $_SESSION['isteacher'] !=1){
  header("Location: index.php");
}
?>

    <header class="masthead">
        <div class="container w-100 h-100 d-flex justify-content-center align-items-center text-center" style="width: 60rem;">
            <div class="card bg-secondary" style="width: 70rem;">
                <div class="card-body">
                    <br>
                    <div class="row justify-content-center">
                        <h3 class="card-title">What do you want to do?</h3>
                    </div>
                    <br>

                <teacherNavigation>
                    <div>               
                        <div v-for="component in componentsArray" style="padding-bottom: 10px;">
                            <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" @click="swapComponent(component)">{{component}}</button>
                        </div>
                        <br>
                        <div :is="currentComponent"></div>
                        <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" @click="swapComponent(null)">Close</button>
                    </div>
                </teacherNavigation>
                
                </div>
            </div>
        </div>
    </header>

    <div class="container justify-content-center align-items-center text-center" style="margin-top: 50px; margin-bottom: 50px;">
      <div id="createRating">
        <div class="d-flex justify-content-center align-items-center text-center" style="margin-bottom: 50px;">
          <button class="btn btn-success badge-pill" @click="addRange" style="margin-right: 20px;">Add Range Slider</button>
          <button class="btn btn-success badge-pill" @click="addText" style="margin-left: 20px;">Add Text Feedback</button>
        </div>
        <div class="row" style="margin-bottom: 50px;">
          <div class="col-md-4">
            <strong>Question</strong>
          </div>
          <div class="col-md-6">
            <strong>Answer</strong>
          </div>
          <div class="col-md-2">
            <strong>Remove</strong>
          </div>
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
      </div>
    </div>

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
    
    <script type="text/x-template" id="addstudents">
        <form action="add_students.php" method="post" class="justify-content-center">
                <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" name ="firstname" id="firstname" placeholder="John">
                </div>
                <div class="form-group">
                  <label for="lastname">Last Name:</label>
                  <input type="text" class="form-control" name ="lastname" id="lastname" placeholder="Doe">
                </div>
                <div class="form-group">
                  <label for="email">E-Mail:</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@test.com">
                </div>
            <div style="padding-bottom: 10px">
                <button type="submit" value="Add Student" class="btn btn-primary badge-pill" style="width: 13rem;">Add Student</button>
            </div>
              </form>
    </script>

    <script type="text/x-template" id="creategroups">
        <form action="createsurvey.php" method="post">
            <div class="form-group">
                <label for="groupname">Group Name:</label>
                <input type="text" class="form-control" id="groupname" placeholder="Your Group!">
                <button type="submit" value="Create Presentation" class="btn btn-primary badge-pill" style="width: 13rem;">Create Presentation</button>
            </div>
        </form>
    </script>
  
  </body>
  
  </html>

