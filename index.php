<?php
  $firstName = $lastName = $email = $phone = $message = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $firstName = $_POST["lastName"];
    $firstName = $_POST["email"];
    $firstName = $_POST["phone"];
    $firstName = $_POST["message"];
  }
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="CSS/style.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <title>Formulaire</title>
</head>

<body>
  <div class="container">
    <div class="divider"></div>
    <div class="heading">
      <h2>Contactez-Moi</h2>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <form id="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
          <div class="row">
            <div class="col-md-6">
              <label for="firstName">Prénom <span class="blue">*</span></label>
              <input id="firstName" class="form-control" type="text" name="firstName" placeholder="Prénom" value="<?php echo $firstName ?>">
              <p class="comments">Message</p>
            </div>

            <div class="col-md-6">
              <label for="lastName">Nom <span class="blue">*</span></label>
              <input id="lastName" class="form-control" type="text" name="lastName" placeholder="Nom">
              <p class="comments">Message</p>
            </div>

            <div class="col-md-6">
              <label for="email">Email <span class="blue">*</span></label>
              <input id="email" class="form-control" type="email" name="email" placeholder="Email">
              <p class="comments">Message</p>
            </div>

            <div class="col-md-6">
              <label for="phone">Téléphone</label>
              <input id="phone" class="form-control" type="text" name="phone" placeholder="Téléphone">
              <p class="comments">Message</p>
            </div>

            <div class="col-md-12">
              <label for="message">Message <span class="blue">*</span></label>
              <textarea id="message" class="form-control" name="message" rows="4"></textarea>
              <p class="comments">Message</p>
            </div>

            <div class="col-md-12">
              <p class="blue"><strong>* Ces informations sont requises</strong></p>
            </div>

            <div class="col-md-12">
              <input type="submit" class="button1" value="Envoyer">
            </div>

          </div>
          <p class="thank-you">votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
        </form>
      </div>
    </div>


  </div>
</body>

</html>
