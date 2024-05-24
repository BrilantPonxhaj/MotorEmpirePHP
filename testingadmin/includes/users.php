
<style>
<?php include '../adminCSS/userscss.css'; ?>
</style>
<header>
<?php include 'header.php'; ?>
</header>
</div>

<div class="main-content">

    <h1>Users</h1> 

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include 'db2.php';
                $sql = "SELECT id, fullname, email FROM register";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td><a href='edit_user.php?id=" . $row["id"] . "' class='button'>Edit</a></td><td><a href='delete_user.php?id=" . $row["id"] . "' class='button' onclick='return confirm(\"Are you sure?\")'>Delete</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No users found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>
