<?php
include("config.php");
$var = mysqli_connect("$localhost", "$user", "$password", "$db") or die("node 1 connect error");
$ID = $_GET["k"];

$sql = "select * from tovar where id=\"$ID\" ";
$res = mysqli_query($var, $sql) or exit("chybny dotaz");

if (mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $id = $data[0]['id'];
    $nazov = $data[0]['nazov'];
    $vyrobca = $data[0]['vyrobca'];
    $popis = $data[0]['popis'];
    $farba = $data[0]['farba'];
    $cena = $data[0]['cena'];
    $kod = $data[0]['kod'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>uprav</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <style>
            html, body {
                height: 100%;
                margin: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background-color: #f4f4f4;
            }

            .contact_form {
                max-width: 400px;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 15px; /* Add gap between form elements */
                margin-bottom: 20px;
            }

            label {
                width: 48%;
                margin-bottom: 8px;
                font-weight: bold;
            }

            input {
                width: calc(48% - 5px); /* Adjust the width to make room for gap */
                padding: 10px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                width: 100%;
                background-color: #007bff;
                color: #fff;
                cursor: pointer;
                font-size: 16px;
                font-weight: bold;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </head>
    <body>
    <p align="left">
        <form class="contact_form" action="index.php?menu=12" method="post">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>" readonly>

            <label for="nazov">Nazov</label>
            <input type="text" name="nazov" id="nazov" value="<?php echo $nazov; ?>">

            <label for="vyrobca">Vyrobca</label>
            <input type="text" name="vyrobca" id="vyrobca" value="<?php echo $vyrobca; ?>">

            <label for="popis">Popis</label>
            <input type="text" name="popis" id="popis" value="<?php echo $popis; ?>">

            <label for="farba">Farba</label>
            <input type="text" name="farba" id="farba" value="<?php echo $farba; ?>">

            <label for="cena">Cena</label>
            <input type="text" name="cena" id="cena" value="<?php echo $cena; ?>">

            <label for="kod">Kod</label>
            <input type="text" name="kod" id="kod" value="<?php echo $kod; ?>">

            <input type="submit" name="edit_user_form" value="Odoslať">
        </form>
    </body>
    </html>
    <?php
} else {
    echo "Nepodarilo sa načítať dáta pre editovanie.";
}
?>
