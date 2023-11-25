<?php
include 'db.php';

// Get user ID from the URL parameter
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from the database
    $query = "SELECT * FROM register WHERE id = '$user_id'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Set headers for download
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="user_details.txt"');

        // Output user details as text
        echo "User ID: " . $user['id'] . "\n";
        echo "Firstname: " . $user['firstname'] . "\n";
        echo "Lastname: " . $user['lastname'] . "\n";
        echo "Gender: " . $user['gender'] . "\n";
        echo "Number: " . $user['number'] . "\n";
        echo "Email: " . $user['email'] . "\n";
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
