<?php

$host = 'localhost'; 
$dbUser = 'root'; 
$dbPassword = ''; 
$dbName = 'gbtimbri';


$mysqli = new mysqli($host, $dbUser, $dbPassword, $dbName);


if ($mysqli->connect_error) {
    die("Connessione fallita: " . $mysqli->connect_error);
}


$query = "SELECT username FROM user";
$result = $mysqli->query($query);
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site Explorer runs on a huge database of 12 trillion links and 402 million tracked keywords to give you the most complete SEO data about any website or URL.">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
 </head>
 <body>

   <div class="header">
      <img src="icons/code-solid.svg" class="icon-small icon-white ml-1" alt="iconcina">
      <a href="index.php"><img src="icons/Logo GB svg.svg" class="icon-mid" alt="logo"></a>
      <div class="header__icons r-center">
        <a href="https://wa.me/393475995047?text=Ciao Pietro vorrei segnalarti un bug: " target="_blank" rel="noopener noreferrer">
            <img src="icons/bug.svg" class="icon-small icon-white text" alt="bug">
          </a>          
         <img src="icons/raygun.svg" class="icon-small icon-white mr-1" alt="raygun" id="immagineInfo">
      </div>
   </div>

   <div class="grid mt-2">
      
    <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-33">
            <div class="card v-center shadow">   
                <h3 class="text-2 text-white"><?= htmlspecialchars($row['username']) ?></h3>
                <?php
         
                $query = "SELECT foto_profilo FROM user WHERE username = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $row['username']);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($foto_profilo);
                    $stmt->fetch();
                    if (!empty($foto_profilo)) {
                        // Converti il BLOB in base64 per l'uso nell'attributo src di img
                        $foto_profilo_base64 = 'data:image/jpg;base64,' . base64_encode($foto_profilo);
                    } else {
                        $foto_profilo_base64 = "images/default-profile.jpg"; // Percorso immagine di default
                    }
                } else {
                    $foto_profilo_base64 = "images/default-profile.jpg"; // Percorso immagine di default
                }
                $stmt->close();
                ?>
                <img src="<?= $foto_profilo_base64 ?>" class="img-res mt-1 mb-1 circular-portrait-mini" alt="profile">
                <div class="container">
                    <form method="post" action="user.php">
                        <div class="group">
                            <input type="password" id="password-<?= htmlspecialchars($row['username']) ?>" name="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="password-<?= htmlspecialchars($row['username']) ?>">Password</label>
                        </div>
                        <input type="hidden" name="username" value="<?= htmlspecialchars($row['username']) ?>">
                        <button type="submit" name="login" class="button button-rounding mt-3">Accedi</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>


 </body>
 </html>
 <script>
 document.getElementById("immagineInfo").addEventListener("click", function() {
  alert("Funzione in via di sviluppo.");
});



 </script>