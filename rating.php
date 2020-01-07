<!DOCTYPE html>
<html lang="en">
<?php
include "head.php";
if (isset($_POST['code']) || (!isset($_SESSION['email'])) || $_SESSION['isteacher'] != 1) {
} else {
    header("location: index.php");
}
?>
<div id="dom-target" style="display: none;">
    <?php
    $output = $_POST['code'];
    echo htmlspecialchars($output);
    ?>
</div>



<!---chris code:-->
<section style="margin-top: 10rem; margin-bottom: 5rem">
    <div class="container h-100 d-flex justify-content-center align-items-center text-center">
        <div class="card bg-secondary" style="width: 80rem;">
            <div class="card-body">
                <h2 class="card-title">Give your Rating</h2>
                <h5 class="header center-align" style="margin-bottom: 50px;">(0 is worst and 10 is best)</h5>

                <div class="container">
                    <form action="###" method="post">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-sm-12 col-md-4">
                                <h5 class="header">Group-Rating </h5>
                            </div>

                        </div>
                        <hr>
                        <header style="margin-bottom: 15px;"><br>

                        </header>
                        <!---chris code ende-->


                        <div class="table-responsive-sm">
                            <div id="display_criteria">
                                <div id="rated_criteria">
                                    <table class="table table-striped table-dark table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Rate criteria</th>
                                                <th>value</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr v-for="criteria in criterias">
                                                <td>{{criteria.name}}</td>
                                                <td><input type="range" :name="criteria.criteria_ID" :id="criteria.criteria_ID" min="0" max="10" /></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>


                        <!---chris code:-->
                        <button  onclick="add_sliders_to_array()">Submit Rating</button>



                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!---chris code ende-->
<script>
    //get criteria
    var app = new Vue({

        el: '#display_criteria',
        data: {
            criterias: []
        },
        mounted() {
            var div = document.getElementById("dom-target");
            var codel = div.textContent;
            var out = String(codel).trim();
            console.log("ausgabe vom Vue vom rating.php");
            console.log(out);
            let vm = this;

            $.post("get_criterias.php", {
                    code: out
                },
                function(data) {
                    vm.criterias = JSON.parse(data);

                    console.log(vm.criterias);
                });





        }
    })
 

    function add_sliders_to_array() {
        var form = document.getElementById("rated_criteria");
        inputs = form.getElementsByTagName("input");
        var arr = new Array();

        for (var i = 0, max = inputs.length; i < max; i += 1) {
            arr[inputs[i].id] = inputs[i].value ;
            //arr[inputs[i].id] = inputs[i].value;
          //  alert(arr[inputs[i].id]);
        }

        $.post("rating_check.php", {
            criteria: arr
            },

            function(data) {
                alert(data);

            }

        )
    }
</script>


<!---chris code:-->

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


<!---chris code ende-->

</body>

</html>