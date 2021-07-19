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
      echo "<p>PHP SELF: ";
      echo $_SERVER["PHP_SELF"];
      echo "<br>";
      echo "SERVER NAME: ";
      echo $_SERVER["SERVER_NAME"];
      echo "<br>";
      echo "HTTP HOST: ";
      echo $_SERVER["HTTP_HOST"];
      echo "<br>";
      echo "HTTP REFERER: ";
      echo $_SERVER["HTTP_REFERER"];
      echo "<br>";
      echo "HTTP SERVER AGENT: ";
      echo $_SERVER["HTTP_USER_AGENT"];
      echo "<br>";
      echo "SCRIPT NAME: ";
      echo $_SERVER["SCRIPT_NAME"];
      echo "<br>";
      ?>
    </section>

    <section>
      <h2>Data Base Creation</h2>
      <?php
      $servername = "localhost";
      $username = "sensor";
      $password = "Truztm3***";

      // Create connection to MySQL
      $conn = new mysqli($servername, $username, $password);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "<p>Connection to MySQL  Failed</p>";
      }
      echo "<p>Connected to MySQL service.</p>";
      ?>
	  <h4>We can create a new data base using this section.</h4>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      DataBase Name: <input type="text" name="fDBname" value="MyDB">
      <input type="hidden" name="buttonId" value="createDB">
      <input type="submit" value="Create BD">
      </form>
    </section>

	<section>
	  <h4>We can Select an existing Data Base using this section.</h4>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      DataBase Name: <input type="text" name="fDBname" value="MyDB">
      <input type="hidden" name="buttonId" value="selectDB">
      <input type="submit" value="Select DB">
      </form>
	</section>


	<section>
	  <h4>We can create a new Table in the Dat Base using this section.</h4>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      DataBase Name: <input type="text" name="fDBname" value="MyDB">
      Table Name: <input type="text" name="fTableName" value="MyTable">
      <input type="hidden" name="buttonId" value="createTable">
      <input type="submit" value="Create Table">
      </form>
	</section>


	<section>
	  <h4>DataBase Close.</h4>
      <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <input type="hidden" name="buttonId" value="closeSQL">
      <input type="submit" value="CLOSE">
      </form>
	</section>

	<?php
	//Function that takes care of the button press	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   $button_ID = htmlspecialchars($_REQUEST["buttonId"]);
		switch ($button_ID) {
			case "closeSQL":
				echo "<p>Connection Closing..<br></p>";
				$conn->close(); 
				break;
			case "createDB":
				$name = htmlspecialchars($_REQUEST["fDBname"]);
				if (empty($name)) {
				   echo "<p>Database Name is empty....<br>";
				} 
				else {
				   echo "<p> Database Name : ",$name, "<br>";
				   // Create database
				   $sql = "CREATE DATABASE ".$name;
				   if ($conn->query($sql) === TRUE) {
					 echo "<p> Database created successfully</p>";
				   } 
				   else {
					 echo "<p>Error creating database: " . $conn->error . "</p>";
				   }
				}		
			break;
			case "selectDB":
				$name = htmlspecialchars($_REQUEST["fDBname"]);
				echo "<p>Select DB..", $name, "<br></p>";
				$sql = "USE ". $name ." ";
				echo $sql;
				if ($conn->query($sql) === TRUE) {
				  echo "DataBase ". $name . " used successfully";
				} else {
				  echo "Error creating table: " . $conn->error;
				}
				break;
			case "createTable":
				$name = htmlspecialchars($_REQUEST["fDBname"]);
				$Table = htmlspecialchars($_REQUEST["fTableName"]);
				echo "<p>Creating Table ",$Table, " in ",$name, "<br></p>";
				
				$sql = "CREATE TABLE `".$name."`.`".$Table."` (
				id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				Name VARCHAR(30) NOT NULL,
				Type VARCHAR(30) NOT NULL,
				Location VARCHAR(50)
				)";
				echo $sql;
				if ($conn->query($sql) === TRUE) {
				  echo "Table " . $Table . " created successfully";
				} else {
				  echo "Error creating table: " . $conn->error;
				}
				break;

			default:
				echo "<p>ERROR - Button ID unknown<br>";
				break;
		}
	}
	else	{
		unset($_REQUEST["buttonId"]);
	}
	unset($_REQUEST["buttonId"]);
	?>

	<section>
		<a href="./Database.php">Reload this page<br></a>
		<a href="../index.html">Back to Home page<br></a>
	</section>
	
  </body>
</html>
