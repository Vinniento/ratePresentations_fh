$(document).ready(function(){
    $("#submit").click(function(){
    var email = $("#email").val();
    var pwd = $("#password").val();
    
    if( email =='' || pwd ==''){
        $('input[type="text"],input[type="email"]').css("border","2px solid red");
        $('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
        alert("Please fill in all fields!");
    }
    else {
        //name_that_arrives_at_php:name_of_field
        $.post("login_check.php",{ email1: email, pwd1:pwd},
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
                case"teacher login successful":
                    $("form")[0].reset();
                    $('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                    window.location = "teacher.html";
                    break;
                case"student login successful":
                    $("form")[0].reset();
                    $('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
                    alert(data);
                    window.location = "student.html";
                    break;
                default:
                    alert(data);
                    alert("fehler");
            }
    });
    }
    });
    });