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

   <!-- Messaggio di benvenuto -->
  <?php if (isset($_SESSION['username'])): ?>
    <p>Ciao, <?= htmlspecialchars($_SESSION['username']) ?>!</p>
  <?php endif; ?>

 </body>
 </html>
 <script>
 document.getElementById("immagineInfo").addEventListener("click", function() {
  alert("Funzione in via di sviluppo.");
});

 </script>