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

    //Update Profile
    $('#update_profile').click(function(){
        var dob = $('#Dob').val();
        var profession = $('#Profession').val();
        var user_id = $("#User_id").val();
        var t = 0; 
        if(dob.length== ""){
            $(".dob").addClass("is-invalid");
        }
        else{
            $(".dob").removeClass("is-invalid");
            t += 1;
        }
        if(profession.length== ""){
            $(".profession").addClass("is-invalid");
        }
        else{
            $(".profession").removeClass("is-invalid");
            t += 1;
        }
        if(t==2){
            $.ajax({
                type : 'POST',
                url  : 'update_profile.php',
                data : {'dob': dob, 'profession': profession, 'user_id': user_id},
                dataType : 'JSON',
                success : function(callback){
                    if(callback.status === "success"){
                        window.location = "index.php";
                    } else if(callback.status === "error"){
                        $(".error").addClass("is-invalid");
                        $(".error").html(callback.message);
                    }
                }
            })
        }
    })
    //edit profile
    $('#edit_profile').click(function(){
        var name = $("#Name").val();
        var email = $("#Email").val();
        var phone = $("#Phone").val();
        var dob = $('#Dob2').val();
        var profession = $('#Profession2').val();
        var user_id = $("#User_id").val();
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
        if(phone.length== ""){
            $(".phone").addClass("is-invalid");
        }
        else{
            $(".phone").removeClass("is-invalid");
            t += 1;
        }
        if(dob.length== ""){
            $(".dob").addClass("is-invalid");
        }
        else{
            $(".dob").removeClass("is-invalid");
            t += 1;
        }
        if(profession.length== ""){
            $(".profession").addClass("is-invalid");
        }
        else{
            $(".profession").removeClass("is-invalid");
            t += 1;
        }
        if(t==5){
            $.ajax({
                type : 'POST',
                url  : 'edit_profile.php',
                data : {'name': name, 'email':email, 'phone': phone, 'dob': dob, 'profession': profession, 'user_id': user_id},
                dataType : 'JSON',
                success : function(callback){
                    if(callback.status === "success"){
                        window.location = "index.php";
                    } else if(callback.status === "error"){
                        $(".error").addClass("is-invalid");
                        $(".error").html(callback.message);
                    }
                }
            })
        }
    })

})