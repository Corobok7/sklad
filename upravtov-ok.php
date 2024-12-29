<?php
include ("config.php");
include("config2.php");
include("config3.php");
$id = $_POST["id"]; 
$nazov =$_POST["nazov"]; 
$vyrobca =$_POST["vyrobca"]; 
$popis=$_POST["popis"]; 
$farba=$_POST["farba"]; 
$cena=$_POST["cena"]; 
$kod=$_POST["kod"]; 

$local_conn = new mysqli($localhost, $user, $password, $db);

if ($local_conn->connect_error) {
    die("Connection failed to local DB: " . $local_conn->connect_error);
}

$local_sql = "UPDATE `tovar` SET nazov='".$nazov."', vyrobca='".$vyrobca."', popis='".$popis."', farba='".$farba."', cena='".$cena."', kod='".$kod."' WHERE id='".$id."'";
$local_stmt = $local_conn->prepare($local_sql);


if ($local_stmt === false) {
    die("Local prepare failed: " . $local_conn->error);
}


if (!$local_stmt->execute()) {
    echo "Local execute failed: " . $local_stmt->error;
}

$remote_sql = "UPDATE `tovar` SET nazov='".$nazov."', vyrobca='".$vyrobca."', popis='".$popis."', farba='".$farba."', cena='".$cena."', kod='".$kod."' WHERE id='".$id."'";

/*try {
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

    echo "Record successfully written to both local and remote DBs.";

} catch (Exception $e) {
  // Tu zapíšeme len SQL dotaz, ktorý sa nepodarilo vykonať
    $failed_sql = "UPDATE `tovar` SET nazov='".$nazov."', vyrobca='".$vyrobca."', popis='".$popis."', farba='".$farba."', cena='".$cena."', kod='".$kod."' WHERE id='".$id."'";
    file_put_contents('failed2.txt', $failed_sql, FILE_APPEND);
    echo "An error occurred: " . $e->getMessage();
}


// uzol 3

$remote_sql2 = "UPDATE `tovar` SET nazov='".$nazov."', vyrobca='".$vyrobca."', popis='".$popis."', farba='".$farba."', cena='".$cena."', kod='".$kod."' WHERE id='".$id."'";

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
    $failed_sql2 = "UPDATE `tovar` SET nazov='".$nazov."', vyrobca='".$vyrobca."', popis='".$popis."', farba='".$farba."', cena='".$cena."', kod='".$kod."' WHERE id='".$id."'";
    file_put_contents('failed3.txt', $failed_sql, FILE_APPEND);
    echo "An error occurred: " . $e->getMessage();
}
*/

echo '<div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4;">';
echo '<div style="text-align: center; border: 2px solid #007bff; padding: 20px; border-radius: 8px;">';
echo '<font color="black"><strong style="color: #007bff; font-size: 24px;">Uprava prebehla v poriadku!</strong></font>';
echo '</div>';
echo '</div>';




header('Refresh: 3; url=index.php?menu=8');

$local_stmt->close();
$local_conn->close();