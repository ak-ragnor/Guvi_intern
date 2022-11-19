 console.log("started");
var email=$("#emailid").val();
 var pass=$("#password").val();
 var name=$("#name").val();
 var gender=$("#gender").val();
 var number=$("#number").val();
 
 if(localStorage.getItem("logged") != null && localStorage.getItem("logged") != null){
    // header('Location: profile.html');
    location.href = 'profile.html';
    exit();
   } 

$(document).ready(function() {
    $('#registerform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/authentication/php/register.php',
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
                    location.href = "login.html";
                }
                else
                {
                    alert('Invalid Credentials!');
                }
           }
       });
     });
});
