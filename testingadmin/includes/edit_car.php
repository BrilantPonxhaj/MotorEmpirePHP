<?php
require_once('db.php'); // Ensure this path is correct

$carID = $_GET['carID'] ?? '';

if (empty($carID)) {
    echo "No car ID provided!";
    exit;
}

try {
    $stmt = $conn->prepare("SELECT carID, name, category, model, price, kilometers, engineType, gearbox, description FROM cars WHERE carID = ?");
    $stmt->bind_param("i", $carID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No car found with the given ID!";
        exit;
    }

    $car = $result->fetch_assoc();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit;
}

$conn->close();
?>

<header>
<?php include 'header.php'; ?>
</header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
    <link rel="stylesheet" href="../adminCSS/edit_carcss.css">
    <script>
        function updateCarData(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            var form = event.target;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_car.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert('Car data updated successfully!');
                    } else {
                        alert('Error updating car data: ' + xhr.statusText);
                    }
                }
            };
            xhr.send(formData);
        }

        function cancelEdit() {
            // Restore original data from data attributes
            document.getElementById('name').value = document.getElementById('name').dataset.original;
            document.getElementById('category').value = document.getElementById('category').dataset.original;
            document.getElementById('model').value = document.getElementById('model').dataset.original;
            document.getElementById('price').value = document.getElementById('price').dataset.original;
            document.getElementById('kilometers').value = document.getElementById('kilometers').dataset.original;
            document.getElementById('engineType').value = document.getElementById('engineType').dataset.original;
            document.getElementById('gearbox').value = document.getElementById('gearbox').dataset.original;
            document.getElementById('description').value = document.getElementById('description').dataset.original;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('editCarForm');
            form.addEventListener('submit', updateCarData);
        });
    </script>
</head>
<body>
<div class="main-content">
    <h1>Update Car</h1>
    <form id="editCarForm" method="POST">
        <input type="hidden" name="carID" value="<?php echo htmlspecialchars($car['carID']); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($car['name']); ?>" data-original="<?php echo htmlspecialchars($car['name']); ?>" required>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo htmlspecialchars($car['category']); ?>" data-original="<?php echo htmlspecialchars($car['category']); ?>" required>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" value="<?php echo htmlspecialchars($car['model']); ?>" data-original="<?php echo htmlspecialchars($car['model']); ?>" required>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($car['price']); ?>" data-original="<?php echo htmlspecialchars($car['price']); ?>" required>
        <label for="kilometers">Kilometers:</label>
        <input type="text" id="kilometers" name="kilometers" value="<?php echo htmlspecialchars($car['kilometers']); ?>" data-original="<?php echo htmlspecialchars($car['kilometers']); ?>" required>
        <label for="engineType">Engine Type:</label>
        <input type="text" id="engineType" name="engineType" value="<?php echo htmlspecialchars($car['engineType']); ?>" data-original="<?php echo htmlspecialchars($car['engineType']); ?>" required>
        <label for="gearbox">Gearbox:</label>
        <input type="text" id="gearbox" name="gearbox" value="<?php echo htmlspecialchars($car['gearbox']); ?>" data-original="<?php echo htmlspecialchars($car['gearbox']); ?>" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" data-original="<?php echo htmlspecialchars($car['description']); ?>" required><?php echo htmlspecialchars($car['description']); ?></textarea>
        <div class="buttons">
            <button type="submit">Save</button>
            <button type="button" onclick="cancelEdit()">Cancel</button>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
