function register()
{
    var name = document.getElementById("name").value
    var password = document.getElementById("password").value
    var phone=document.getElementById("dob").value
    var NU=document.getElementById("NU").value

    console.log(name + ' ' + password + ' ' + phone + ' ' + NU) ;

    link = 'http://localhost/APIS/SignUp.php?username='+name+'&password='+password+'&phone='+phone+'&email='+NU;
    $.get(link,function(data){
        console.log(data.server_response);
    });
}