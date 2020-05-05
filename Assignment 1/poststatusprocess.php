<html>
    <head>
        <title>search status process</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
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
                $sql_db);
            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }

            //Creating Database named 'post' only if it is not in the database.
            $sqlString = "CREATE TABLE IF NOT EXISTS post (
                    status_code VARCHAR(5) NOT NULL,
                    status_content VARCHAR(255) NOT NULL,
                    share VARCHAR(20),
                    input_date VARCHAR(20) NOT NULL,
                    permission VARCHAR(200))";
            $queryResult = @mysqli_query($connection, $sqlString) or
                die("Unable to execute the query." . mysqli_error($connection));
            
            //Create bool varialble for validation check     
            $passRule = TRUE;
            //Create string for return error message
            $errorMessage = "";    

            //Validation check for status code
            if (isset ($_POST["statusCode"])){
                $_statusCode = $_POST["statusCode"];
                $query = "SELECT status_code FROM $sql_table WHERE status_code ='$_statusCode'";
                $result=mysqli_query($connection, $query)
                    or die("unable to execute");
                
                $numRows = mysqli_num_rows($result);               
                $_statusCodeLength = strlen($_statusCode);
                $_firstCharacter = substr($_statusCode, 0, 1);
                $_restCharacter = substr($_statusCode, 1, $_statusCodeLength);
               
                //Check status code is unique
                if($numRows){
                    $errorMessage = $errorMessage . '<p>(Status Code) Your Input Code is founded. It is not a unique code!</p>';
                    $passRule = FALSE;
                }
                //Check status code is 5 characters
                if($_statusCodeLength != 5 || $_statusCodeLength == 0){
                    $errorMessage = $errorMessage .  "<p>(Status Code) Input must be within 5 characters or cannot be empty!</p>";                
                    $passRule = FALSE;
                }                
                else{
                    //Check first status code is starts with uppercase 'S'
                    if(strcmp($_firstCharacter, 'S')){
                        $errorMessage = $errorMessage .  "<p>(Status Code) First Character must start with uppercase S!</p>";
                        $passRule = FALSE;
                    }
                    else{
                        //Check rest of status code's character is a number
                        if(ctype_digit($_restCharacter) != 1){
                            $errorMessage = $errorMessage .  "<p>(Status Code) Second Chacter to last chater must be a number!</p>";
                            $passRule = FALSE;
                        }
                    }
                }                        
            }
            else{
                $errorMessage = $errorMessage .  "<p>(Status Code) Input is Needed cannot be empty!</p>";
                $passRule = FALSE;
            }

            //Validation check for status 
            if(isset($_POST["status"])){                
                $_staus = $_POST["status"];
                $_stausLength = strlen($_staus);
                $pattern = '/^[a-zA-z ,.!?]+$/';

                //Check status input is null 
                if($_stausLength == 0){
                    $errorMessage = $errorMessage .  "<p>(Status) Input is required cannnot be empty!</p>";
                    $passRule = FALSE;                    
                }
                else{
                    //Using pattern, check status input contains a number 
                    if(!preg_match($pattern, $_staus)){
                        $errorMessage = $errorMessage .  "<p>(Staus) Input has an error!</p>";
                        $passRule = FALSE;
                    }
                }                                
            }

            //Validation check for date
            if(isset($_POST["date"])){
                $_date = $_POST["date"];

                if($_date == null){
                    $errorMessage = $errorMessage .  "<p>(Date) Input is required cannot be empty!</p>";
                    $passRule = FALSE;
                }
            }

            $_share =$_POST["share"];
            $permissionList = array();            
            foreach($_POST["permissiontype"] as $check){                
                array_push($permissionList, $check);
            } 
            $_permissiontypeList= implode(", ", $permissionList);
           
            /**
             * if rule is passed, user input is saved into database and returns proper message with image and also has link that go back to index page
             * if rule is failed, it returns error message with image and contain 2 links that user can either go back to post form page or index page
            */
            if($passRule){
                $sql = "INSERT INTO post (status_code, status_content, share, input_date, permission)
                VALUES('$_statusCode', '$_staus', '$_share', '$_date', '$_permissiontypeList')";
                if(mysqli_query($connection, $sql)){
                    echo '<h2 class="text-primary text-center font-weight-bold mt-5 mb-4">Your record added successfully!!</h2>';
                    echo '<div class="text-center mb-4"><img src="images/success.jpg" /></div>';
                    echo '<div class="returnToHome"><a class= "btn btn-outline-info" href="./index.html">Return to Home Page</a><div></div>';
                    }
                else{
                    echo "Error" . $sql . "<br>" .mysqli_error($connection);
                }
                
            }
            else{
                echo '<h2 class="text-danger text-center font-weight-bold mt-5">Something went Wrong! Please try again!</h2></div><br>';
                echo '<div class="text-center"><img src="images/fail.jpg" />';
                echo '<div class="text-danger font-weight-bold mt-4 mb-4">'.$errorMessage.'</div></div>';
                echo '<div><a class="btn btn-primary" href="./poststatusform.php">Register for another post</a>';
                echo '<div class="returnToHome"><a class= "btn btn-outline-info" href="./index.html">Return to Home Page</a><div></div>';
            }

            mysqli_free_result($result);
            mysqli_close($connection);
        ?>
    </body>
</html>