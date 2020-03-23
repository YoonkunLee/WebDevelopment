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
            echo "Your connection is sucess";

            $sqlString = "CREATE TABLE IF NOT EXISTS post (
                    status_code VARCHAR(5) NOT NULL,
                    status_content VARCHAR(255) NOT NULL,
                    share VARCHAR(20),
                    input_date DATE NOT NULL,
                    permission VARCHAR(200))";
            $queryResult = @mysqli_query($connection, $sqlString) or
                die("Unable to execute the query." . mysqli_error($connection));
            echo "Successfully executed the query.";
        ?>
    </body>
</html>