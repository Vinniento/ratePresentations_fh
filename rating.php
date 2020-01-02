<!DOCTYPE html>
<html lang="en">
<?php

include "head.php";
if (isset($_POST['code'])) {
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
<script>
    /*
    function strcut()
    {

    }
    var div = document.getElementById("dom-target");
    var code = div.textContent;
    var out = String(code).trim();
    var testout ="sting anfang hier -->";
    testout.concat(code,"<-- string ende");
    alert(out);
   $.post("get_criterias.php",{ code: out},
        function(data) {            
                    alert(data);  // data = kriterien zum zuggriffscode (als json)
                    // code zu dynamischen formular hier
            
          
        });*/
</script>


<div class="table-responsive-sm">
    <div id="display_criteria">
        <div id="selected_criteria">
            <!--<table class="table table-striped table-dark table-hover" class="display: inline-block">-->
            <table class="table table-striped table-dark table-hover">

                <thead class="thead-dark">
                    <tr>
                        <th>Rate criteria</th>
                        
                    </tr>
                </thead>
              <!---  <tbody>
                    <tr v-for="criteria in criterias">
                        <td><input type="radio" name="criteria" :id="criteria.criteria_ID"></td>
                        <td>{{criteria.name}}</td>

                    </tr>
                </tbody>-->
                <tbody>
                    <tr v-for="(criteria, index) in criterias">
                        <td>{{criteria.name}}</td>
                        


                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>
    //get criteria
    var app = new Vue({

        el: '#display_criteria',
        data: {
            forms: []
        },
        mounted() {
            var div = document.getElementById("dom-target");
            var out = String(code).trim();

            let vm = this;
            axios
                .get("get_criterias.php", {
                    params: {
                        code: out
                    }
                })
                .then(response => {
                    vm.criterias = response.data;
                    console.log(criterias);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    })
</script>