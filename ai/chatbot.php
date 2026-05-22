<?php
include "init1.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header("Content-Type: application/json; charset=UTF-8");

    $data = json_decode(file_get_contents("php://input"), true);
    $message = $data["message"] ?? "";

    function normalizeText($text) {
        $text = strtolower($text);

        $diacritice = [
            'ă' => 'a', 'â' => 'a', 'î' => 'i',
            'ș' => 's', 'ş' => 's',
            'ț' => 't', 'ţ' => 't'
        ];

        return strtr($text, $diacritice);
    }

    function getPrediction($medieElev, $row) {
        $payload = [
            "medie_elev" => floatval($medieElev),
            "sector" => strval($row["sector"]),
            "profil" => strval($row["profil"]),
            "specializare" => strval($row["specializare"]),
            "limba" => strval($row["limba"]),
            "bilingv" => strval($row["bilingv"] ?? ""),
            "medie_liceu" => floatval($row["medie_actuala"])
        ];

        $ch = curl_init("https://eliceu-ai.onrender.com/predict");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            curl_close($ch);

            return [
                "probabilitate" => "N/A",
                "nivel" => "AI indisponibil"
            ];
        }

        curl_close($ch);

        $prediction = json_decode($response, true);

        if (!$prediction || !isset($prediction["nivel"])) {
            return [
                "probabilitate" => "N/A",
                "nivel" => "AI indisponibil"
            ];
        }

        return $prediction;
    }

    $text = normalizeText($message);

    if (
        str_contains($text, "salut") ||
        str_contains($text, "buna") ||
        str_contains($text, "hei")
    ) {
        echo json_encode([
            "reply" => "Bună! Sunt asistentul AI Eliceu. Îți pot recomanda licee și pot estima șansele tale de admitere folosind un model de Machine Learning."
        ]);
        exit;
    }

    if (
        str_contains($text, "ce este eliceu") ||
        str_contains($text, "despre site") ||
        str_contains($text, "ce face site")
    ) {
        echo json_encode([
            "reply" => "Eliceu este o platformă care ajută elevii să aleagă liceul potrivit, folosind date despre licee, medii, profiluri, specializări și un model AI pentru estimarea șanselor de admitere."
        ]);
        exit;
    }

    $profil = "";
    $sector = "";
    $limba = "";
    $bilingv = "";
    $specializare = "";
    $medieElev = 0;
    $faraExamen = false;

    if (str_contains($text, "real")) {
        $profil = "Real";
    }

    if (str_contains($text, "uman") || str_contains($text, "umanist")) {
        $profil = "Umanist";
    }

    if (str_contains($text, "tehnic")) {
        $profil = "Tehnic";
    }

    if (str_contains($text, "servicii")) {
        $profil = "Servicii";
    }

    if (preg_match('/sector(?:ul)?\s*(\d)/', $text, $match)) {
        $sector = $match[1];
    }

    if (preg_match('/(?:media|am media|cu media|medie)\s*(\d+([.,]\d+)?)/', $text, $match)) {
        $medieElev = floatval(str_replace(",", ".", $match[1]));
    }

    if ($medieElev == 0 && preg_match('/(\d+([.,]\d+)?)/', $text, $match)) {
        $possibleMedie = floatval(str_replace(",", ".", $match[1]));

        if ($possibleMedie >= 1 && $possibleMedie <= 10) {
            $medieElev = $possibleMedie;
        }
    }

    if (str_contains($text, "mate") || str_contains($text, "info") || str_contains($text, "informatica")) {
        $specializare = "Matematică-Informatică";
    }

    if (str_contains($text, "filologie")) {
        $specializare = "Filologie";
    }

    if (str_contains($text, "stiinte ale naturii") || str_contains($text, "natura")) {
        $specializare = "Științe ale Naturii";
    }

    if (str_contains($text, "stiinte sociale") || str_contains($text, "sociale")) {
        $specializare = "Științe Sociale";
    }

    if (str_contains($text, "romana")) {
        $limba = "Limba română";
    }

    if (str_contains($text, "maghiara")) {
        $limba = "Limba maghiară";
    }

    if (str_contains($text, "engleza")) {
        $bilingv = "Limba engleză";
    }

    if (str_contains($text, "germana")) {
        $bilingv = "Limba germană";
    }

    if (str_contains($text, "italiana")) {
        $bilingv = "Limba italiană";
    }

    if (str_contains($text, "spaniola")) {
        $bilingv = "Limba spaniolă";
    }

    if (str_contains($text, "portugheza")) {
        $bilingv = "Limba portugheză";
    }

    if (str_contains($text, "fara examen")) {
        $faraExamen = true;
    }

    if ($medieElev == 0) {
        echo json_encode([
            "reply" => "Pentru predicția AI am nevoie să îmi spui media ta. Exemplu: «Am media 9.20 și vreau mate-info în sectorul 6»."
        ]);
        exit;
    }

    $sql = "
        SELECT
            l.id_liceu,
            l.nume,
            l.tip,
            l.sector,
            l.adresa,
            s.profil,
            s.specializare,
            s.limba,
            s.bilingv,
            s.medie_actuala
        FROM licee l
        JOIN specializari s ON l.id_liceu = s.id_liceu
        WHERE 1=1
    ";

    $params = [];

    if ($profil !== "") {
        $sql .= " AND s.profil = :profil";
        $params[":profil"] = $profil;
    }

    if ($sector !== "") {
        $sql .= " AND l.sector = :sector";
        $params[":sector"] = $sector;
    }

    if ($specializare !== "") {
        $sql .= " AND s.specializare = :specializare";
        $params[":specializare"] = $specializare;
    }

    if ($limba !== "") {
        $sql .= " AND s.limba = :limba";
        $params[":limba"] = $limba;
    }

    if ($bilingv !== "") {
        $sql .= " AND s.bilingv LIKE :bilingv";
        $params[":bilingv"] = "%$bilingv%";
    }

    if ($faraExamen) {
        $sql .= " AND s.bilingv LIKE :fara";
        $params[":fara"] = "%fără examen%";
    }

    $sql .= " ORDER BY ABS(s.medie_actuala - :medieElev) ASC LIMIT 8";
    $params[":medieElev"] = $medieElev;

    $stmt = $con->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($results) === 0) {
        echo json_encode([
            "reply" => "Nu am găsit licee potrivite pentru criteriile introduse. Încearcă un profil mai general sau alt sector."
        ]);
        exit;
    }

    $reply = "Am găsit " . count($results) . " rezultate analizate cu AI:<br><br>";

    foreach ($results as $index => $row) {
        $prediction = getPrediction($medieElev, $row);

        $reply .= "<div class='result-card'>";
        $reply .= "<strong>" . ($index + 1) . ". " . htmlspecialchars($row["tip"] . " " . $row["nume"]) . "</strong><br>";
        $reply .= "Sector: " . htmlspecialchars($row["sector"]) . "<br>";
        $reply .= "Profil: " . htmlspecialchars($row["profil"]) . "<br>";
        $reply .= "Specializare: " . htmlspecialchars($row["specializare"]) . "<br>";
        $reply .= "Limba: " . htmlspecialchars($row["limba"]) . "<br>";
        $reply .= "Medie liceu: " . htmlspecialchars($row["medie_actuala"]) . "<br>";

        if ($row["bilingv"] !== null && $row["bilingv"] !== "") {
            $reply .= "Bilingv: " . htmlspecialchars($row["bilingv"]) . "<br>";
        }

        $reply .= "<strong>Predicție AI: " . htmlspecialchars($prediction["nivel"]) . "</strong><br>";

        if ($prediction["probabilitate"] !== "N/A") {
            $reply .= "Probabilitate estimată: " . htmlspecialchars($prediction["probabilitate"]) . "%<br>";
        }

        $reply .= "</div>";
    }

    echo json_encode(["reply" => $reply]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chatbot AI - Eliceu</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&display=swap" rel="stylesheet">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: #ffffff;
      color: #1f1f1f;
    }

    header {
      width: 100%;
      height: 72px;
      background: #9661b8;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 42px;
    }

    .logo-area {
      display: flex;
      align-items: center;
      gap: 16px;
    }

    .menu {
      font-size: 32px;
      color: #ffffff;
      font-weight: 900;
      background: transparent;
      border: 0;
      cursor: pointer;
    }

    .logo {
      font-size: 34px;
      font-weight: 900;
      color: #ffe34d;
      letter-spacing: -1px;
    }

    nav {
      display: flex;
      gap: 38px;
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      font-size: 13px;
      font-weight: 900;
    }

    .sidebar {
      position: fixed;
      top: 0;
      left: -320px;
      width: 320px;
      height: 100vh;
      background: linear-gradient(180deg, #8c63b3 0%, #6f4796 100%);
      z-index: 2000;
      padding: 110px 40px;
      display: flex;
      flex-direction: column;
      gap: 28px;
      transition: 0.35s;
      box-shadow: 6px 0 30px rgba(0,0,0,0.18);
    }

    .sidebar.active {
      left: 0;
    }

    .sidebar a {
      text-decoration: none;
      color: #ffffff;
      font-size: 22px;
      font-weight: 900;
    }

    .sidebar a:hover {
      color: #ffe34d;
      transform: translateX(8px);
    }

    .close-btn {
      position: absolute;
      top: 28px;
      right: 28px;
      background: transparent;
      border: none;
      font-size: 34px;
      cursor: pointer;
      color: #ffffff;
      font-weight: 900;
    }

    .chat-page {
      min-height: 100vh;
      padding: 150px 90px 120px;
      background: #f7f1ff;
      display: grid;
      grid-template-columns: 1fr 460px;
      gap: 80px;
      align-items: center;
    }

    .chat-info h1 {
      font-size: 54px;
      line-height: 1.08;
      font-weight: 900;
      color: #4c2568;
      margin-bottom: 26px;
      letter-spacing: -1px;
    }

    .chat-info p {
      max-width: 720px;
      font-size: 19px;
      font-weight: 600;
      line-height: 1.7;
      margin-bottom: 35px;
      color: #333;
    }

    .examples {
      display: flex;
      flex-direction: column;
      gap: 14px;
      max-width: 700px;
    }

    .example {
      background: #ffffff;
      padding: 18px 24px;
      border-radius: 18px;
      font-size: 17px;
      font-weight: 900;
      color: #3c2448;
      box-shadow: 0 12px 28px rgba(0,0,0,0.08);
    }

    .chatbot {
      height: 650px;
      background: #ffffff;
      border-radius: 28px;
      overflow: hidden;
      box-shadow: 0 18px 45px rgba(0,0,0,0.18);
      display: flex;
      flex-direction: column;
    }

    .chatbot-header {
      background: #9661b8;
      color: #ffffff;
      padding: 26px;
    }

    .chatbot-header h2 {
      font-size: 27px;
      font-weight: 900;
      margin-bottom: 6px;
    }

    .chatbot-header p {
      font-size: 15px;
      font-weight: 600;
      opacity: 0.95;
    }

    .messages {
      flex: 1;
      padding: 24px;
      background: #fbf8ff;
      overflow-y: auto;
    }

    .msg {
      max-width: 88%;
      padding: 15px 18px;
      border-radius: 18px;
      margin-bottom: 16px;
      font-size: 15px;
      line-height: 1.5;
      font-weight: 500;
    }

    .bot {
      background: #eee3f4;
      color: #2c1a3c;
      border-bottom-left-radius: 5px;
    }

    .user {
      background: #ffe34d;
      color: #24142f;
      margin-left: auto;
      border-bottom-right-radius: 5px;
    }

    .result-card {
      background: #ffffff;
      border-left: 5px solid #9661b8;
      padding: 14px;
      border-radius: 14px;
      margin-bottom: 14px;
      box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    }

    .chat-input {
      display: flex;
      gap: 12px;
      padding: 16px;
      border-top: 1px solid #ded5e8;
      background: #ffffff;
    }

    .chat-input input {
      flex: 1;
      padding: 16px;
      border: 2px solid #ddd1e8;
      border-radius: 16px;
      outline: none;
      font-size: 15px;
      font-weight: 600;
    }

    .chat-input input:focus {
      border-color: #9661b8;
    }

    .chat-input button {
      background: #9661b8;
      color: #ffffff;
      border: none;
      border-radius: 16px;
      padding: 0 24px;
      font-size: 15px;
      font-weight: 900;
      cursor: pointer;
    }

    .chat-input button:hover {
      background: #7a4c98;
    }

    footer {
      background: #786286;
      padding: 80px 90px 90px;
      color: white;
    }

    .footer-logo {
      font-size: 24px;
      font-weight: 900;
      color: #ffe34d;
      margin-bottom: 22px;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 80px;
    }

    footer h3 {
      font-size: 17px;
      font-weight: 900;
      margin-bottom: 14px;
    }

    footer a {
      display: block;
      color: white;
      text-decoration: none;
      font-size: 13px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    @media (max-width: 900px) {
      .chat-page {
        grid-template-columns: 1fr;
        padding: 120px 28px 80px;
        gap: 50px;
      }

      .chat-info h1 {
        font-size: 38px;
      }

      .chatbot {
        height: 620px;
      }

      nav {
        gap: 18px;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        gap: 24px;
      }
    }
  </style>
</head>

<body>

  <header>
    <div class="logo-area">
      <button class="menu" id="menuBtn">☰</button>
      <div class="logo">Ǝliceu</div>
    </div>

    <nav>
      <a href="autentificare.html#register">Înregistrare</a>
      <a href="autentificare.html">Autentificare</a>
    </nav>
  </header>

  <div class="sidebar" id="sidebar">
    <button class="close-btn" id="closeBtn">✕</button>

    <a href="acasa.html">Acasă</a>
    <a href="licee.html">Toate liceele</a>
    <a href="specializari.html">Specializări</a>
    <a href="test.html">Test de orientare</a>
    <a href="evenimente.html">Evenimente și noutăți</a>
    <a href="chatbot.php">Chatbot AI</a>
    <a href="despre.html">Despre noi</a>
    <a href="contact.html">Contact</a>
  </div>

  <main class="chat-page">
    <section class="chat-info">
      <h1>Asistent AI pentru alegerea liceului</h1>

      <p>
        Chatbotul Eliceu folosește un model de Machine Learning de tip Random Forest
        pentru a estima șansele de admitere la liceele potrivite.
      </p>

      <div class="examples">
        <div class="example">„Am media 9.20 și vreau mate-info în sectorul 6”</div>
        <div class="example">„Am media 8.80 și caut filologie”</div>
        <div class="example">„Am media 9.50 și vreau bilingv engleză”</div>
        <div class="example">„Am media 8.70 și vreau licee reale”</div>
      </div>
    </section>

    <section class="chatbot">
      <div class="chatbot-header">
        <h2>Eliceu AI</h2>
        <p>Model Random Forest pentru predicții de admitere</p>
      </div>

      <div class="messages" id="messages">
        <div class="msg bot">
          Bună! Spune-mi media ta și ce liceu cauți. Exemplu:
          „Am media 9.20 și vreau mate-info în sectorul 6”.
        </div>
      </div>

      <div class="chat-input">
        <input id="userInput" type="text" placeholder="Scrie mesajul aici...">
        <button onclick="sendMessage()">Trimite</button>
      </div>
    </section>
  </main>

  <footer>
    <div class="footer-logo">Ǝliceu</div>

    <div class="footer-grid">
      <div>
        <h3>Navigare</h3>
        <a href="licee.html">Toate Liceele</a>
        <a href="chatbot.php">Chatbot AI</a>
        <a href="despre.html">Despre noi</a>
        <a href="contact.html">Contact</a>
        <a href="autentificare.html#register">Înregistrare</a>
        <a href="autentificare.html">Autentificare</a>
      </div>

      <div>
        <h3>Resurse</h3>
        <a href="specializari.html">Informații despre profiluri</a>
        <a href="test.html">Test de îndrumare</a>
        <a href="evenimente.html">Evenimente</a>
      </div>

      <div>
        <h3>Legal</h3>
        <a href="#">Termeni și condiții</a>
        <a href="#">Cookies</a>
      </div>
    </div>
  </footer>

  <script>
    const menuBtn = document.getElementById("menuBtn");
    const sidebar = document.getElementById("sidebar");
    const closeBtn = document.getElementById("closeBtn");

    menuBtn.addEventListener("click", () => {
      sidebar.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
      sidebar.classList.remove("active");
    });

    async function sendMessage() {
      const input = document.getElementById("userInput");
      const messages = document.getElementById("messages");

      const text = input.value.trim();

      if (text === "") {
        return;
      }

      messages.innerHTML += `<div class="msg user">${escapeHtml(text)}</div>`;
      input.value = "";

      messages.innerHTML += `<div class="msg bot" id="loading">AI-ul analizează datele...</div>`;
      messages.scrollTop = messages.scrollHeight;

      try {
        const response = await fetch("chatbot.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            message: text
          })
        });

        const data = await response.json();

        const loading = document.getElementById("loading");
        if (loading) {
          loading.remove();
        }

        messages.innerHTML += `<div class="msg bot">${data.reply}</div>`;
        messages.scrollTop = messages.scrollHeight;

      } catch (error) {
        const loading = document.getElementById("loading");

        if (loading) {
          loading.remove();
        }

        messages.innerHTML += `
          <div class="msg bot">
            A apărut o eroare la conectarea cu modelul AI sau cu baza de date.
          </div>
        `;
      }
    }

    function escapeHtml(text) {
      return text
        .replaceAll("&", "&amp;")
        .replaceAll("<", "&lt;")
        .replaceAll(">", "&gt;")
        .replaceAll('"', "&quot;")
        .replaceAll("'", "&#039;");
    }

    document.getElementById("userInput").addEventListener("keydown", function(event) {
      if (event.key === "Enter") {
        sendMessage();
      }
    });
  </script>

</body>
</html>
