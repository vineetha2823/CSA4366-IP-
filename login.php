<?php include 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<style>
body
{
font-family: Arial, sans-serif;
display:flex;
height:80vh;
bgcolor:grey;
justify-content:center;
align-items:center;
}
.login-container 
{
padding:100px;
border-radius:8px;
width:400px;
margin:100px;
font-size:16px;
bgcolor:#fff;
box-shadow:0 0 10px rgba(0, 0, 0 , 0.1);
}
button
{
width:100%;
padding:10px 15px;
border-radius:4px;
bgcolor:#4caf50;
color:#fff;
font-size:16px;
cursor:pointer;
}
</style>
<body>
<div class="login-cointainer">
<form action="" method="POST">
<h1>LOGIN PAGE</h1>
<label>Username:</label>
<input type="text" name="username" palceholder="username"><br><br>
<label>Password:</label>
<input type="text" name="password" palceholder="password"><br><br>
<input type="submit" name="submit" value="submit"><br><br>
<button><a href="view.php">display</a></button>
</form>
</div>
<?php
$data=false;
if (isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query="INSERT into login(username,password) VALUES('$username','$password')";
$data=mysqli_query($con,$query);
}
if ($data)
{
?>
<script type="text/javascript">
alert("data added succesfully")
</script>
<?php
}
else
{
?>
<script type="text/javascript">
alert("data unsuccesfully")
</script>
<?php
}
?>
</body>
</html>
