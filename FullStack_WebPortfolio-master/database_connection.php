<?php 
$dbHost = "localhost";
$dbUser = "shankars_root";
$dbPassword = "Gibbo@1996";
$dbName = "shankars_wdm";
try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} 
catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

?>

