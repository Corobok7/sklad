<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body, html {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      width: 100%;
      color: #343a40; 
      height: 100%;
      overflow-x: hidden;
    }

    header {
      background: url('venok.png');
	  background-size: contain;
      width: 100%;
      background-color: #007bff; 
      text-align: center;
      padding: 10px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
    }

    h1 {
      font-size: 2em;
      color: #ffffff; 
	  margin-top: 50px;
	  margin-bottom: 10px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
      display: inline-block;
      padding: 1px;
    }

    main {
      width: 100%;
      display: flex;
      flex-direction: column; 
      min-height: 100vh; 
    }

    nav {
      background-color: #ffffff;
      width: 100%; 
      padding: 20px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
    }

    nav a {
      display: inline-block;
      margin: 0 10px;
      text-decoration: none;
      color: #343a40;
      padding: 10px 20px;
      border: 1px solid #007bff;
      border-radius: 5px;
      transition: background-color 0.3s, color 0.3s;
    }

    nav a:hover {
      background-color: #007bff;
      color: #fff;
    }

    nav a:active {
      background-color: #0056b3;
      color: #fff;
    }

    section {
      width: 100%;
      background: url('snow.png') center/cover fixed;
      padding: 30px;
      flex-grow: 1;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center; /
    }

    .important {
      font-weight: bold;
      color: #007bff;
    }

    @media only screen and (max-width: 768px) {
      main {
        flex-direction: column;
      }

      nav {
        width: 100%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
      }
      
      section {
        padding: 15px; 
      }
    }
  </style>
</head>
<body>
  <header>
    <h1>Šťastné a veselé Vianoce</h1>
  </header>

  <main>
    <nav>
      <a href="?menu=7">Pridanie tovaru</a>
      <a href="?menu=8">Vypis tovarov</a>
      <a href="?menu=9">Vyhladanie tovaru</a>
      <a href="?menu=11">Synchronizacia</a>
    </nav>

    <section>
      <div class="important">
        <?php
          $m = $_GET["menu"];
          if (!isset($m) || ($m < 1 || $m > 13)) $m = 1;
          switch ($m) {
            case 3:
              include("vypis-DB.php");
              break;
            case 5:
              include("form-hladaj.php");
              break;
            case 6:
              include("hladaj.php");
              break;
            case 7:
              include("pridaj-tovar.php");
              break;
            case 8:
              include("vypis-tovar.php");
              break;
            case 9:
              include("hladaj-tovar-cena.php");
              break;
            case 10:
              include("vypis-tovar-cena.php");
              break;
            case 11:
              include("synchro.php");
              break;
            case 12:
              include("upravtov-ok.php");
              break;
            case 13:
              include("upravtov.php");
              break;
            default:
              include("vypis-tovar.php");
              break;
          }
        ?>
      </div>
    </section>
  </main>
</body>
</html>
