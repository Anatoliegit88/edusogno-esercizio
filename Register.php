<?php
include('Config.php');
session_start();
if (isset($_POST['register'])) {
  $nome = $_POST['nome'];
  $cognome = $_POST['cognome'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_hash = password_hash($password, PASSWORD_BCRYPT);
  $query = $connection->prepare("SELECT * FROM utenti WHERE EMAIL=:email");
  $query->bindParam("email", $email, PDO::PARAM_STR);
  $query->execute();
  if ($query->rowCount() > 0) {
    echo '<p class="error">Ti sei registrato !</p>';
  }
  if ($query->rowCount() == 0) {
    $query = $connection->prepare("INSERT INTO utenti(NOME,PASSWORD,EMAIL) VALUES (:email,:password_hash,:email)");
    $query->bindParam("nome", $nome, PDO::PARAM_STR);
    $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $result = $query->execute();
    if ($result) {
      echo '<p class="success">Your registration was successful!</p>';
    } else {
      echo '<p class="error">Something went wrong!</p>';
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Create account</title>
</head>

<body>
  <main class="container">
    <div class="header">
      <img class="logo" src="./foto/Group 181logo.png" alt="">
    </div>
    <div class="hero">
      <img class="circle-right" src="./foto/Ellipse 12right-circle.png" alt="white circle">
      <img class="circle-left" src="./foto/Ellipse 13left-circle.png" alt="white circle">
      <h1 class="title">Crea il tuo account</h1>
      <div class="hero-form">
        <form class="form" action="" method="POST" name="singup-form">
          <label class="credentials">Inserisci il nome</label>
          <input type="text" name="nome" pattern="[a-zA-Z0-9]+" required>
          <label class="credentials">Inserisci il cognome</label>
          <input name="cognome" class="input" type="text">
          <label class="credentials">Inserisci l'e-mail</label>
          <input name="email" type="email">
          <label class="credentials">Inserisci la password</label>

          <input name="password" type="password">


          <button type="submit" name="register" value="register">ACCEDI</button>

        </form>
      </div>
      <footer class="footer">
        <img class="right-vawe" src="./foto/Vector 5rightsightfooter.png" alt="vawe">
        <img class="left-vawe" src="./foto/Vector 4leftsidefooter.png" alt="vawe">
        <img class="bottom-vawe" src="./foto/Vector 1whitefooter.png" alt="vawe">
        <img class="vector-left" src="./foto/Vector 2vector-left.png" alt="vector">
        <img class="polygon" src="./foto/Polygon 1polygon.png" alt="polygon">
        <img class="rectangle" src="./foto/Rectangle 1083rectangle.png" alt="rectangle">
        <img class="rectangle-small" src="./foto/Rectangle 1084small-rectangle.png" alt="small rectangle">
        <img class="vector-right" src="./foto/Vector 3vector-right.png" alt="vector">
        <img class="small-circle" src="./foto/Ellipse 11small-circle.png" alt="circle">
      </footer>
    </div>
  </main>

</body>

</html>