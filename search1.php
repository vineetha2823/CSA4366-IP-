<?php 
include 'db.php';
?>
<!DOCTYPE html>
<body>
<center>
<div>
<form method="POST">
<input type="text" name="sear" placeholder="sear">
<input type="submit" name="sear_btn" value="search">
</form>
<?php
$value=null;
if (isset($_POST['sear_btn']))
{
$value=mysqli_real_escape_string($con,$_POST['sear']);
$query="SELECT * FROM login WHERE LOWER(firstname) LIKE LOWER('%$value%') OR LOWER(lastname) LIKE LOWER('%$value%')";
$result=mysqli_query($con,$query);
}
if($result&& mysqli_num_rows($result)>0)
{
?>
<table border="1px" cellpadding="10px" cellspacing="10px">
<tr>
<th>id</th>
<th>firstname</th>
<th>lastname</th>
<th colspan="2">actions</th>
</tr>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $row['id']?></td>
<td><?php echo $row['firstname']?></td>
<td><?php echo $row['lastname']?></td>
<td><a href="view.php?id=<?php echo $row['id'];?>">view</a>
<a href="down.php?id=<?php echo $row['id'];?>">download</a></td>
</tr>
<?php
}
?>
</table>
<?php
}
else
{
echo "no";
}
?>
</div>
</center>
</body>
</html>
