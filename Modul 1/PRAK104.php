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
            font-weight: 300px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <th>Daftar Smartphone Samsung</th>
    </tr>
    <?php

    $samsung = array("Samsung Galaxy S22", "Samsung Gaaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");

    // Menampilkan array dalam tabel HTML
    for ($i = 0; $i < count($samsung); $i++) {
        echo "<tr>";
        echo "<td>" . $samsung[$i] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>