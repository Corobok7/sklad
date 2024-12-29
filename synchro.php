<?php
// Synchro.php
include("config.php");
include("config2.php"); // uzol 2
include("config3.php"); // uzol 3

// Vytvorenie pripojenia k vzdialenej databáze
@$remote_conn = new mysqli($localhost, $user, $password, $db);

// Kontrola pripojenia k vzdialenej databáze
if ($remote_conn->connect_error) {
    die("Connection failed to remote DB: " . $remote_conn->connect_error);
}

// Načítanie príkazov zo súboru
@$filename = 'failed1.txt';
if (file_exists($filename) && is_readable($filename)) {
    // Kontrola, či je súbor prázdny
    if (filesize($filename) > 0) {
        $queries = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($queries) {
            foreach ($queries as $query) {
                // Odstráni koncový bodkočiarku pre konzistenciu
                $query = rtrim($query, ";");
                // Vykonanie príkazu
                if ($remote_conn->query($query) === TRUE) {
                    echo "Query executed successfully: " . $query . "\n";
                } else {
                    echo "Error executing query: " . $remote_conn->error . "\n";
                }
            }
            // Vymazanie obsahu súboru po úspešnej synchronizácii
            file_put_contents($filename, '');
        }
    } else {
        echo "The file failed1.txt is empty. Skipping to Node 2.\n";
    }
} else {
    echo "The file failed1.txt does not exist or is not readable.\n";
}

// Zatvorenie pripojenia
$remote_conn->close();


/*
// uzol 2
@$remote_conn2 = new mysqli($localhost2, $user2, $password2, $db2);
// Kontrola pripojenia k vzdialenej databáze
if ($remote_conn2->connect_error) {
    die("Connection failed to remote DB: " . $remote_conn2->connect_error);
}
// Kontrola dostupnosti uzla 2
if ($remote_conn2->ping()) {
    // Načítanie príkazov zo súboru
    @$filename2 = 'failed2.txt';
    if (file_exists($filename2) && is_readable($filename2)) {
        // Kontrola, či je súbor prázdny
        if (filesize($filename2) > 0) {
            $queries2 = file($filename2, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($queries2) {
                foreach ($queries2 as $query2) {
                    // Odstráni koncový bodkočiarku pre konzistenciu
                    $query2 = rtrim($query2, ";");
                    // Vykonanie príkazu
                    if ($remote_conn2->query($query2) === TRUE) {
                        echo "Query executed successfully: " . $query2 . "\n";
                    } else {
                        echo "Error executing query: " . $remote_conn2->error . "\n";
                    }
                }
                // Vymazanie obsahu súboru po úspešnej synchronizácii
                file_put_contents($filename2, '');
            }
        } else {
            echo "The file failed2.txt is empty. Skipping to Node 2.\n";
        }
    } else {
        echo "The file failed2.txt does not exist or is not readable.\n";
    }
} else {
    echo "Node 2 is offline. Skipping to Node 3.\n";
}

// Zatvorenie pripojenia
$remote_conn2->close();
*/
// uzol 3
@$remote_conn3 = new mysqli($localhost3, $user3, $password3, $db3);

// Kontrola pripojenia k vzdialenej databáze
if ($remote_conn3->connect_error) {
    die("Connection failed to remote DB: " . $remote_conn3->connect_error);
}

// Načítanie príkazov zo súboru
@$filename3 = 'failed3.txt';
if (file_exists($filename3) && is_readable($filename3)) {
    // Kontrola, či je súbor prázdny
    if (filesize($filename3) > 0) {
        $queries3 = file($filename3, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ($queries3) {
            foreach ($queries3 as $query3) {
                // Odstráni koncový bodkočiarku pre konzistenciu
                $query3 = rtrim($query3, ";");
                // Vykonanie príkazu
                if ($remote_conn3->query($query3) === TRUE) {
                    echo "Query executed successfully: " . $query3 . "\n";
                } else {
                    echo "Error executing query: " . $remote_conn3->error . "\n";
                }
            }
            // Vymazanie obsahu súboru po úspešnej synchronizácii
            file_put_contents($filename3, '');
        }
    } else {
        echo "The file failed3.txt is empty.\n";
    }
} else {
    echo "The file failed3.txt does not exist or is not readable.\n";
}

// Zatvorenie pripojenia
$remote_conn3->close();
?>
