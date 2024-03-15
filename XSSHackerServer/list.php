<?php
// Lese den Inhalt der JSON-Datei
$fileContent = file_get_contents("cookies.json");

// Dekodiere das JSON-Array
$cookiesData = json_decode($fileContent, true);

// Überprüfe, ob das Dekodieren erfolgreich war
if ($cookiesData !== null) {
  // Durchlaufe die Daten und zeige sie an
  foreach ($cookiesData as $index => $data) {
    echo "Eintrag " . ($index + 1) . ":<br>";
    echo "Username: " . $data['username'] . "<br>";
    echo "Password: " . $data['password'] . "<br>";

    // Zeige Extras an, wenn vorhanden
    if (!empty($data['extras'])) {
      echo "Extras:<br>";
      foreach ($data['extras'] as $key => $value) {
        echo "$key: $value<br>";
      }
    }
    echo "<br>";
  }
} else {
  // Wenn das Dekodieren fehlschlägt, eine Fehlermeldung anzeigen
  echo "Fehler beim Lesen der Daten.";
}
?>