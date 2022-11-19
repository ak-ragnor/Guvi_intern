var email=localStorage.getItem("email");

if(localStorage.getItem("logged") === null){
    // header('Location: login.html');
    location.href = 'login.html';
    exit();
   } 

   $.ajax({
    type: "POST",
    data: $(this).serialize(),
    url:'/authentication/php/profile.php',
    success: function (response) {
        var jsonData = JSON.parse(response);
        document.getElementById("demo").innerHTML = jsonData.name +"<br>" + jsonData.gender +"<br>" + jsonData.number ;

    }})