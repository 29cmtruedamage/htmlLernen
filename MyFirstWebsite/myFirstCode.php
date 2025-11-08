<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .Links{
            padding: 50px;
            background-color: beige;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Impressum</h1>

    <div class="Links">
        <ul>
            <li><a href="index.php?page=start">Zurück zur Startseite</a></li>
            <li><a href="index.php?page=contacts">Zurück zu Kontakte</a></li>
        </ul>
    </div>
    <input type="text" id="eingabeFeld" placeholder="Schreibe etwas hier...">

  <!-- Button zum Speichern -->
  <button onclick="speichern()">Speichern</button>

  <!-- Bereich zur Anzeige -->
  <p id="anzeige"></p>

    <script>
    function speichern() {
      // Wert aus dem Eingabefeld holen
      let text = document.getElementById("eingabeFeld").value;

      // In einer Variable speichern (hier nur temporär)
      let gespeicherterText = text;

      // Zur Kontrolle ausgeben
      document.getElementById("anzeige").innerText = "Gespeichert: " + gespeicherterText;

      // (Optional: auch in der Konsole anzeigen)
      console.log("Gespeicherter Wert:", gespeicherterText);
    }
  </script>
</body>
</html>