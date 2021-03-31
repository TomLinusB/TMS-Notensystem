<?php
session_start(); // Session muss am Anfang der Datei gestartet werden
$servername = "localhost";
$username = "root";
$password = "rootpasswort";
$db = "if21-projekt-notensystem";

$conn = mysqli_connect($servername, $username, $password, $db); // Verbindet mit der Datenbank

/* 
  Beispielaufbau von $noten

  | Kurs (Schlüssel)  |  Noten nach Halbjahr (Wert)   |
  |-------------------|-------------------------------|
  | if21              | [13, 12, 4, 2, 3, 10]         |
  | Mathe             | [10, 11, 9, 13, 12, 3]        |
*/
$noten = array();

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(empty($_SESSION['nutzer_id'])) {
    header("LOCATION: index.php"); //Geht zurück auf Hauptseite, wenn nicht angemeldet
} else {
  $id = $_SESSION['nutzer_id'];
  $sql = "SELECT Kurs, Note, Halbjahr FROM schüleransicht WHERE `Schüler-ID`=$id ORDER BY Halbjahr ASC";
  $ergebnis = mysqli_query($conn, $sql);  // Gibt Noten des Schülers aus der Datenbank

  // Fügt Daten aus der Tabelle in $noten ein
  while($zeile = mysqli_fetch_assoc($ergebnis)) {
    $kurs = $zeile['Kurs'];
    $halbjahr = $zeile['Halbjahr'];
    if (!array_key_exists($kurs, $noten)) {
      $noten[$kurs] = array();
    }
    $noten[$kurs][$halbjahr] = $zeile["Note"];
  }
}

mysqli_close($conn); 
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Noten</title>
</head>
<body>
  <h1>Noten</h1>
  <!-- Kopiert und angepasst aus https://www.youtube.com/watch?v=P4QY81Ym1rE -->
  <div style="width: 75%;">
		<canvas id="myChart"></canvas></div>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          "E erstes Halbjahr", "E zweites Halbjahr", "Q1 erstes Halbjahr", "Q1 zweites Halbjahr","Q2 erstes Halbjahr","Q2 zweites Halbjahr",
        ],
        datasets: [
          <?php foreach ($noten as $kursname => $kurs) { ?>
          {
            label: '<?php echo $kursname ?>',
            data: [<?php
              foreach ($kurs as $note) {
                echo $note . ', ';
              }  
            ?>],
            lineTension: 0,
        },
        <?php } ?>
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    suggestedMin: 15,
                    suggestedMax: 15,
                    stepSize: 1
                }
            }]
            
        },
        
    }
});
	</script>
</body>
</html>