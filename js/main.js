$(document).ready(function(){

    //For Sign Up

    $('#sign_up').click(function(event){
        event.preventDefault();
        var name = $("#Name").val();
        var email = $("#Email").val();
        var password = $("#Password").val();
        var phone = $("#Phone").val();
        var t = 0;
        if(name.length == ""){
            $(".name").addClass("is-invalid");
        }
        else{
            $(".name").removeClass("is-invalid");
            t += 1;
        }
        if(email.length== ""){
            $(".email").addClass("is-invalid");
        }
        else{
            $(".email").removeClass("is-invalid");
            t += 1;
        }
        if(password.length== ""){
            $(".password").addClass("is-invalid");
        }
        else{
            $(".password").removeClass("is-invalid");
            t += 1;
        }
        if(phone.length== ""){
            $(".phone").addClass("is-invalid");
        }
        else{
            $(".phone").removeClass("is-invalid");
            t += 1;
        }
        if(t==4){
            $.ajax({
                type: "POST",
                url: "signup.php",
                data: {"name":name, "email":email, "password":password, "phone":phone},
                dataType: 'JSON',
                success : function(callback){
                    if(callback.status == "error"){
                        $(".email").addClass("is-invalid");
                        $(".emailError").html(callback.message);
                    }else if(callback.status == "success"){
                        window.location = "home.php";
                    }
                }
            })
        }
    })

    //Sign In
    $('#sign_in').click(function(event){
        event.preventDefault();
        var email = $("#Email").val();
        var password = $("#Password").val();
        var t = 0; 
        if(email.length== ""){
            $(".email").addClass("is-invalid");
        }
        else{
            $(".email").removeClass("is-invalid");
            t += 1;
        }
        if(password.length== ""){
            $(".password").addClass("is-invalid");
        }
        else{
            $(".password").removeClass("is-invalid");
            t += 1;
        }
        if(t==2){
            $.ajax({
                type : 'POST',
                url  : 'signin.php',
                data : {'email': email, 'password': password},
                dataType : 'JSON',
                success : function(callback){
                    if(callback.status === "success"){
                        window.location = "home.php";
                    } else if(callback.status === "passwordError"){
                        $(".password").addClass("is-invalid");
                        $(".passwordError").html(callback.message);
                        $(".email").removeClass("is-invalid");
                        $(".emailError").html("");
                    } else if(callback.status === "emailError"){
                        $(".password").removeClass("is-invalid");
                        $(".passwordError").html("");
                        $(".email").addClass("is-invalid");
                        $(".emailError").html(callback.message);
                    }
                }
            })
        }

    })

})