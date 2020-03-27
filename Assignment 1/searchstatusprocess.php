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
            else{
                echo "Your connection is sucess";                  
            }
            
            $passRule = true;

            $_searchStatus = $_GET['statusInput'];
            $_inputLength = strlen($_searchStatus);           
            if( $_inputLength == 0){
                echo "<p>(Status) Input is required cannnot be empty </p>";
                $passRule = false;
            }

            $query = "SELECT status_content FROM $sql_table WHERE status_content like '$_searchStatus%'";
            $result = mysqli_query($connection, $query);
            
            $numRows = mysqli_num_rows($result);
            if($numRows){
                echo "<p>(Status Code) Your Input Code is founded. It is not a unique code!</p>";
                $passRule = FALSE;
            }

            if(!$result){
                echo "There is an error while conecting database ".$query;
            }
            else{
                echo "<table border=w=\"1\">";

                mysqli_free_result($result);
            }

            
            if($passRule){
                echo "Thanks";
            }
            else{
                echo "<p>Please Try Again!</p>";
                echo '<a href="./searchstatusform.html">Search for another status</a>';
                echo '<div align="right"><a href="./index.html">Return to Home Page</a><div>';
            }

            mysqli_close($connection);
        ?>
    </body>
</html>