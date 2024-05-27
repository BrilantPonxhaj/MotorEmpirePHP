<?php
include 'db2.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Fetch user data based on ID
    $sql = "SELECT * FROM register WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found";
        exit;
    }

    // Update user data
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $isAdmin = isset($_POST['isAdmin']) ? 1 : 0;

        $sql = "UPDATE register SET fullname = ?, email = ?, isAdmin = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssii", $fullname, $email, $isAdmin, $id);

        if ($stmt->execute()) {
            header("Location: users.php");
            exit;
        } else {
            echo "Error updating user";
        }
    }
} else {
    echo "Invalid ID";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .form-check-label {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit User</h1>
    <form method="post">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo htmlspecialchars($user['fullname']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="isAdmin" name="isAdmin" <?php echo $user['isAdmin'] ? 'checked' : ''; ?>>
            <label class="form-check-label" for="isAdmin">Is Admin</label>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="users.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
