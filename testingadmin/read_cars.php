<?php
require_once('../database/carsDB.php');

try {
    $sql = "SELECT carID, name, category, model, price, kilometers, engineType, gearbox, description FROM cars";
    $result = $conn->query($sql);

    if (!$result) {
        throw new Exception("Error executing SQL query: " . $conn->error);
    }

    $editingId = $_GET['edit'] ?? '';

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
            $isEditing = ($row["carID"] == $editingId);
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row["carID"]) . '</td>';

            if ($isEditing) {
                echo '<form action="update.php" method="POST">';
                echo '<td><input type="text" name="name" value="' . htmlspecialchars($row["name"]) . '"></td>
                      <td><input type="text" name="category" value="' . htmlspecialchars($row["category"]) . '"></td>
                      <td><input type="text" name="model" value="' . htmlspecialchars($row["model"]) . '"></td>
                      <td><input type="text" name="price" value="' . htmlspecialchars($row["price"]) . '"></td>
                      <td><input type="text" name="kilometers" value="' . htmlspecialchars($row["kilometers"]) . '"></td>
                      <td><input type="text" name="engineType" value="' . htmlspecialchars($row["engineType"]) . '"></td>
                      <td><input type="text" name="gearbox" value="' . htmlspecialchars($row["gearbox"]) . '"></td>
                      <td><input type="text" name="description" value="' . htmlspecialchars($row["description"]) . '"></td>
                      <td>
                          <input type="hidden" name="carID" value="' . $row["carID"] . '">
                          <button type="submit">Save</button>
                          <a href="?">Cancel</a>
                      </td>
                      </form>';
            } else {
                echo '<td>' . htmlspecialchars($row["name"]) . '</td>
                      <td>' . htmlspecialchars($row["category"]) . '</td>
                      <td>' . htmlspecialchars($row["model"]) . '</td>
                      <td>' . htmlspecialchars($row["price"]) . '</td>
                      <td>' . htmlspecialchars($row["kilometers"]) . '</td>
                      <td>' . htmlspecialchars($row["engineType"]) . '</td>
                      <td>' . htmlspecialchars($row["gearbox"]) . '</td>
                      <td>' . htmlspecialchars($row["description"]) . '</td>
                      <td><a href="?edit=' . $row["carID"] . '">Edit</a></td>';
            }
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
