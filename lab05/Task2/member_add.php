<html>
    <head>
        <title>Member Search Page</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    </head>
    <body>
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

            //create a vipmember table in database if not exist
            $sqlString = "CREATE TABLE IF NOT EXISTS vipmember (
                member_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                fname VARCHAR(40) NOT NULL,
                lname VARCHAR(40) NOT NULL,
                gender VARCHAR(1) NOT NULL,
                email VARCHAR(40) NOT NULL,
                phone VARCHAR(20))";
            $queryResult = @mysqli_query($connection, $sqlString) or
                die("Unable to execute the query." . mysqli_error($connection));    
                
            /*if POST form member_add_form.php is set, save into database and return success message, 
            if not it returns error message*/ 
            if (isset ($_POST)){
                $fname = $_POST["fname"];
                $lame = $_POST["lname"];
                $gender = $_POST["gender"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];

                $sql = "INSERT INTO vipmember (fname, lname, gender, email, phone)
                VALUES('$fname', '$lame', '$gender', '$email', '$phone')";  
                
                if(mysqli_query($connection, $sql)){
                    echo '<h2>Your record added successfully!!</h2>';                        
                    echo '<div><a href="./vip_member.php">Return to Home Page</a><div></div>';
                    }
                else{
                    echo "Error" . $sql . "<br>" .mysqli_error($connection);
                }
            }     
        ?>
    </body>
</html>

