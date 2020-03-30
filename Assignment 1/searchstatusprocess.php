<html>
    <head>
        <title>search status process</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            require_once('../../conf/sqlinfo.inc.php');
            $connection = @mysqli_connect(
                $sql_host, 
                $sql_user, 
                $sql_pass, 
                $sql_db
            );

            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }
            
            $passRule = true;

            $_searchStatus = $_GET['statusInput'];
            $_inputLength = strlen($_searchStatus);           
            if( $_inputLength == 0){
                echo "<p>(Status) Input is required cannnot be empty </p>";
                $passRule = false;
            }

            $query = "SELECT * FROM $sql_table WHERE status_content like '$_searchStatus%'";
            $result = mysqli_query($connection, $query);

            if(!$result){
                echo "There is an error while conecting database ".$query;
                $passRule = FALSE;
            }
            else{
                $numRows = mysqli_num_rows($result);
                if($numRows == 0){
                    echo "<p>No Result Found Please Try again!</p>";
                }
                else{
                    echo "<h1>Status Information</h1><br>";
                    echo "<table class=\"table table-striped\">";  
                    echo "<thead>";                  
                        echo "<tr>\n" 
                            . "<th scope=\"col\">Status</th>\n"
                            . "<th scope=\"col\">Status Code</th>\n\n"
                            . "<th scope=\"col\">Share</th>\n"
                            . "<th scope=\"col\">Date Posted</th>\n"
                            . "<th scope=\"col\">Permission</th>\n"
                        ."</tr>\n";
                    echo "</thead>";
                    echo "<tbody>";                       
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>",$row["status_content"],"</td>";
                            echo "<td>",$row["status_code"],"</td>";
                            echo "<td>",$row["share"],"</td>";
                            echo "<td>",$row["input_date"],"</td>";
                            echo "<td>",$row["permission"],"</td>";
                            echo "</tr>";
                        }
                    echo "</tbody>";
                    echo "</table>";        
                    mysqli_free_result($result);        
                }               
            }
            
            echo '<a href="./searchstatusform.html">Search for another status</a>';
            echo '<div align="right"><a href="./index.html">Return to Home Page</a><div>';            

            mysqli_close($connection);
        ?>
    </body>
</html>