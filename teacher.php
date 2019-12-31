<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
if ((!isset($_SESSION['email'])) || $_SESSION['isteacher'] != 1) {
    header("Location: index.php");
}
?>


<section style="margin-top: 10rem; margin-bottom: 5rem">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
            <div class="card-body">
                <h2 class="card-title">What do you want to do?</h2>
                <div class="container justify-content-center align-items-center text-center" style="margin-top: 50px; margin-bottom: 50px;">





                    <teacherNavigation>


                        <div class="row"><br>
                            <div class="columns s12 m3 l3 center-align">
                                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" value="Add Students" onclick="showAddStudents()">Add Students</button>
                                <br>

                                <div id="add_students" style="display:none;">
                                    <br>
                                    <form action="add_students.php" method="post" class="justify-content-center">
                                        <div class="form-group">
                                            <label for="firstname">First Name:</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="John">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Last Name:</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Doe">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-Mail:</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="johndoe@test.com">
                                        </div>
                                        <button type="submit" value="Add Student" class="btn btn-primary badge-pill" style="width: 13rem;">Add</button>

                                    </form>
                                </div>

                                <br>

                                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="create_groups" value="Create Groups" onclick="showCreateGroups()">Create Groups</button>
                                <br><br>
                                <div id="selected_students">
                                    <div id="create_groups" style="display:none;">
                                        <div class="row justify-content-center">
                                            <input type="text" class="form-control" id="groupname" value="" placeholder="Enter Groupname here!" style="width:16rem;" />
                                        </div>
                                        <br>
                                        <div id="display_students">
                                            <div calss="table-responsive-sm">
                                                <table class="table table-striped table-dark table-hover">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Select</th>
                                                            <th>Firstname</th>
                                                            <th>Lastname</th>
                                                            <th>E-mail</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr v-for="(student, index) in students">
                                                            <td><input type="checkbox" :id="student.person_ID"></td>
                                                            <td>{{student.firstname}}</td>
                                                            <td>{{student.lastname}}</td>
                                                            <td>{{student.email}}</td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <button type="submit" value="addstudenttogroup" class="btn btn-primary badge-pill" style="width: 13rem;" onclick="addCheckedStudentsToArray()">Create Group</button>
                                        <br><br>
                                    </div>
                                </div>

                                <a class="btn btn-success badge-pill" href="create_form.php">Create form</a>
                                <br><br>
                                <div id="create_form" style="display:none;">

                                    <br>
                                </div>

                                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="add_group_to_form" value="Add Group to form" onclick="showAddGroupsToForm()">Add Group to form</button>

                                <div id="add_groups_to_form" style="display:none;">
                                    <div class="row justify-content-center">

                                        <br>

                                        <div class="table-responsive-sm">
                                            <div id="display_groups">
                                                <div id="selected_groups">
                                                    <!--<table class="table table-striped table-dark table-hover" class="display: inline-block">-->
                                                    <br>
                                                    Presentation Date <input type="date" id="presentation_date" value="">
                                                    <table class="table table-striped table-dark table-hover">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Select Group</th>
                                                                <th>Group Name</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="(group, index) in groups">
                                                                <td><input type="checkbox" :id="group.group_ID"></td>
                                                                <td>{{group.group_name}}</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div id="display_forms">
                                                <div id="selected_form">
                                                    <!--<table class="table table-striped table-dark table-hover" class="display: inline-block">-->
                                                    <table class="table table-striped table-dark table-hover">

                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Select Form</th>
                                                                <th>Form name</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr v-for="form in forms">
                                                                <td><input type="radio" name="form" :id="form.form_ID"></td>
                                                                <td>{{form.name}}</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>

                                    </div>
                                    <button type="submit" value="addstudenttogroup" class="btn btn-primary badge-pill" style="width: 13rem;" onclick="insertPresentationIntoDB()">Create Presentation</button>
                                </div>

                                <br>


                                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="view_presentations" value="View Presentations" onclick="showViewPresentations()">View Presentations</button>
                                <br><br>
                                <div id="view_presentations" style="display:none;">
                                    <br>

                                    <div id="codeget">
                                        <div class="table-responsive-sm">
                                            <table class="table table-striped table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Presentation</th>
                                                        <th>Rating-Code</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(code, index) in codes">
                                                        <td>{{code.name}}</td>
                                                        <td>{{code.code}}</td>


                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="view_ratings" value="View Ratings" onclick="showViewRatings()">View Ratings</button>
                                <br><br>
                                <div id="view_ratings" style="display:none;">
                                    <br>

                                    <div>
                                        <h5>Hier Presentation Name</h5>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="columns m6 l6">
                                            <h6>Group Members:</h6>
                                            <p>blabla</p>
                                            <p>blabla</p>
                                            <p>blabla</p>
                                            <p>blabla</p>
                                            <p>blabla</p>
                                        </div>
                                        <div class="columns m6 l6">
                                            <h6>Datum: blablabla</h6>
                                            <br><br>
                                            <h6>Code: blablabla</h6>
                                            <br><br>
                                            <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="" value="View Ratings">View!</button>
                                            <br><br><br>
                                        </div>
                                    </div>
                                </div>


                                <br><br>
                                Bei View Ratings sollen wieder gleich wie bei dem neuen Button view Presentations das gleiche angezeigt werden, nur statt dem button für rate sollte ein View button dort sein, wo man dann auf die Ergebnisse kommt
                                <br>
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
<script src="createGroups.js"></script>
<script src="create_presentation.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>



<script type="text/x-template" id="creategroups">
    <form action="createform.php" method="post">
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

    function showViewPresentations() {
        hideAll();
        document.getElementById('view_presentations').style.display = "block";
    }

    function showViewRatings() {
        hideAll();
        document.getElementById('view_ratings').style.display = "block";
    }

    function showAddGroupsToForm() {
        hideAll();
        document.getElementById('add_groups_to_form').style.display = "block";
    }

    function hideAll() {
        document.getElementById('add_students').style.display = "none";
        document.getElementById('create_groups').style.display = "none";
        document.getElementById('view_presentations').style.display = "none";
        document.getElementById('view_ratings').style.display = "none";
        document.getElementById('add_groups_to_form').style.display = "none";

        //document.getElementById('rate_groups').style.display = "none";
        document.getElementById('view_ratings').style.display = "none";
    }
</script>
<script>
    var app = new Vue({

        el: '#display_students',
        data: {
            students: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_students_list.php')
                .then(response => {
                    vm.students = response.data;
                    console.log(students);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>
<script>
    var app = new Vue({

        el: '#codeget',
        data: {
            codes: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_code.php')
                .then(response => {
                    vm.codes = response.data;
                    console.log(codes);
                    alert(codes[0]);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>

<script>
    var app = new Vue({

        el: '#display_groups',
        data: {
            groups: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_groups_list.php')
                .then(response => {
                    vm.groups = response.data;
                    console.log(groups);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>
<script>
    //get criteria
    var app = new Vue({

        el: '#display_forms',
        data: {
            forms: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_forms_list.php')
                .then(response => {
                    vm.forms = response.data;
                    console.log(forms);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>
</body>

</html>