<?php
session_start();
require_once 'DATABASE/connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$message = '';
$success = false;

// If user already logged in, try redirect to dashboard only if dashboard file exists
if (isset($_SESSION['user_id'])) {
    $role = strtolower($_SESSION['role_name']);
    // $redirectUrl = "Roles/{$role}_dashboard.php";

    if (file_exists($redirectUrl)) {
        header("Location: $redirectUrl");
        exit();
    } else {
        // Dashboard file missing, logout user and show message below login form
        session_destroy();
        $message = "Dashboard not found for your role. Please contact admin.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username_or_email = trim($_POST['username_or_email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username_or_email) || empty($password)) {
        $message = "Please fill in both fields.";
    } else {
        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT u.id, u.username, u.email, u.password, r.role_name 
                                FROM users u 
                                JOIN roles r ON u.role_id = r.id
                                WHERE u.username = ? OR u.email = ?");
        $stmt->bind_param("ss", $username_or_email, $username_or_email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            if ($password === $user['password']) { // Plain text password check (not recommended)
                // Before setting session, check if dashboard file exists
                $role = strtolower($user['role_name']);
                $redirectUrl = "Roles/{$role}_dashboard.php";

                if (file_exists($redirectUrl)) {
                    // Login success - save session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['role_name'] = $user['role_name'];

                    // Redirect immediately
                    header("Location: $redirectUrl");
                    exit();
                } else {
                    // Dashboard does not exist - show message and don't log in
                    $message = "Dashboard not found for your role. Please contact admin.";
                }
            } else {
                $message = "Invalid password.";
            }
        } else {
            $message = "Invalid username/email or password.";
        }

        $stmt->close();
        $db->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4">Login</h2>

    <?php if ($message): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST" novalidate>
        <div class="mb-3">
            <label for="username_or_email" class="form-label">Username or Email:</label>
            <input type="text" class="form-control" id="username_or_email" name="username_or_email" required
                   value="<?= isset($_POST['username_or_email']) ? htmlspecialchars($_POST['username_or_email']) : '' ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
