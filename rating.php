<!DOCTYPE html>
<html lang="en">
<?php

include "head.php";
if(isset($_POST['code'])){

}else{
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
            
          
        });










</script>