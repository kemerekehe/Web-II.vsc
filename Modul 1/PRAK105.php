<!DOCTYPE html>
<html>
<head>
    <title>Indexed Array to Table</title>
    <style>
        table {
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            text-align: left;
        }
        th {
            background-color: red;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th><h2>Daftar Smartphone Samsung</h2></th>
    </tr>
    <?php

$samsungs = array(
    array("name" => "Samsung Galaxy S22"),
    array("name" => "Samsung Galaxy S22+"),
    array("name" => "Samsung Galaxy A03"),
    array("name" => "Samsung Galaxy Xcover 5"),
);

foreach ($samsungs as $samsung) {
    echo "<tr>";
    echo "<td>" . $samsung['name'] . "</td>";
    echo "</tr>";
}
?>

</body>
</html>