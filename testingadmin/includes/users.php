<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../adminCSS/headercss.css">
    <link rel="stylesheet" href="../adminCSS/userscss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar h3 {
            color: black;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #d1d1d1;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575d63;
            color: #fff;
        }

        .main-content {
            margin-left: 250px; /* Adjust for sidebar width */
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            min-height: 100vh; /* Ensure the main content takes at least the full viewport height */
        }

        .table-responsive {
            overflow-x: auto;
        }

        .button {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .button-danger {
            background-color: #dc3545;
        }

        .button-danger:hover {
            background-color: #c82333;
        }

        .add-user-btn {
            margin-bottom: 20px;
        }

        .alert {
            margin-top: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #343a40;
            color: black;
                        text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-user-btn {
            margin: 0 auto 20px auto;
            width: fit-content;
        }
        ul{
            list-style-type: none;
        }
        
    </style>
</head>
<body>
<div class="sidebar">
    <h3>Administrator</h3>
    <ul>
    <li><a href="../admin.php">Dashboard</a></li>
    <li><a href="customers.php">Customers</a></li>
    <li><a href="users.php">Users</a></li>
    <li><a href="cars.php">Cars</a></li>
    </ul>
</div>
<header>
    <?php include 'header.php'; ?>
</header>
<div class="main-content">
    <h1>Users</h1>
    <a href="add_user.php" class="btn btn-success add-user-btn">Add User</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db2.php';

                // Handle user deletion
                if (isset($_GET['delete_id'])) {
                    $delete_id = intval($_GET['delete_id']);
                    $sql = "DELETE FROM register WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $delete_id);

                    if ($stmt->execute()) {
                        echo "<div class='alert alert-success'>User deleted successfully</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error deleting user</div>";
                    }
                }

                $sql = "SELECT id, fullname, email FROM register";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row["id"]) . "</td>
                                <td>" . htmlspecialchars($row["fullname"]) . "</td>
                                <td>" . htmlspecialchars($row["email"]) . "</td>
                                <td><a href='edit_user.php?id=" . htmlspecialchars($row["id"]) . "' class='button'>Edit</a></td>
                                <td><a href='users.php?delete_id=" . htmlspecialchars($row["id"]) . "' class='button button-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<footer>
    <?php include 'footer.php'; ?>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
