console.log("started");
var email=$("#emailid").val();
 var pass=$("#password").val();

 if(localStorage.getItem("logged") != null && localStorage.getItem("logged") != null){
  // header('Location: profile.html');
  location.href = 'profile.html';
  exit();
 } 

$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/authentication/php/login.php',
            data: $(this).serialize(),
            // {
            // do_register:"do_register",
            // email:email,
            // password:pass,
            // name:name,
            // gender:gender,
            // number:number},
            success: function(response)
            {   
                var jsonData = JSON.parse(response);
                console.log(jsonData.success);
                
  
            if (jsonData.success == "success")
                {
                  localStorage.setItem("email", jsonData.email);
                  localStorage.setItem("logged", "yes");
                    location.href = "profile.html";
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
