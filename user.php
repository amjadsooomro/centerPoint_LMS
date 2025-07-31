<?php
require_once 'Database/connect.php';
$db = new Database();
$conn = $db->getConnection();

$sql = "
  SELECT u.id, u.username, u.email, r.role_name
  FROM users u
  JOIN roles r ON u.role_id = r.id
  ORDER BY u.id ASC
";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>User List</title></head>
<body>
<h2>All Registered Users</h2>
<?php if ($result && $result->num_rows > 0): ?>
<table border="1" cellpadding="8">
  <tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th></tr>
  <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?=htmlspecialchars($row['id'])?></td>
      <td><?=htmlspecialchars($row['username'])?></td>
      <td><?=htmlspecialchars($row['email'])?></td>
      <td><?=htmlspecialchars($row['role_name'])?></td>
    </tr>
  <?php endwhile; ?>
</table>
<?php else: ?>
<p>No users found.</p>
<?php endif; ?>
</body>
</html>
