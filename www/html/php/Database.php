<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Test Page, Java Script, Data, PHP, HTML5">
    <meta name="description" content="Draw with Java Script">
    <title>Draw with Java Script</title>
    <link rel="stylesheet" href="../css/simpleDraw.css">
    <script src="../js/simpleDraw.js"></script>
  </head>
  <body>
    <h1>Data Base manipulation with PHP</h1>
    <section>
      <h2>Information about the server</h2>
      <?php
      echo '<H1>PHP Test page - nonimi.test</H1>';
      echo '<p>PHP SELF: ';
      echo $_SERVER['PHP_SELF'];
      echo "<br>";
      echo 'SERVER NAME: ';
      echo $_SERVER['SERVER_NAME'];
      echo "<br>";
      echo 'HTTP HOST: ';
      echo $_SERVER['HTTP_HOST'];
      echo "<br>";
      echo 'HTTP REFERER: ';
      echo $_SERVER['HTTP_REFERER'];
      echo "<br>";
      echo 'HTTP SERVER AGENT: ';
      echo $_SERVER['HTTP_USER_AGENT'];
      echo "<br>";
      echo 'SCRIPT NAME: ';
      echo $_SERVER['SCRIPT_NAME'];
      echo "<br>";
      ?>
    </section>

    <section>
      <h2>Data Base Creation</h2>
      <?php
      $servername = "localhost";
      $username = "vipula";
      $password = "H0rapassword";

      // Create connection to MySQL
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "<p>Connection to MySQL  Failed</p>";
      }
      echo "<p>Connected successfully</p>";
      ?>

      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      DataBase Name: <input type="text" name="fname" value='John'>
      <input type="Create">
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
           // collect value of input field
           $name = htmlspecialchars($_REQUEST['fname']);
           $age = htmlspecialchars($_REQUEST['fage']);
           if (empty($name)) {
               echo "Name is empty....";
           } else {
               echo '<p> Database Name : ',$name, '<br>';
               // Create database
               $sql = "CREATE DATABASE myDB";
               if ($conn->query($sql) === TRUE) {
                 echo "<p> Database created successfully</p>";
               } else {
                 echo "<p>Error creating database: " . $conn->error . "</p>";
               }

               echo "<p>Closing Connectoin</p>";
               $conn->close();
           }
       }
       ?>
    </section>
  </body>
</html>
