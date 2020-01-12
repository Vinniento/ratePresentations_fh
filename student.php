<!DOCTYPE html>
<html lang="en">
<?php

include "head.php";
if($_SESSION['isteacher'] !=0 || (!isset($_SESSION['email']))){
    header("Location: index.php");
}
?>

<header class="masthead">
    <div class="container w-100 h-100 d-flex justify-content-center align-items-center text-center"
        style="width: 60rem;">
        <div class="card bg-secondary" style="width: 70rem;">
            <div class="card-body">
                <br>
                <div class="row justify-content-center">
                    <h3 class="card-title">Student Area</h3>
                </div>
                <br>
                <!------------------------------------- -->

                <button style="width: 13rem;" class="btn btn-success badge-pill" type="button" name="rate_presentation"
                    value="Rate Presentation" onclick="showElement('rate_presentation')">Rate a Presentation</button>
                <br><br>
                <div id="rate_presentation" style="display:none;">
                    <br>

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
                </div>

            </div>
            <!------------------------------------- -->
            <br>
            <div class="row justify-content-center">
                <div id="app">
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
                                    <td><button :id="presentation.presentation_ID" v-on:click="getCriteria($event)">View
                                            Rating</button></td>


                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- ---------------------------------------------------- -->




                    <div v-for="(criteria, index) in ratings">
                        {{index}}
                        <div v-for="(rating, index) in criteria">
                            <p>{{rating["AVG(ratings.rating_int)"]}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <br>





            <!-- --------------------------------------- -->


            <script>
            var app = new Vue({

                el: '#app',
                data: {
                    presentations: [],
                    ratings: []
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
                },
                methods: {

                    getCriteria(event) {
                        var pres_id = event.currentTarget.id;
                        this.ratings = [];
                        axios
                            .get('get_criterias_and_ratings.php', {
                                params: {
                                    id: pres_id
                                }

                            })
                            .then(response => {
                                this.ratings = response.data;
                                console.log(this.ratings);
                            })
                            .catch(error => {
                                console.log(error);
                            })

                    }

                }


            })
            </script>
            <script>
            function showElement(element) {
                document.getElementById(element).style.display = "block";
            }
            </script>

            </body>

</html>