<?php
require_once 'DATABASE/connect.php';

$db = new Database();
$conn = $db->getConnection();

// Fetch all roles to populate dropdown
$roles_result = $conn->query("SELECT id, role_name FROM roles");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>User Registration</title>
</head>
<body>
    <h2>Register New User</h2>
    <form action="" method="POST">
        <label>Username:</label><br/>
        <input type="text" name="username" required /><br/><br/>

        <label>Email:</label><br/>
        <input type="email" name="email" required /><br/><br/>

        <label>Password:</label><br/>
        <input type="password" name="password" required /><br/><br/>

        <label>Role:</label><br/>
        <select name="role_id" required>
            <option value="">Select Role</option>
            <?php while($row = $roles_result->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['role_name']) ?></option>
            <?php } ?>
        </select><br/><br/>

        <button type="submit">Register</button>
    </form>
</body>
</html>
<?php
require_once 'DATABASE/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];   // Plain text password
    $role_id = (int)$_POST['role_id'];

    // Basic validation (add more as needed)
    if (empty($username) || empty($email) || empty($password) || !$role_id) {
        die("All fields are required.");
    }

    $db = new Database();
    $conn = $db->getConnection();

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        die("Username or email already exists.");
    }
    $stmt->close();

    // Insert new user with plain text password
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $email, $password, $role_id);

    if ($stmt->execute()) {
        // Get first registered user details
        $result = $conn->query("SELECT u.id, u.username, u.email, r.role_name 
                               FROM users u 
                               JOIN roles r ON u.role_id = r.id 
                               ORDER BY u.id ASC LIMIT 1");
        $first_user = $result->fetch_assoc();

        echo "<h2>Registration Successful!</h2>";
        echo "<p>First registered user details:</p>";
        echo "<ul>";
        echo "<li>ID: " . htmlspecialchars($first_user['id']) . "</li>";
        echo "<li>Username: " . htmlspecialchars($first_user['username']) . "</li>";
        echo "<li>Email: " . htmlspecialchars($first_user['email']) . "</li>";
        echo "<li>Role: " . htmlspecialchars($first_user['role_name']) . "</li>";
        echo "</ul>";
        echo '<a href="register.php">Register another user</a>';
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
    $db->close();

} else {
    echo "Invalid request method.";
}



