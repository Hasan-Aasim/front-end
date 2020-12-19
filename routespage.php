<!DOCTYPE html>
<html>
<head> 
        <link rel="stylesheet" href="class/styles.css">
    <title>
    cards
</title>
<meta name="viewport"
content="width=device-width,initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
.vl {
  border-left: 7px solid purple;
  height: 40px;
  margin-left: 10px;
}
* {
    box-sizing: border-box;
  }

body{
    font-family: Arial, Helvetica, sans-serif;
}  
.column {
    float: left;
    width: 30%;
    padding: 0 10px;
    /* height: 20%; */
}  

.row::after {
content: "";
display: table;
clear: both;
}
@media screen and (max-width: 600px)
{
    .column {
        width: 200%;
        display:block;
        margin-bottom: 20px;
    }
    
}
.card{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    padding: 16px;
   /* text-align: center; */
    background-color: #f1f1f1;
}
</style>
</head>
<body>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <!-- <div class="column"> -->
                <table id="data1" class="table">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="renderTable">
                        
                    </tbody>
                </table>
                    
            <!-- </div> -->
        </div>
    </div>
    
    <?php
    
        function FETCH_ROUTES(){
            $servername = "localhost";
            $username = "username";
            $password = "";

            // Create connection
            $conn = mysqli_connect("localhost","root","","carpool");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //echo "Connected successfully";
            
            //Query to fetch data
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

    
    ?>
    <script>
    
        var routesData = <?php echo (FETCH_ROUTES())?>;
        console.log(routesData);
        
        $.each(routesData, function (index, item) {
            renderTable(item.id,item.routeFrom);           
        });
        function renderTable(id,routeFrom){
            var htmlStr = "";
            var html_render_list = new Array();
            htmlStr += "<tr><td><div class='card'>";
            htmlStr += "<p align='left' style='font-size: 12px;margin-left: 35px;'>"
            htmlStr += "<font color='6E6D6D'>From </font> <br> <span style='margin-left: 45px;font-size: 16px;'>"
            htmlStr += routeFrom+"</span></p>"
            htmlStr += "<div class='row'><div class='col-lg-2'><div class='vl'></div></div>"
            htmlStr += "<div class='col-lg-7'></div><div class='col-lg-3'></div></div>"
            htmlStr += "<div class='row'><div class='col-lg-7'>"    
            htmlStr += "<p align='left' style='font-size: 12px;margin-left: 35px;'>" 
            htmlStr += "<font color='6E6D6D'>To </font> <br> <span style='margin-left: 45px;font-size: 16px;'>"
            htmlStr += "Fast NUCES</span></p></div><div class='col-lg-2'></div>" 
            htmlStr += "<div class='col-lg-3'><button type='button' id="+id+" value="+id+" class='btn btn-info showRoutes' style='color='purple';'>Show Route</button></div>" 
            htmlStr += "</div></div></td></tr>"
            html_render_list.push(htmlStr);
             var oHtml = $.parseHTML(htmlStr);

                $(".renderTable").append(oHtml);    
        }
        
        $(document).on('click','.showRoutes',function(){
            console.log($(this).attr('id'));
            // window.location.href = "ShowRoutes.php";
        }); 
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>