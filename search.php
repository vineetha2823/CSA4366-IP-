<?php
include 'connection.php';

$value = null;

if (isset($_POST['search_btn'])) {
    $value = mysqli_real_escape_string($con, $_POST['search_value']);
    $query = "SELECT * FROM register WHERE LOWER(firstname) LIKE LOWER('%$value%') OR LOWER(lastname) LIKE LOWER('%$value%') OR LOWER(gender) LIKE LOWER('%$value%') OR LOWER(number) LIKE LOWER('%$value%') OR LOWER(email) LIKE LOWER('%$value%')";
    $result = mysqli_query($con, $query);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <center>
        <div>
            <!-- Search Form -->
            <form action="" method="POST">
                <input type="text" name="search_value" placeholder="Search">
                <input type="submit" name="search_btn" value="Search">
            </form>

            <!-- Display search results -->
            <?php if ($result && mysqli_num_rows($result) > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Gender</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['gender']; ?></td>
                            <td><?php echo $row['number']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="view.php?id=<?php echo $row['id']; ?>">View</a>
                                |
                                <a href="download.php?id=<?php echo $row['id']; ?>">Download</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No records found.</p>
            <?php } ?>
        </div>
    </center>
</body>

</html>
