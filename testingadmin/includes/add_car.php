<header>
<?php include 'header.php'; ?>
</header>
    <meta charset="UTF-8">
    <title>Add Car</title>
    <link rel="stylesheet" href="../adminCSS/edit_carcss.css">
    <script>
        function addCarData(event) {
            event.preventDefault(); // Prevent the form from submitting the default way

            var form = event.target;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_car.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        alert('Car data added successfully!');
                        window.location.href = 'cars.php'; // Redirect back to cars page
                    } else {
                        alert('Error adding car data: ' + xhr.statusText);
                    }
                }
            };
            xhr.send(formData);
        }

        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('addCarForm');
            form.addEventListener('submit', addCarData);
        });
    </script>
</head>
<body>
<div class="main-content">
    <h1>Add Car</h1>
    <form id="addCarForm" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <label for="kilometers">Kilometers:</label>
        <input type="text" id="kilometers" name="kilometers" required>
        <label for="engineType">Engine Type:</label>
        <input type="text" id="engineType" name="engineType" required>
        <label for="gearbox">Gearbox:</label>
        <input type="text" id="gearbox" name="gearbox" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" required>
        <div class="buttons">
            <button type="submit">Save</button>
            <button type="button" onclick="window.location.href='cars.php'">Cancel</button>
        </div>
    </form>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
