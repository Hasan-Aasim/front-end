<!DOCTYPE html>
<html>
<body>
<?php
    function DATAFETCH(){
$servername = "localhost";
$username = "username";
$password = "";

// Create connection
$conn = mysqli_connect("localhost","root","","users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


    
        $query_fetch_data = "Select * From users";

        $result = mysqli_query($conn,$query_fetch_data);

        if(!$result){
            die('Query Failed'.mysqli_error());

        }   
        $get_data = array();
        while($row = mysqli_fetch_assoc($result)){

            $get_data[] =  array(
                'id' => $row["id"],
                'username' => $row["username"],
                'password' => $row["password"],
                'phone' => $row["phone"],    
            );
            
        }
        return json_encode($get_data);
    }
    
        function FETCH_ROUTES(){
$servername = "localhost";
$username = "username";
$password = "";

// Create connection
$conn = mysqli_connect("localhost","root","","users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


    
        $query_fetch_data = "Select * From routes";

        $result = mysqli_query($conn,$query_fetch_data);

        if(!$result){
            die('Query Failed'.mysqli_error());

        }   
        $get_data = array();
        while($row = mysqli_fetch_assoc($result)){

            $get_data[] =  array(
                'id' => $row["id"],
                'routeFrom' => $row["routeFrom"],
               
            );
            
        }
        return json_encode($get_data);
    }
    
    echo"<pre>";
    print_r(FETCH_ROUTES());
    echo"</pre>";
?>
<?php
$book = array(
    "title" => "JavaScript: The Definitive Guide",
    "author" => "David Flanagan",
    "edition" => 6
);
?>
<script type="text/javascript">
var userData = <?php echo (DATAFETCH())?>;

var routesData = <?php echo (FETCH_ROUTES())?>;
console.log(userData);
console.log(routesData);    
    
    userData.forEach(myFunction);

function myFunction(item, index) {
    console.log(item.id)
    console.log(item.username)
    console.log(item.password)
    console.log(item.phone)
}
    
    
</script>
</body>
</html>
