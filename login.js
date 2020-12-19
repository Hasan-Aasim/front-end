function login(){

    var name1 = document.getElementById("name1").value

    var password1 = document.getElementById("password1").value



    console.log(name1 + ' ' + password1);



    var names = ['ammar','hassan','hiba'];

    var passwords = ['ammar123','asim123','hiba123'];



    var i=0;

    while(i!=name1.length){

        if(name == names[i] && password == passwords[i]){

            console.log('User Logged in : ' + name1)

            console.log('Password Matched For User : ' + password1)

            break;

        }

        else if (name != names[i] && password != passwords[i]){

            i++;

        }

        else{

            

            alert('Unauthorized user');

        }

    }

}