<header>
<?php include 'header.php'; ?>
</header>
    <div class="main-content">
        <h1>Customers</h1>
        <table>
            <thead>
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
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM customer_info";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["surname"]. "</td><td>" . $row["dateofbirth"]. "</td><td>" . $row["country"]. "</td><td>" . $row["city"]. "</td><td>" . $row["postcode"]. "</td><td>" . $row["street1"]. "</td><td>" . $row["street2"]. "</td><td>" . $row["payment"]. "</td><td>" . $row["card_number"]. "</td><td>" . $row["card_expiry"]. "</td><td>" . $row["card_cvv"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No customers found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
<?php include 'footer.php'; ?>
