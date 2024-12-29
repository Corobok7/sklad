<?php include ("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vyhľadanie tovaru</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    form {
      max-width: 400px;
      margin: 50px auto;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 8px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
    }

    center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
  </style>
</head>
<body>

<form method="POST" action="index.php?menu=10">
  <h2>Vyhľadanie tovaru</h2>

  <label for="nazov">Názov:</label>
  <input name="nazov" type="text" />

  <label for="vyrobca">Výrobca:</label>
  <?php
  $var = mysqli_connect("$localhost","$user","$password","$db") or die ("connect error");
  $sql = "select vyrobca from tovar group by vyrobca";
  $q = mysqli_query($var, $sql);
  echo "<select name=\"vyrobca\">";
  echo "<option size=30></option>";
  while ($row = mysqli_fetch_assoc($q)) {
    echo "<option value='" . $row['vyrobca'] . "'>" . $row['vyrobca'] . "</option>";
  }
  echo "</select>";
  ?>

  <label for="cena">Cena:</label>
  <input name="cena" type="text" />

  <input type="submit" name="submit" value="Odoslať"/>
</form>

</body>
</html>
