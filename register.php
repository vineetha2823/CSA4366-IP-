<?php
include 'connection.php';
?>
<!DOCTYPE html>
<head>
<title>
registration</title>
<style>
    body {
        font-family: Arial, Sans-serif;
        background-color: grey;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .registercontainer {
        max-width: 400px;
        margin: 100px auto;
        padding: 20px;
        background-color: white; /* Add semicolon here */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
form
{
width:300px;
margin-left:20px;
}
form label
{
display:flex;
margin-top:10px;
font-size:18px;
}

    input[type="submit"] {
        width: 200px;
        height: 35px;
        margin-top: 20px;
        border: none;
        background-color: #ff7200;
        color: white;
        font-size: 18px;
        cursor: pointer;
    }
</style>
</head>
<center>
<body>
<form action="" method="POST">
<div class="registercontainer">
<h1>Register form</h1>
<label>Firstname:</label>
<input type="text" name="firstname" placeholder="firstname"><br><br>
<label>lastname:</label>
<input type="text" name="lastname" placeholder="lastname"><br><br>
<label>gender</label>
<input type="text" name="gender" placeholder="gender"><br><br>
<label>contact number:</label>
<input type="tel" name="cnum" placeholder="cnum"><br><br>
<label>email:</label>
<input type="email" name="email" placeholder="email"><br><br>
<label>password:</label>
<input type="text" name="password" placeholder="password"><br><br>
<label>confirm password:</label>
<input type="text" name="cpassword" placeholder="cpassword"><br><br>
<input type="submit" name="save_btn" value="register"><br><br>
</div>
</form>
<?php
$data = false;
if(isset($_POST['save_btn']))
{
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$gender=$_POST['gender'];
$cnum=$_POST['cnum'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if ($password === $cpassword) {
            $query = "INSERT INTO guest(firstname,lastname,gender,cnum,email,password,cpassword) VALUES('$firstname','$lastname','$gender','$cnum','$email','$password','$cpassword')";
            $data = mysqli_query($con, $query);

            ?>
            <script type="text/javascript">
                alert("Correct password")
            </script>
            <?php
        } else {
            ?>
            <script type="text/javascript">
                alert("Passwords do not match")
            </script>
            <?php
        }
    }

    if ($data) {
    ?>
        <script type="text/javascript">
            alert("Data Saved Successfully")
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("Please try again later")
        </script>
    <?php
    }
    ?>

<p>already have an account? <a href="login.php">Login Here</a></p>
</body>
</center>
</html>
