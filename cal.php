<!DOCTYPE html>
<html>
<head>
    <title>Summary Sheet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Summary Sheet</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sname = $_POST["sname"];

        $summary = "<h2>Summary for Shop: $sname</h2>";

        $products = [
            "PEPSI", "MERINDA", "7UP", "ZINGO",
            "CREAMSODA", "GINGER BEER", "M/DEW", "STING"
        ];

        $mls = [2, 25, 3, 5, 75, 1, 15];
        
        $summary .= "<table>
                        <tr>
                            <th>BRAND</th>";
        
        foreach ($mls as $ml) {
            $summary .= "<th>{$ml} ml</th>";
        }
        
        $summary .= "</tr>";

        foreach ($products as $product) {
            $summary .= "<tr>
                            <td>$product</td>";
            
            foreach ($mls as $ml) {
                $inputName = strtolower(substr($product, 0, 1)) . $ml;
                $quantity = isset($_POST[$inputName]) ? $_POST[$inputName] : 0;
                $summary .= "<td>$quantity</td>";
            }
            
            $summary .= "</tr>";
        }

        $summary .= "</table>";
        echo $summary;
    }
    ?>

    <br>
    <a href="javascript:history.back()">Go back</a>
</body>
</html>
