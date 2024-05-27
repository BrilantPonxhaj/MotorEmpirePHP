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
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px; /* Padding for better spacing */
            border: 1px solid #ddd;
            vertical-align: middle; /* Center content vertically */
            text-align: center; /* Center text in cells */
        }

        th {
            background-color: #343a40;
            color: black;        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd; /* Add hover effect */
        }

        .table-responsive {
            overflow-x: auto;
        }

        h1 {
            margin-bottom: 20px;
        }
        ul{
            list-style-type: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }

        @media (max-width: 480px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
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
        <h1>Customers</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Date of Birth</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Postcode</th>
                        <th>Street 1</th>
                        <th>Street 2</th>
                        <th>Payment Method</th>
                        <th>Card Number</th>
                        <th>Card Expiry</th>
                        <th>Card CVV</th>
                        <th>Car Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'db.php';
                    $sql = "SELECT * FROM customer_info";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["name"]). "</td>
                                    <td>" . htmlspecialchars($row["surname"]). "</td>
                                    <td>" . htmlspecialchars($row["dateofbirth"]). "</td>
                                    <td>" . htmlspecialchars($row["country"]). "</td>
                                    <td>" . htmlspecialchars($row["city"]). "</td>
                                    <td>" . htmlspecialchars($row["postcode"]). "</td>
                                    <td>" . htmlspecialchars($row["street1"]). "</td>
                                    <td>" . htmlspecialchars($row["street2"]). "</td>
                                    <td>" . htmlspecialchars($row["payment"]). "</td>
                                    <td>" . htmlspecialchars($row["card_number"]). "</td>
                                    <td>" . htmlspecialchars($row["card_expiry"]). "</td>
                                    <td>" . htmlspecialchars($row["card_cvv"]). "</td>
                                    <td>" . htmlspecialchars($row["car_name"]). "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13' class='text-center'>No customers found</td></tr>";
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
