<html>
    <head>
        <title>Member Search Page</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <form action="member_search.php" method="GET">
            <div class="form-group">
                <label>Search Last Name: <input type="text" name="memberSearch" placeholder="Enter Member's Last Name"></input></label>
                <input type="submit" value="Submit"></input>      
            </div>    
        </form>
        <?php
            require_once ("../../../conf/vipList.php");
            //connect to database
            $connection = @mysqli_connect(
                $host, 
                $user, 
                $pswd, 
                $dbnm);
            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }

            /*if 'memberSearch' which is in GET method, is set then find related items from 
            database cloumn 'lname' and return result with table.*/ 
            if(isset($_GET['memberSearch'])){         
                $searchInput = $_GET['memberSearch'];       
                $query = "SELECT member_id, fname, lname, email FROM $table WHERE lname like '$searchInput%'";
                
                $result= mysqli_query($connection, $query)
                    or die("unable to execute");
    
                echo "<table class=\"table table-striped\">";  
                echo "<thead>";                  
                    echo "<tr>\n" 
                        . "<th scope=\"col\">Member Id</th>\n"
                        . "<th scope=\"col\">First Name</th>\n\n"
                        . "<th scope=\"col\">Last Name</th>\n"
                        . "<th scope=\"col\">Email</th>\n"
                    ."</tr>\n";
                echo "</thead>";
                echo "<tbody>";                       
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>",$row["member_id"],"</td>";
                        echo "<td>",$row["fname"],"</td>";
                        echo "<td>",$row["lname"],"</td>";
                        echo "<td>",$row["email"],"</td>";
                        echo "</tr>";
                    }
                echo "</tbody>";
                echo "</table>";     
            }           
        ?>
    </body>
</html>