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
<template id="display_criteria">
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
                                    <h5 class="header">Group-Rating</h5>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <h5 class="header"> {{pres_name}}</h5>
                                </div>

                            </div>
                            <hr>

                            <div>
                                <div id="rated_criteria">
                                    <ul class="contents" v-for="criteria in criterias">

                                        <div class="row" style="margin-bottom: 15px;" v-if="criteria.isfeedback === '0'">
                                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">{{criteria.name}}
                                            </div>
                                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><input type="range" class="custom-range" :name="criteria.criteria_ID" :id="criteria.criteria_ID" min="0" value="5" max="10" step="1" v-model="radius"><input type="number" min="0" value="5" max="10" step="1" id="range" class="topcoat-text-input" v-model="radius"></div>
                                            
                                        </div>
                                        <div class="row" style="margin-bottom: 15px;" v-else>
                                            <div class="col-sm-12 col-md-4" style="margin-bottom: 15px;">{{criteria.name}}
                                            </div>
                                            <div class="col-sm-12 col-md-6" style="margin-bottom: 15px;"><textarea class="form-control" :name="criteria.criteria_ID" :id="criteria.criteria_ID" rows="3"></textarea></div>

                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <button onclick="add_sliders_to_array()">Submit Rating</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    //get criteria

    var app = new Vue({

        el: '#display_criteria',
        data: {
            criterias: [],
            pres_name: '',
            radius:5
        },
        mounted() {
            var div = document.getElementById("dom-target");
            var codel = div.textContent;
            var out = String(codel).trim();
            console.log(out);
            let vm = this;

            $.post("get_criterias.php", {
                        code: out
                    },
                    function(data) {
                        vm.criterias = JSON.parse(data);

                        console.log(vm.criterias);
                    }),
                $.post("get_presentationname.php", {
                        code: out
                    },
                    function(data) {
                        vm.pres_name = data;
                        console.log(vm.pres_name);
                    });





        }
    })


    function add_sliders_to_array() {
        var form = document.getElementById("rated_criteria");
        inputs = form.getElementsByTagName("input");
        var arr = new Object();
        var arr2 = new Object();

        for (var i = 0, max = inputs.length; i < max; i += 1) {
            arr[inputs[i].id] = inputs[i].value;
            //arr[inputs[i].id] = inputs[i].value;
            //  alert(arr[inputs[i].id]);
        }
        inputs = form.getElementsByTagName("textarea");
        for (var i = 0, max = inputs.length; i < max; i += 1) {
            arr2[inputs[i].id] = inputs[i].value;
            //arr[inputs[i].id] = inputs[i].value;
            //  alert(arr[inputs[i].id]);
        }

        $.post("rating_check.php", {
                criteria: arr,
                text: arr2
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