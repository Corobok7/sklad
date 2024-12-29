<?php
include("config.php");
include("config2.php");
include("config3.php");
$k =$_GET["k"]; 

$var = mysqli_connect($localhost, $user, $password, $db) or die("connect error");

$local_conn = new mysqli($localhost, $user, $password, $db);

if ($local_conn->connect_error) {
    die("Connection failed to local DB: " . $local_conn->connect_error);
}


$local_sql = "Delete FROM tovar WHERE id = $k";
$local_stmt = $local_conn->prepare($local_sql);


if ($local_stmt === false) {
    die("Local prepare failed: " . $local_conn->error);
}


if (!$local_stmt->execute()) {
    echo "Local execute failed: " . $local_stmt->error;
}


$local_stmt->close();
$local_conn->close();


$remote_sql = "Delete FROM tovar WHERE id = $k";
/*
try {
    // Pokus o pripojenie k vzdialenej databáze
    $remote_conn = new mysqli($localhost2, $user2, $password2, $db2);

    // Kontrola pripojenia k vzdialenej databáze
    if ($remote_conn->connect_error) {
        throw new Exception("Connection failed to remote DB: " . $remote_conn->connect_error);
    }

    // Pripravenie SQL príkazu pre vzdialenú databázu
    $remote_stmt = $remote_conn->prepare($remote_sql);

    // Kontrola, či je statement správne pripravený
    if ($remote_stmt === false) {
        throw new Exception("Remote prepare failed: " . $remote_conn->error);
    }

    // Vykonanie príkazu vzdialenej databáze
    if (!$remote_stmt->execute()) {
        throw new Exception("Remote execute failed: " . $remote_stmt->error);
    }

    // Zatvorenie príkazu a pripojenia k vzdialenej databáze
    $remote_stmt->close();
    $remote_conn->close();

    echo "Record successfully deleted to both local and remote DBs.";

} catch (Exception $e) {
  // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql = "Delete FROM tovar WHERE id = $k" . PHP_EOL;
    file_put_contents('failed2.txt', $failed_sql, FILE_APPEND);
    echo "An error occurred: " . $e->getMessage();
}

*/
// uzol 3

$remote_sql2 = "Delete FROM tovar WHERE id = $k";

try {
    // Pokus o pripojenie k vzdialenej databáze
    $remote_conn2 = new mysqli($localhost3, $user3, $password3, $db3);

    // Kontrola pripojenia k vzdialenej databáze
    if ($remote_conn2->connect_error) {
        throw new Exception("Connection failed to remote DB: " . $remote_conn2->connect_error);
    }

    // Pripravenie SQL príkazu pre vzdialenú databázu
    $remote_stmt2 = $remote_conn2->prepare($remote_sql);

    // Kontrola, či je statement správne pripravený
    if ($remote_stmt2 === false) {
        throw new Exception("Remote prepare failed: " . $remote_conn2->error);
    }

    // Vykonanie príkazu vzdialenej databáze
    if (!$remote_stmt2->execute()) {
        throw new Exception("Remote execute failed: " . $remote_stmt2->error);
    }

    // Zatvorenie príkazu a pripojenia k vzdialenej databáze
    $remote_stmt2->close();
    $remote_conn2->close();

    echo "Record successfully written to both local and remote DBs.";

} catch (Exception $e) {
  // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql2 = "Delete FROM tovar WHERE id = $k";
    file_put_contents('failed3.txt', $failed_sql, FILE_APPEND);
    echo "An error occurred: " . $e->getMessage();
}



echo "<font color=\"black\"><br><strong>Údaje úspešne vymazané! </strong>";
echo "";
header('Refresh: 3; url=index.php?menu=8');





?>