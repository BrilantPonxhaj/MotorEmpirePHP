<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            color: #fff;
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
            margin-left: 250px;
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-header {
            background-color: #343a40;
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
            font-size: 20px;
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .my-4 {
            margin-top: 2rem !important;
            margin-bottom: 2rem !important;
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
            .sidebar a {
                float: left;
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
<div class="d-flex">
    <div class="sidebar">
        <h3>Administrator</h3>
        <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="includes/customers.php">Customers</a></li>
        <li><a href="includes/users.php">Users</a></li>
        <li><a href="includes/cars.php">Cars</a></li>
        </ul>
    </div>
    <div class="main-content container-fluid">
        <h1 class="my-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                        <h5 class="card-title">View Details</h5>
                        <a href="includes/customers.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <h5 class="card-title">View Details</h5>
                        <a href="includes/users.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">Cars</div>
                    <div class="card-body">
                        <h5 class="card-title">View Details</h5>
                        <a href="includes/cars.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- User accessed admin panel on: 2024-05-27 13:18:30 -->
<!-- User accessed admin panel on: 2024-05-29 18:55:44 -->
<!-- User accessed admin panel on: 2024-05-29 18:56:24 -->