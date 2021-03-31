<?php 
session_start(); // Session muss am Anfang der Datei gestartet werden
$servername = "localhost";
$username = "root";
$password = "rootpasswort";
$db = "if21-projekt-notensystem";

$conn = mysqli_connect($servername, $username, $password, $db); // Verbindet mit der Datenbank

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if (empty($_POST["name"]) || empty("passwort")) {header("LOCATION: index.php");} // Linkt einen zurück nach index.php, wenn Name oder Passwort leer sind.
else {
  $name = $_POST["name"];
  $sql = "SELECT `Schüler-ID`, Passwort FROM schüler WHERE `Schüler-Name`='$name'";
  $ergebnis = mysqli_query($conn, $sql); // Gibt ID und Passwort des Schülers aus der Datenbank wieder.
  
  if (mysqli_num_rows($ergebnis) > 0) {
    $daten = mysqli_fetch_assoc($ergebnis); // Konvertiert zu auslesbaren Daten
    if (password_verify($_POST["passwort"], $daten["Passwort"])) { // Guckt ob Passwort richtig ist
      $_SESSION["nutzer_id"] = $daten["Schüler-ID"]; // Wenn Passwort richtig war, wird die ID des Schülers in der Session festgehalten
      header("LOCATION: noten.php");
    } else {
      header("LOCATION: index.php"); // Linkt einen zurück nach index.php, wenn das Passwort falsch ist.
    }
  } else {
    header("LOCATION: index.php"); // Linkt einen zurück nach index.php, wenn der Nutzername nicht existiert.
  }
}

mysqli_close($conn); // Beendet die Verbindung zur Datenbank
?>