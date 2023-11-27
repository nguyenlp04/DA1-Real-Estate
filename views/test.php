<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export CSV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .export-button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Employee Data</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
    </tr>
    <tr>
        <td>1</td>
        <td>John Doe</td>
        <td>john.doe@example.com</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Jane Doe</td>
        <td>jane.doe@example.com</td>
    </tr>
</table>

<button class="export-button" onclick="exportCSV()">Export to CSV</button>


<?php
if (isset($_GET['action']) && $_GET['action'] == 'export') {
    // Dữ liệu mẫu
    $data = array(
        array('ID', 'Tên', 'Email'),
        array('1', 'John Doe', 'john.doe@example.com'),
        array('2', 'Jane Doe', 'jane.doe@example.com'),
    );

    // Tên file và đường dẫn
    $filename = 'example.csv';

    // Mở file để ghi
    $file = fopen($filename, 'w');

    // Ghi dữ liệu vào file
    foreach ($data as $row) {
        fputcsv($file, $row);
    }

    // Đóng file
    fclose($file);

    // Đặt header cho file CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Đọc file và gửi đến trình duyệt
    readfile($filename);

    // Xóa file sau khi xuất
    unlink($filename);
}
?>

</body>
</html>
