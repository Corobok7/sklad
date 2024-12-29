<?php
include ("config.php");
//include("config2.php");
include("config3.php");
$nazov =$_POST["nazov"]; 
$vyrobca =$_POST["vyrobca"]; 
$popis=$_POST["popis"]; 
$farba=$_POST["farba"]; 
$cena=$_POST["cena"]; 
$kod=$_POST["kod"];
$color = "Pridal server 1";

set_time_limit(29);

$id = date('YmdHis', time());

try {
    // Pripojenie na lokálnu databázu
    $local_conn = new mysqli($localhost, $user, $password, $db);

    if ($local_conn->connect_error) {
        throw new Exception("<font color=\"red\"><br><strong>Neúspešné pripojenie na lokálnu DB: </strong>" . $local_conn->connect_error);
    }

    // SQL príkaz pre lokálnu databázu
    $local_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')";
    $local_stmt = $local_conn->prepare($local_sql);

    if ($local_stmt === false) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do lokálnej databázy zlyhalo: </strong>" . $local_conn->error);
    }

    if (!$local_stmt->execute()) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do lokálnej databázy zlyhalo </strong>" . $local_stmt->error);
    }

    $local_stmt->close();
    $local_conn->close();

    echo "<font color=\"green\"><br><strong>Úspešne zapísané na uzol číslo 1. </strong> ";

} catch (Exception $e) {
    // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')" . PHP_EOL;
    file_put_contents('failed1.txt', $failed_sql, FILE_APPEND);
    echo "<font color=\"red\"><br><strong>Nastala chyba pri zápise na prvý uzol: </strong> " . $e->getMessage();
}


$remote_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')";

try {
    // Pokus o pripojenie k vzdialenej databáze
    $remote_conn = new mysqli($localhost2, $user2, $password2, $db2);

    // Kontrola pripojenia k vzdialenej databáze
    if ($remote_conn->connect_error) {
        throw new Exception("<font color=\"red\"><br><strong>Neúspešné pripojenie na uzol čislo 2 DB: </strong>" . $remote_conn->connect_error);
    }

    // Pripravenie SQL príkazu pre vzdialenú databázu
    $remote_stmt = $remote_conn->prepare($remote_sql);

    // Kontrola, či je statement správne pripravený
    if ($remote_stmt === false) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do uzla čislo 2 databázy zlyhalo: </strong>" . $remote_conn->error);
    }

    // Vykonanie príkazu vzdialenej databáze
    if (!$remote_stmt->execute()) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do uzla čislo 2 databázy zlyhalo: </strong>" . $remote_stmt->error);
    }

    // Zatvorenie príkazu a pripojenia k vzdialenej databáze
    $remote_stmt->close();
    $remote_conn->close();

    echo "<font color=\"green\"><br><strong>Úspešne zapísané na uzol číslo 2. </strong> ";

} catch (Exception $e) {
  // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')" . PHP_EOL;
    file_put_contents('failed2.txt', $failed_sql, FILE_APPEND);
    echo "<font color=\"red\"><br><strong>Nastala chyba pri zápise na uzol číslo 2: </strong>" . $e->getMessage();
}

$remote2_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')";

try {
    // Pokus o pripojenie k tretiemu serveru
    $remote2_conn = new mysqli($localhost3, $user3, $password3, $db3);

    // Kontrola pripojenia k tretiemu serveru
    if ($remote2_conn->connect_error) {
        throw new Exception("<font color=\"red\"><br><strong>Neúspešné pripojenie na uzol číslo 3 DB: </strong>" . $remote2_conn->connect_error);
    }

    // Pripravenie SQL príkazu pre tretiu databázu
    $remote2_stmt = $remote2_conn->prepare($remote2_sql);

    // Kontrola, či je statement správne pripravený
    if ($remote2_stmt === false) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do uzla čislo 3 databázy zlyhalo: </strong> " . $remote2_conn->error);
    }

    // Vykonanie príkazu tretiej databáze
    if (!$remote2_stmt->execute()) {
        throw new Exception("<font color=\"red\"><br><strong>Pridanie do uzla čislo 3 databázy zlyhalo: </strong>" . $remote2_stmt->error);
    }

    // Zatvorenie príkazu a pripojenia k tretiej databáze
    $remote2_stmt->close();
    $remote2_conn->close();

    echo "<font color=\"green\"><br><strong>Úspešne zapísané na uzol číslo 3. </strong> ";

} catch (Exception $e) {
    // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql = "insert into `tovar` (`id`,`nazov`,`vyrobca`,`popis`,`farba`,`cena`,`kod`,`color`) values ('$id','$nazov','$vyrobca','$popis','$farba','$cena','$kod','$color')" . PHP_EOL;
    file_put_contents('failed3.txt', $failed_sql, FILE_APPEND);
    echo "<font color=\"red\"><br><strong>Nastala chyba pri zápise na uzol čislo 3: </strong> " . $e->getMessage();
}




echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4;">';
echo '<div style="text-align: center; border: 2px solid #007bff; padding: 20px; border-radius: 8px;">';
echo '<font color="black"><strong style="color: #007bff; font-size: 24px;">Pridanie prebehlo úspešne!</strong></font>';
echo '</div>';

header('Refresh: 3; url=index.php?menu=7');
?>