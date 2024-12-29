<!DOCTYPE html>
<html lang="en">
<head>
  <title>vyhladaj</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    table {
      width: 1450px;
      border-collapse: collapse;
      margin: 20px 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #ffffff;

    }

    td, th {
      padding: 15px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #007bff;
      color: #ffffff;
    }

    tr:nth-child(odd) {
      background-color: #f9f9f9;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    td:last-child {
      color: #000000;
      font-weight: bold;
    }

    a {
      text-decoration: none;
      color: #007bff;
    }
  </style>
</head>
<body>

<?php
echo "<table>";
include("config.php");
$var = mysqli_connect("$localhost", "$user", "$password", "$db") or die("connect error");
$sql = "select id, nazov, vyrobca, popis, kod, cena, farba, color from tovar";
$result = mysqli_query($var, $sql) or exit("chybny dotaz");

// Header row
echo "<tr>
        <th>ID</th>
        <th>Nazov</th>
        <th>Vyrobca</th>
        <th>Popis</th>
        <th>Cena</th>
        <th>Farba</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $nazov = $row['nazov'];
    $vyrobca = $row['vyrobca'];
    $popis = $row['popis'];
    $farba = $row['farba'];
    $cena = $row['cena'];
    $kod = $row['kod'];
    $color = $row['color'];

    if ($color == "Pridal server 2") {
      $wer = "red";
    } elseif ($color == "Pridal server 1") {
      $wer = "green";
    } else {
      $wer = "orange";
    }

    echo "<tr>
        <td>$kod</td>
        <td>$nazov</td>
        <td>$vyrobca</td>
        <td>$popis</td>
        <td>$cena</td>
        <td>$farba</td>
        <td><span style='color: $wer;'>$color</span></td>
        <td>
            <a href='zmazanietov.php?k=$id'>Vymaž</a> |
            <a href='upravtov.php?k=$id'>Uprav</a>
        </td>
      </tr>";
}

echo "</table>";
?>
</body>
</html>
