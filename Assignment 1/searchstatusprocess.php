<html>
    <head>
        <title>search status process</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	    <link href="style/style.css" rel="stylesheet" type="text/css">      
    </head>
    <body>
        <?php

            /*Read connection detail from sqlinfo.inc.php and connect to database 
            if there is an error while connecting, it returns proper error message*/
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
            
            //Create bool varialble for validation check     
            $passRule = TRUE;
            //Create string for return error message
            $errorMessage = "";    

            $_searchStatus = $_GET['statusInput'];
            $_inputLength = strlen($_searchStatus);   

            //Validation check for statusInput
            if( $_inputLength == 0){
                $errorMessage = $errorMessage . "<p>(Status) Input is required cannnot be empty </p>";
                $passRule = false;
            }
            else{                
                //Search user input from the database.
                $query = "SELECT * FROM $sql_table WHERE status_content like '%$_searchStatus%'";
                $result = mysqli_query($connection, $query);
                
                //Validation check for result 
                if(!$result){
                    $errorMessage = $errorMessage . "There is an error while conecting database ".$query;
                    $passRule = false;
                }
                else{
                    $numRows = mysqli_num_rows($result);
                    if($numRows == 0){
                        $errorMessage = $errorMessage . "<p>No Result Found Please Try again!</p>";
                        $passRule = false;
                    }            
                }
            }           

            /**
             * if rule is passed, it returns search result with table 
             * if rule is failed, it returns error message with image and contain 2 links that user can either go back to post form page or index page
            */
            if($passRule){
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
            else{
                echo '<h2 class="text-danger text-center font-weight-bold mt-5">Something went Wrong! Please try again!</h2></div><br>';
                echo '<div class="text-center"><img src="images/fail.jpg" />';
                echo '<div class="text-danger font-weight-bold mt-4 mb-4">'.$errorMessage.'</div></div>';
            }                         
 
                        
            echo '<div class="mb-5"><a class="btn btn-primary" href="./searchstatusform.html">Search for another status</a>';
            echo '<div class="returnToHome"><a class= "btn btn-outline-info" href="./index.html">Return to Home Page</a><div></div>';            

            mysqli_close($connection);
        ?>
    </body>
</html>