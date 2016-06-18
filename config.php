
<?php
$servername = "benowebcxsvibes.mysql.db";
$username = "benowebcxsvibes";
$password = "Apache0690";
$dbname = "benowebcxsvibes";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$bd = new PDO('mysql:host=benowebcxsvibes.mysql.db;dbname=benowebcxsvibes', 'benowebcxsvibes', 'Apache0690');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};

mysql_connect("benowebcxsvibes.mysql.db", "benowebcxsvibes", "Apache0690"); // Connexion à la base de données
mysql_select_db("benowebcxsvibes");

?>
