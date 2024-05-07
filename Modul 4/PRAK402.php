<?php 
$students = array(
    "Andi" => array("nama" => "Andi", "nim" => "2101001", "nilai_uts" => 87, "nilai_uas" => 65),
    "Budi" => array("nama" => "Budi", "nim" => "2101002", "nilai_uts" => 76, "nilai_uas" => 79),
    "Tono" => array("nama" => "Tono", "nim" => "2101003", "nilai_uts" => 50, "nilai_uas" => 41),
    "Jessica" => array("nama" => "Jessica", "nim" => "2101004", "nilai_uts" => 60, "nilai_uas" => 75)
);

foreach ($students as &$student) {
    $student["nilai_akhir"] = 0.4 * $student["nilai_uts"] + 0.6 * $student["nilai_uas"];
    $student["huruf"] = getGrade($student["nilai_akhir"]);
}
unset($student);

function getGrade($nilai) {
    if ($nilai >= 80) return "A";
    if ($nilai >= 70) return "B";
    if ($nilai >= 60) return "C";
    if ($nilai >= 50) return "D";
    if ($nilai >= 0) return "E";
    return "Invalid";
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
            <th>Huruf</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($students as $student) { ?>
            <tr>
                <td><?= $student["nama"] ?></td>
                <td><?= $student["nim"] ?></td>
                <td><?= $student["nilai_uts"] ?></td>
                <td><?= $student["nilai_uas"] ?></td>
                <td><?= $student["nilai_akhir"] ?></td>
                <td><?= $student["huruf"] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
