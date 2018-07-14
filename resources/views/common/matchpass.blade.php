<script>
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("password_confirm");
        
    function validatePassword(){
        if(password.value != confirm_password.value) {
            password.classList.add("invalid");
            confirm_password.classList.add("invalid");
            $('#password_match').html("Password don't match");
        } else {
            password.classList.remove("invalid");
            confirm_password.classList.remove("invalid");
            $('#password_match').html('');
        }
    } 
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>