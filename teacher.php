<!DOCTYPE html>
<html lang="en">
  
<?php
include "head.php";
if((!isset($_SESSION['email'])) || $_SESSION['isteacher'] !=1){
  header("Location: index.php");
}
?>


<script>
    function createTableFromJSON() {
        hideAll();
        document.getElementById('create_groups').style.display = "block";
        let con = new XMLHttpRequest(); //Create Object
        console.log("1");

        con.open("GET", "get_students_list.php", true); //open the connection
        con.onreadystatechange = function() { //define Callback function
            if (con.readyState == 4 && con.status == 200) {
                console.log("2");
                console.log(this.responseText);
                let response = this.responseText;
                let students = JSON.parse(this.responseText); //Convert String back into JSON object
                console.log(students);
                let col = [];
                for (let key in students[0]) {
                    col.push(key);
                }

                // CREATE DYNAMIC TABLE.
                let table = document.createElement("table");

                // CREATE HTML TABLE HEADER ROW USING THE EXTRACTED HEADERS ABOVE.
                let tr = table.insertRow(-1); // TABLE ROW AT THE END
                let th = document.createElement("th");
                th.innerHTML = "SELECT";
                tr.appendChild(th);
                for (let i = 0; i < 2; i++) {
                    let th = document.createElement("th"); // TABLE HEADER.
                    th.innerHTML = col[i];
                    tr.appendChild(th);
                }

                // ADD JSON DATA TO THE TABLE AS ROWS.
                for (let i = 0; i < students.length; i++) {
                    tr = table.insertRow(-1);
                    var checkbox = document.createElement('input');
                    checkbox.type = "checkbox";


                    console.log(students[i][col[0]]);

                    tr.appendChild(checkbox);

                    for (let j = 0; j < 2; j++) {
                        let tabCell = tr.insertCell(-1);
                        tabCell.innerHTML = students[i][col[j]];
                        checkbox.setAttribute('name', students[i][col[2]]);
                    }
                }
                // FINALLY ADD THE NEWLY CREATED TABLE WITH JSON DATA TO A CONTAINER.
                let divContainer = document.getElementById("create_groups");
                //divContainer.innerHTML = "";
                divContainer.appendChild(table);
            }

        }

        con.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Set appropriate request Header
        con.send(); //Request File Content
    }
/*
    element.addEventListener("click", formSend());

    function formSend() {

        var blub = "blub";

        var inputValue = 'hello=' + blub;

        let con = new XMLHttpRequest(); //Create Object (verbindungsaufbau)
        con.open('get', 'create_check.php'); //open the connection
        con.onreadystatechange = function() { //define Callback function
            if (con.readyState === 4 && con.status === 200) { //4 -> server ist fertig


            }

        };
        con.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        con.send(inputValue);

    }*/
</script>


<section style="margin-top: 10rem; margin-bottom: 5rem">
      <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
          <div class="card-body">
            <h2 class="card-title">What do you want to do?</h2>
            <div class="container justify-content-center align-items-center text-center" style="margin-top: 50px; margin-bottom: 50px;">
      
        <teacherNavigation>

        
            <div class="row"><br>
                <div class="col s12 m3 l3 center-align">
                    <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" value="Add Students" onclick="showAddStudents()">Add Students</button>
                    <br>

                    <div id="add_students" style="display:none;">
                    <br>
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
                            <button type="submit" value="Add Student" class="btn btn-primary badge-pill" style="width: 13rem;">Add</button>

                        </form>
                    </div>

                <br>

                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button"  name="create_groups" value="Create Groups" onclick="createTableFromJSON()">Create Groups</button>
                    <br><br>
            <div id="create_groups" style="display:none;"> 

                <p>
                    blub
                </p>

            </div>
                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="view_ratings" value="Create Survey" onclick="showViewRatings()">Create Survey</button>
                <br><br>    
                <div id="view_ratings" style="display:none;"> 

                    <p>
                        blub
                    </p>
                    <br>
                </div>

                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="add_group_to_survey" value="Add Group to Survey" onclick="showViewRatings()">Add Group to Survey</button>
                <br><br>    
        
                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="rate_groups" value="Rate Groups" onclick="showRateGroups()">Rate Groups</button>
                    <br><br>
                
                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="view_ratings" value="View Ratings" onclick="showViewRatings()">View Ratings</button>
                <br><br>

                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="create_ratings" value="Create Ratings" onclick="showViewRatings()">Create Rating</button>
                </div>

            </div>
                   <!-- <div>               
                        <div v-for="component in componentsArray" style="padding-bottom: 10px;">
                            <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" @click="swapComponent(component)">{{component}}</button>
                        </div>
                        <br>
                        <div :is="currentComponent"></div>
                        <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" @click="swapComponent(null)">Close</button>
                    </div> -->
        </teacherNavigation>   
      
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
    
    

    <script type="text/x-template" id="creategroups">
        <form action="createsurvey.php" method="post">
            <div class="form-group">
                <label for="groupname">Group Name:</label>
                <input type="text" class="form-control" id="groupname" placeholder="Your Group!">
                <button type="submit" value="Create Presentation" class="btn btn-primary badge-pill" style="width: 13rem;">Create Presentation</button>
            </div>
        </form>
    </script>

    <script>
    function showAddStudents() {
        hideAll();
        document.getElementById('add_students').style.display = "block";
    }

    function showCreateGroups() {
        hideAll();
        document.getElementById('create_groups').style.display = "block";
    }

    function showRateGroups() {
        hideAll();
        document.getElementById('rate_groups').style.display = "block";
    }

    function showViewRatings() {
        hideAll();
        document.getElementById('view_ratings').style.display = "block";
    }

    function hideAll() {
        document.getElementById('add_students').style.display = "none";
        document.getElementById('create_groups').style.display = "none";
        //document.getElementById('rate_groups').style.display = "none";
        //document.getElementById('view_ratings').style.display = "none";
    }
</script>
  
  </body>
  
  </html>

