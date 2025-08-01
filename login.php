<?php
require_once 'Database/connect.php';
$db = new Database();
$conn = $db->getConnection();

session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("
        SELECT u.id, u.password, r.role_name
        FROM users u
        JOIN roles r ON u.role_id = r.id
        WHERE u.username = ? LIMIT 1
    ");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($userId, $storedPwd, $roleName);

    if ($stmt->fetch()) {
        if ($password === $storedPwd) {
            // successful login
            session_regenerate_id(true);
            $_SESSION['user_id'] = $userId;
            $_SESSION['role_name'] = $roleName;
            $stmt->close();

            switch ($roleName) {
                case 'admin':
                    header('Location: Roles/admin/dashboard.php');
                    break;
                case 'manager':
                    header('Location: Roles/manager/dashboard.php');
                    break;
                case 'accountant':
                    header('Location: Roles/accountant/dashboard.php');
                    break;
                case 'exam':
                    header('Location: Roles/exam_dashboard.php');
                    break;
                case 'sro':
                    header('Location: Roles/sro/dashboard.php');
                    break;
                case 'tnd':
                    header('Location: Roles/tnd/dashboard.php');
                    break;
                case 'hr':
                    header('Location: Roles/hr/dashboard.php');
                    break;
                default:
                    header('Location: Roles/user/dashboard.php');
                    break;
            }
            exit;
            
        } else {
            $error = 'Invalid password.';
        }
    } else {
        $error = 'Username not found.';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Login</title></head>
<body>
<h2>Login</h2>
<?php if (!empty($error)): ?>
  <p style="color:red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post" action="">
  <label>Username: <input type="text" name="username" required></label><br>
  <label>Password: <input type="password" name="password" required></label><br>
  <button type="submit">Login</button>
</form>
</body>
</html
