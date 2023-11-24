<?php include 'connection.php'; 
$id=$_GET['id'];
$select="SELECT * FROM books WHERE id='$id'";
$data=mysqli_query($con,$select);
$row=mysqli_fetch_array($data);
?>
 <div>
            <form action="" method="POST">
                <input value="<?php echo $row['bookid'] ?>" type="number" name="bookid" placeholder="bookid"> <br><br>
                <input type="text" name="booktitle" placeholder="booktitle" value=<?php echo $row['booktitle'] ?>> <br><br>
                <input type="text" name="author" placeholder="author" value=<?php echo $row['author'] ?>> <br><br>
                <input type="submit" name="update_btn" value="Update"> <br><br>
                <button><a href="view.php">Back</a></button>
            </form>
        </div>
        <?php
        if (isset($_POST['update_btn'])) {
            $bookid = $_POST['bookid'];
            $booktitle = $_POST['booktitle'];
            $author = $_POST['author'];
            $update = "UPDATE books SET bookid='$bookid',booktitle='$booktitle',author='$author' WHERE id ='$id'";    
            $data = mysqli_query($con, $update);
            if ($data) {
                ?>
                <script type="text/javascript">
                    alert("Data Updated Successfully");
                </script>
                <?php   
            }
            else {
                ?>
                <script type="text/javascript">
                    alert("Please try again");
                    window.open("http://localhost/library/view.php","_self");
                </script>
                <?php
            }
        }
        ?>
