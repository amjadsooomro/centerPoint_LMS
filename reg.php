<?php
session_start();
require_once 'DATABASE/connect.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'student'; // Default role

    // Validate inputs
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format.';
    } elseif (strlen($password) < 5 || strlen($password) > 20) {
        $message = 'Password must be between 5 and 20 characters.';
    } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        $message = 'Username must be alphanumeric.';
    } else {
        // Insert into database without hashing the password
        $stmt = $conn->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('ssss', $username, $email, $password, $role);

        if ($stmt->execute()) {
            $message = 'Registration successful!';
        } else {
            $message = 'Error: ' . $stmt->error;
        }
        $stmt->close();
    }
}

// Fetch ENUM values for roles
$roles = [];
$sql = "SELECT COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'users' AND COLUMN_NAME = 'role'";
$result = $conn->query($sql);
if ($result && $row = $result->fetch_assoc()) {
    preg_match('/^enum\((.*)\)$/', $row['COLUMN_TYPE'], $matches);
    if (isset($matches[1])) {
        $roles = array_map(function($value) {
            return trim($value, "'");
        }, explode(',', $matches[1]));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container p-5 d-flex flex-column align-items-center">
        <?php if ($message): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="post" class="form-control mt-5 p-4" style="width:380px; box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
            <div class="text-center mb-4">
                <h5 class="p-4" style="font-weight: 700;">Create Your Account</h5>
            </div>
            <div class="mb-2">
                <label for="username"><i class="fa fa-user"></i> Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="mb-2 mt-2">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-2 mt-2">
                <label for="password"><i class="fa fa-lock"></i> Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="mb-2 mt-2">
                <label for="role"><i class="fa fa-user-tag"></i> Role</label>
                <select name="role" id="role" class="form-control">
                    <?php foreach ($roles as $role_option): ?>
                        <option value="<?= htmlspecialchars($role_option) ?>"><?= htmlspecialchars($role_option) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-2 mt-3">
                <button type="submit" class="btn btn-success w-100" style="font-weight: 600;">Create Account</button>
            </div>
            <div class="mb-2 mt-4">
                <p class="text-center" style="font-weight: 600; color: navy;">Already have an account? <a href="login.php" style="text-decoration: none;">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
