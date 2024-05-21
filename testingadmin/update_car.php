<?php

require_once('../database/carsDB.php');

echo "Debugging: update_car.php reached\n";

// Print all received POST data

print_r($_POST);

try {
    if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['category']) && isset($_POST['model']) && isset($_POST['price']) &&
        isset($_POST['kilometers']) && isset($_POST['engineType']) && isset($_POST['gearbox']) && isset($_POST['description'])) 
        
        {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $model = $_POST['model'];
        $price = $_POST['price']; // Preserve commas
        $kilometers = $_POST['kilometers']; // Preserve commas
        $engineType = $_POST['engineType'];
        $gearbox = $_POST['gearbox'];
        $description = $_POST['description'];

        echo "Data received: id=$id, name=$name, category=$category, model=$model, price=$price, kilometers=$kilometers, engineType=$engineType, gearbox=$gearbox, description=$description\n";

        $sql = "UPDATE cars SET 
                name=?, 
                category=?,
                model=?, 
                price=?, 
                kilometers=?, 
                engineType=?, 
                gearbox=?, 
                description=? 
                WHERE carID=?";

        $stmt = $conn->prepare($sql);



        if ($stmt === false)
        
        {
            throw new Exception("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ssssssssi", $name, $category, $model, $price, $kilometers, $engineType, $gearbox, $description, $id);

        if ($stmt->execute())
         {
            echo "Car data updated successfully!";
        } 
        else 
        {
            throw new Exception("Error executing statement: " . $stmt->error);
        }

        $stmt->close();
    } 
    else
     {
        echo "Invalid data!";
    }
} 
catch (Exception $e) 
{
    echo "Error: " . $e->getMessage();
}


// Close the database connection
$conn->close();



?>