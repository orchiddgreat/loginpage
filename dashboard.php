<?php
session_start();
if (!isset($_GET['user'])) {
    header("Location: index.html");
    exit();
}
include 'db.php';
$user = $_GET['user'];
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <table>
        <tr>
            <td><img src="akin.png" alt="Akinro profile picture"></td>
        <td><h1>Akinro David | Web Developer</h1></td><br>
            </tr>
            <tr>
                <td><td><p>Welcome, <?php echo $userData['username']; ?>!</p></td></td>
            </tr>
    </table>
    <h3>My Hobbies</h3>
    <ol>
        <li>Playing Football</li>
        <li>Reading</li>
        <li>Travelling</li>
        <li>Motorcycles</li>
    </ol>
</body>
</html>