$(document).ready(function(){
    $("#submit").click(function(){
    var email = $("#email").val();
    var oldpwd = $("#oldpassword").val();
    var newpwd = $("#newpassword").val();
    var newpwdverify = $("#newpasswordverify").val();

    if( email =='' || oldpwd =='' || newpwd == '' || newpwdverify == ''){
        $('input[type="text"],input[type="email"]').css("border","2px solid red");
        $('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
        alert("Please fill in all fields!");
    }
    else if(newpwd != newpwdverify) {
        alert("New passwords don't match! ");
    }
    else {
        //name_that_arrives_at_php:name_of_field
        $.post("change_password_check.php",{ email1: email, oldpwd1:oldpwd, newpwd1:newpwd},
        function(data) {
            switch(data) {
                case"no such user":
                    $('input[type="email"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
                    $('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                    break;
                case"email or password wrong":
                $('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
                alert(data);
                case"password successfully changed":
                    $("form")[0].reset();
                    $('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                   // window.location = "ch.php";
                    break;
                
                default:
                    alert(data);
                    alert("fehler");
            }
    });
    }
    });
    });