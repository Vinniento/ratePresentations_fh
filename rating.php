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
    var div = document.getElementById("dom-target");
    var code = div.textContent;
    alert(code);
   $.post("get_criterias.php",{ code: code},
        function(data) {            
                    alert(data);
            
          
        });










</script>