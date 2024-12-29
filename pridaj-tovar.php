<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pridanie tovaru</title>
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

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      font-size: 18px; /* увеличенный размер шрифта */
      font-weight: bold; /* жирный текст */
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

<form action="pridany-tovar-ok.php" method="POST">
  <b>Pridanie tovaru</b><br/><br />
  Názov: <input name="nazov" type="text" /><br/>
  Výrobca: <input name="vyrobca" type="text"/><br/>
  Popis: <input name="popis" type="text"/><br/>
  Farba: <input name="farba" type="text" /><br />
  Cena: <input name="cena" type="text" /><br />
  Kód: <input name="kod" type="text" /><br />
  <input type="submit" name="submit" value="Odoslat"/>
</form>

</body>
</html>
