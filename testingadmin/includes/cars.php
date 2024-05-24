<header>
<?php include 'header.php'; ?>
</header>
    <title>Admin Page - Manage Cars</title>
    <script>
        function readCarData() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../read_cars.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('carContent').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        function updateCarData(carId) {
            var xhr = new XMLHttpRequest();
            var data = new FormData();
                data.append('id', carId);
                data.append('name', document.getElementById('carName' + carId).value);
                data.append('category', document.getElementById('carCategory' + carId).value);
                data.append('model', document.getElementById('carModel' + carId).value);
                data.append('price', document.getElementById('carPrice' + carId).value); // Send as is
                data.append('kilometers', document.getElementById('carKilometers' + carId).value); // Send as is
                data.append('engineType', document.getElementById('carEngineType' + carId).value);
                data.append('gearbox', document.getElementById('carGearbox' + carId).value);
                data.append('description', document.getElementById('carDescription' + carId).value);
                
            xhr.open('POST', '../update_car.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    console.log(xhr.responseText);
                    if (xhr.status == 200) {
                        alert('Car data updated successfully!');
                        readCarData();
                    } else {
                        alert('Error updating car data: ' + xhr.statusText);
                    }
                }
            };
            xhr.send(data);
        }

        document.addEventListener('DOMContentLoaded', function() {
            readCarData();
        });

    </script>
    <style>
        <?php include '../adminCSS/carscss.css'; ?>
    </style>

    <div class="main-content table-container" id="carContent">
        <!-- Car data will be loaded here -->
    </div>
<?php include 'footer.php'; ?>


