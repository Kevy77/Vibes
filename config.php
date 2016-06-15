
<?php
$servername = "db629255639.db.1and1.com";
$username = "dbo629255639";
$password = "admin75";
$dbname = "db629255639";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$bd = new PDO('mysql:host=db629255639.db.1and1.com;dbname=db629255639', 'dbo629255639', 'admin75');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

mysql_connect("db629255639.db.1and1.com", "dbo629255639", "admin75"); // Connexion à la base de données
mysql_select_db("db629255639");

?>
