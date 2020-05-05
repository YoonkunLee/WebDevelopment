<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Using file functions</title>
    </head>
    <body>
        <h1 style="margin-bottom: 10px;">Web Development - Lab05</h1>
        <h4 style="margin-bottom: 50px;">Task1: Retrieve and display records form the table</h4>
        <?php
            require_once ("../../../conf/settings.php");

            //connecting to database
            $connection = @mysqli_connect(
                $host, 
                $user, 
                $pswd, 
                $dbnm);
            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }

            //get items from database
            $query = "SELECT car_id, make, model, price FROM $table";
            $result= mysqli_query($connection, $query)
                or die("unable to execute");

            //if database return result, return table
            if(isset($result)){
                echo "<table class=\"table table-striped\">";  
                echo "<thead>";                  
                    echo "<tr>\n" 
                        . "<th scope=\"col\">Car Id</th>\n"
                        . "<th scope=\"col\">Make</th>\n\n"
                        . "<th scope=\"col\">Model</th>\n"
                        . "<th scope=\"col\">Price</th>\n"
                    ."</tr>\n";
                echo "</thead>";
                echo "<tbody>";                       
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>",$row["car_id"],"</td>";
                        echo "<td>",$row["make"],"</td>";
                        echo "<td>",$row["model"],"</td>";
                        echo "<td>",$row["price"],"</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";        
                mysqli_free_result($result);                    
            }
        ?>
    </body>
</html>