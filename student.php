<!DOCTYPE html>
<html lang="en">
<?php

include "head.php";
if($_SESSION['isteacher'] !=0 || (!isset($_SESSION['email']))){
    header("Location: index.php");
}
?>

    <header class="masthead">
        <div class="container w-100 h-100 d-flex justify-content-center align-items-center text-center" style="width: 60rem;">
            <div class="card bg-secondary" style="width: 70rem;">
                <div class="card-body">
                    <br>
                    <div class="row justify-content-center">
                        <h3 class="card-title">Student bereich</h3>

                        <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="view_ratings" value="View Ratings">View my Presentations</button>
                                <br><br>
                                <div id="displaypresentations">
                                    <br>

                                    <div class="table-responsive-sm">
                                            <table class="table table-striped table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Presentation</th>
                                                        <th>Date of Presentation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(presentation, index) in presentations">
                                                        <td>{{presentation.name}}</td>
                                                        <td>{{presentation.date}}</td>
                                                        <td><button :id="presentation.presentation_ID" onclick="openRating(this.id)">View Rating</button></td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                </div>
<!-- ---------------------------------------------------- -->
<div id="displaycriterias">
                                <p>Click a presentation to view your ratings</p>
                                    <br>

                                    <div class="table-responsive-sm">
                                            <table class="table table-striped table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Presentation</th>
                                                        <th>Date of Presentation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(presentation, index) in presentations">
                                                        <td>{{presentation.name}}</td>
                                                        <td>{{presentation.date}}</td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                </div>
                                <<!-- ---------------------------------------------------- -->
<div id="displayratings">
                                <p>Click a presentation to view your ratings</p>
                                    <br>

                                    <div class="table-responsive-sm">
                                            <table class="table table-striped table-dark table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Presentation</th>
                                                        <th>Date of Presentation</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(presentation, index) in presentations">
                                                        <td>{{presentation.name}}</td>
                                                        <td>{{presentation.date}}</td>


                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                </div>


                    </div>
                    <br>
                    <script>
function openRating(id) {

    alert(id);
}

    var app = new Vue({

        el: '#displaypresentations',
        data: {
            presentations: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_presentations_for_show_rating.php')
                .then(response => {
                    vm.presentations = response.data;
                    console.log(vm.presentations);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>

<script>
    var app = new Vue({

        el: '#displaycriterias',
        data: {
            criterias: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_criterias_for_show_ratings.php')
                .then(response => {
                    vm.criterias = response.data;
                    console.log(vm.criterias);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>

<script>
    var app = new Vue({

        el: '#displayratings',
        data: {
            ratings: []
        },
        mounted() {
            let vm = this;
            axios
                .get('get_ratings_for_show_ratings.php')
                .then(response => {
                    vm.ratings = response.data;
                    console.log(vm.ratings);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>
  </body>
  
  </html>

