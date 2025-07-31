<?php
require_once 'Database/connect.php';
$db = new Database();
$conn = $db->getConnection();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $role_id  = intval($_POST['role_id']);

    if ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = 'Username or email already exists.';
        }
        $stmt->close();

        if (!$error) {
            $stmt = $conn->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sssi", $username, $email, $password, $role_id);
            if ($stmt->execute()) {
                header('Location: Reg.php?success=1');
                exit;
            } else {
                $error = 'Database error: ' . $stmt->error;
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Register</title></head>
<body>
<h2>Register</h2>
<?php if (!empty($error)): ?>
  <p style="color:red;"><?=htmlspecialchars($error)?></p>
<?php elseif (isset($_GET['success'])): ?>
  <p style="color:green;">Registration successful. <a href="users.php">View users</a></p>
<?php endif; ?>

<form method="post" action="">
  <label>Username: <input type="text" name="username" required></label><br>
  <label>Email:    <input type="email" name="email" required></label><br>
  <label>Password: <input type="password" name="password" required></label><br>
  <label>Confirm Password: <input type="password" name="confirm_password" required></label><br>
  <label>Select Role:
    <select name="role_id" required>
      <option value="">-- Choose a role --</option>
      <option value="1">admin</option>
      <option value="2">manager</option>
      <option value="3">user</option>
      <option value="4">accountant</option>
      <option value="5">exam</option>
      <option value="6">sro</option>
      <option value="7">tnd</option>
      <option value="8">hr</option>
    </select>
  </label><br>
  <button type="submit">Register</button>
</form>
</body>
</html>
