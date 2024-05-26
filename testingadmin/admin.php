<html>
<style>
<?php include 'adminCSS/admincss.css'; ?>   
</style>  
<body>
<div class="d-flex">
    <div class="sidebar">
        <h3>Administrator</h3>
        <a href="#">Dashboard</a>
        <a href="includes/customers.php">Customers</a>
        <a href="includes/users.php">Users</a>
        <a href="includes/cars.php">Cars</a>
    </div>
    <div class="main-content container-fluid">
        <h1 class="my-4">Dashboard</h1>
        <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Customers</div>
                    <div class="card-body">
                        <h5 class="card-title">View Details</h5>
                        <a href="includes/customers.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <h5 class="card-title">View Details</h5>
                        <a href="includes/users.php" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
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

<!-- User accessed admin panel on: 2024-05-26 23:29:42 -->