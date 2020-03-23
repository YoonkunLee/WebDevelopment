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
        ?>
    </body>
</html>