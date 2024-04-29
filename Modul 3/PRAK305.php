<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="get">
        <input type="text" name="input" id="input">
        <input type="submit" value="submit" name="Submit"><br>
    </form>
    <?php
        $globalnum = $_GET['input'] ?? '';
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["input"])) {
            echo '<h2>Input :</h2>';
            echo $globalnum;
            echo '<br><h2>Output :</h2>';
            $characters = str_split($globalnum);
            foreach ($characters as $char){
                echo strtoupper($char);
                for ($i = 1; $i < strlen($globalnum); $i++) {
                    echo strtolower($char);
                }
            }
        }
    ?>
</body>
</html>
