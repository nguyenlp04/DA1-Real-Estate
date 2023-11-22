<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kết nối đến MySQL


            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "da1-real-estate";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Lấy danh sách người dùng
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["full_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><button onclick=\"openUpdateModal(" . $row["id"] . ", '" . $row["name"] . "', '" . $row["email"] . "')\">Update</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <!-- Modal cập nhật thông tin người dùng -->
    <div id="updateModal" style="display:none;">
        <h2>Update User</h2>
        <form id="updateForm">
            <input type="hidden" id="userId" name="userId">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <button type="button" onclick="updateUser()">Update</button>
        </form>
    </div>

    <script>
        function openUpdateModal(userId, name, email) {
            document.getElementById("userId").value = userId;
            document.getElementById("name").value = name;
            document.getElementById("email").value = email;

            document.getElementById("updateModal").style.display = "block";
        }

        function updateUser() {
            // Lấy dữ liệu từ form
            var userId = document.getElementById("userId").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;

            // Gửi dữ liệu cập nhật lên máy chủ bằng Ajax
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "updateUser.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Xử lý phản hồi từ máy chủ
                    console.log(xhr.responseText);

                    // Tắt modal sau khi cập nhật thành công
                    document.getElementById("updateModal").style.display = "none";
                }
            };

            // Gửi dữ liệu dưới dạng x-www-form-urlencoded
            var data = "userId=" + userId + "&name=" + name + "&email=" + email;
            xhr.send(data);
        }
    </script>
</body>
</html>
