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
<!--
<script>
    var div = document.getElementById("dom-target");
    var code = div.textContent;
    var out = String(code).trim();
    var testout ="sting anfang hier --";
    testout.concat(code,"<-- string ende");
    alert(out);
   $.post("get_criterias.php",{ code: out},
        function(data) {            
                    alert(data);  // data = kriterien zum zuggriffscode (als json)
                    // code zu dynamischen formular hier
            
          
        });
</script>-->


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
                                <div id="selected_criteria">
                                    <table class="table table-striped table-dark table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Rate criteria</th>
                                                <th>value</th>
                                            </tr>
                                        </thead>
        
                                        <tbody>
                                            
                                            <tr v-for="(criteria, index) in criterias">  
                                                <td>{{criteria.name}}</td>
                                                <td><input type="range" name="conclusion" :id="criteria.criteria_ID" min="0" max="10" /></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>


                        <!---chris code:-->
                        <button class="btn btn-success badge-pill">Submit Rating</button>
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
            axios
                .post("get_criterias.php", {
                    params: {
                        code: out
                    }
                })
                .then(response => {
                
                    vm.criterias = response.data;
                    console.log(vm.criterias);
                })
                .catch(error => {
                    console.log(error);
                });
              /*  $.post("get_criterias.php",{ code: out},
                function(data) {     
                    vm.criterias = data;       
                    console.log(vm.criterias); 
        });*/





        }
    })
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