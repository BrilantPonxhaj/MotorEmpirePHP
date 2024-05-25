<?php
require_once('includes/db.php');

try {
    $sql = "SELECT carID, name, category, model, price, kilometers, engineType, gearbox, description FROM cars";
    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception("Error executing SQL query: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        echo '<table>
                <tr>
                    <th>Car ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Kilometers</th>
                    <th>Engine Type</th>
                    <th>Gearbox</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row["carID"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["name"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["category"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["model"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["price"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["kilometers"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["engineType"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["gearbox"]) . '</td>';
            echo '<td>' . htmlspecialchars($row["description"]) . '</td>';
            echo '<td>
                    <a href="edit_car.php?carID=' . $row["carID"] . '"><button>Edit</button></a>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No cars found in the database.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

$conn->close();
?>
