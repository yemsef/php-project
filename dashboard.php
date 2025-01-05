<?php
require 'navbar.php';
session_start();
require 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please log in first.');
            window.location.href = 'login.php';
          </script>";
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details from the database
$stmt = $conn->prepare("SELECT first_name, last_name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<h2>User information not found.</h2>";
    exit();
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
</body>
</html>

<?php
require 'footer.php';
?>
