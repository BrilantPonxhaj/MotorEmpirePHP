<?php


require_once('../database/carsDB.php');

try {
    $sql = "SELECT carID, name, category, model, price, kilometers, engineType, gearbox, description FROM cars";
    $result = $conn->query($sql);

    if (!$result)
     {
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
        while ($row = $result->fetch_assoc())
        
        
        
        {
            echo '<tr>
                    <td><input type="text" id="carID' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["carID"]) . '" readonly></td>
                    <td><input type="text" id="carName' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["name"]) . '"></td>
                    <td><input type="text" id="carCategory' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["category"]) . '"></td>
                    <td><input type="text" id="carModel' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["model"]) . '"></td>
                    <td><input type="text" id="carPrice' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["price"]) . '"></td>
                    <td><input type="text" id="carKilometers' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["kilometers"]) . '"></td>
                    <td><input type="text" id="carEngineType' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["engineType"]) . '"></td>
                    <td><input type="text" id="carGearbox' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["gearbox"]) . '"></td>
                    <td><input type="text" id="carDescription' . htmlspecialchars($row["carID"]) . '" value="' . htmlspecialchars($row["description"]) . '"></td>
                    <td><button onclick="updateCarData(' . htmlspecialchars($row["carID"]) . ')">Update</button></td>
                </tr>';
        }
        echo '</table>';
    } 
    
    
    else 
    
    {
        echo "No cars found in the database.";
    }
} 
    catch (Exception $e) 
    {
    echo "Error: " . $e->getMessage();
}

$conn->close();







?>
