<html>
    <head>
        <title>search status process</title>
    </head>
    <body>
        <?php
            require_once('../../conf/sqlinfo.inc.php');
            $connection = @mysqli_connect(
                $sql_host, 
                $sql_user, 
                $sql_pass, 
                $sql_db);
            if(!$connection){
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Your connection is sucess <br>";

            $sqlString = "CREATE TABLE IF NOT EXISTS post (
                    status_code VARCHAR(5) NOT NULL,
                    status_content VARCHAR(255) NOT NULL,
                    share VARCHAR(20),
                    input_date VARCHAR(20) NOT NULL,
                    permission VARCHAR(200))";
            $queryResult = @mysqli_query($connection, $sqlString) or
                die("Unable to execute the query." . mysqli_error($connection));
            echo "Successfully executed the query. <br>";
            
            $passRegulerExpression = 0;
            if (isset ($_POST["statusCode"])){
                $_statusCode = $_POST["statusCode"];
                $_statusCodeLength = strlen($_statusCode);
                $_firstCharacter = substr($_statusCode, 0, 1);
                $_restCharacter = substr($_statusCode, 1, $_statusCodeLength);
               
                if($_statusCodeLength != 5 || $_statusCodeLength == 0){
                    echo "<p>(Status Code) Input must be within 5 characters or cannot be empty</p>";                
                    $passRegulerExpression = 1;
                }                
                else{
                    if(strcmp($_firstCharacter, 'S')){
                        echo "<p>(Status Code) First Character must start with uppercase S!</p>";
                        $passRegulerExpression = 1;
                    }
                    else{
                        if(ctype_digit($_restCharacter) != 1){
                            echo "<p>(Status Code) Second Chacter to last chater must be a number!</p>";
                            $passRegulerExpression = 1;
                        }
                    }
                }                        
            }
            else{
                echo "<p>(Status Code) Input is Needed cannot be empty!</p>";
                $passRegulerExpression = 1;
            }

            if(isset($_POST["status"])){                
                $_staus = $_POST["status"];
                $_stausLength = strlen($_staus);
                $pattern = '/^[a-zA-z ,.!?]+$/';
                if($_stausLength == 0){
                    echo "<p>(Status) Input is required cannnot be empty</p>";
                    $passRegulerExpression = 1;                    
                }
                else{
                    if(!preg_match($pattern, $_staus)){
                        echo "<p>(Staus) Input has an error.</p>";
                        $passRegulerExpression = 1;
                    }
                }                                
            }

            if(isset($_POST["date"])){
                $_date = $_POST["date"];

                if($_date == null){
                    echo "<p>(Date) Input is required cannot be emoty!</p>";
                    $passRegulerExpression = 1;
                }
            }

            $_share =$_POST["share"];

            $permissionList = array();            
            foreach($_POST["permissiontype"] as $check){                
                array_push($permissionList, $check);
            } 
            $_permissiontypeList= implode(",", $permissionList);
            echo $permissiontypeList;

            if($passRegulerExpression == 1){
                echo 'Please try again!<br><a href="./poststatusform.php">Return to Status Form Page</a>';
            }
            if($passRegulerExpression==0){
                echo $_statusCode;
                echo $_staus;
                echo $_share;
                echo $_date;
                echo $_permissiontypeList;

                
                $sql = "INSERT INTO post (status_code, status_content, share, input_date, permission)
                VALUES('$_statusCode', '$_staus', '$_share', '$_date', '$_permissiontypeList')";
                if(mysqli_query($connection, $sql)){
                     echo '<p>Records add Successfully!!</p><a href="./index.html">Return to Home Page</a>';
                    }
                else{
                    echo "Error" . $sql . "<br>" .mysqli_error($connection);
                }
            }
        ?>
    </body>
</html>