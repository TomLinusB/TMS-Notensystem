<!DOCTYPE html>
<?php
include("TMS.php");
?>
<html> 
<?php
$db = mysqli_connect("intern.tms-hl.org", "if21-projekt-notensystem", "S7ycOerUgs7kvpm8", "if21-projekt-notensystem");
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>
<head>
	<meta charset="UTF-8" />
	<title></title> 
</head>
 
<body>
<h1>TMS-Notensystem</h1>

<p> 
<?php
echo "<b>Hier könnte ihre Bewertung stehen</b>";
?>
</p>
</body>
</html>
