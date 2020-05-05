<html>
    <head>
        <title>Member Add Form</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    </head>
    <body>
        <h1>Member To Add</h1>
        <form action ="member_add.php" method = "POST" >
            <label for="fname">First Name : </label></br>
            <input type="text" id="fname" name="fname" placeholder="Enter First Name"></br>
            <label for="lname">Last Name : </label></br>
            <input type="text" id="lname" name="lname" placeholder="Enter Last Name"></br>
            <label for="gender">Gender : </label></br>
            <input type="text" id="gender" name="gender" placeholder="Enter Gender"></br>
            <label for="email">Email : </label></br>
            <input type="text" id="email" name="email" placeholder="Enter Email Address"></br>
            <label for="phone">Phone : </label></br>
            <input type="text" id="phone" name="phone" placeholder="Enter Contact Number"></br></br>

            <button type="submit">Submit</button>
        </form>
    </body>
</html>