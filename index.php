<?php
  $firstName = $lastName = $email = $phone = $message = " ";
  $firstNameError = $lastNameError = $emailError = $phoneError = $messageError = "";
  $isSuccess = false;
  $emailTo = "faycaldali13@gmail.com";

  if ($_SERVER["REQUEST_METHOD"] == "POST")
   {
    $firstName = security($_POST["firstname"]);
    $lastName =  security($_POST["lastName"]);
    $email = security($_POST["email"]);
    $phone = security($_POST["phone"]);
    $message = security($_POST["message"]);
    $isSuccess = true;
    $emailTxt = "";
  }

  if (empty($firstName)) {
     $firstNameError = "J'ai besoin de connaitre ton prénom !";
     $isSuccess = false;
  }
  else {
    $emailTxt .= "Prénom: $firstName\n";
  }
  if (empty($lastName)) {
    $lastNameError = "Mais aussi ton nom !";
    $isSuccess = false;
  }
  else {
    $emailTxt .= "Nom: $lastName\n";
  }
  if (empty($email)) {
    $emailError = "Je ne suis pas médium, j'en ai besoin pour te répondre ";
    $isSuccess = false;
  }
  else {
    $emailTxt .= "Email: $email\n";
  }
  if (!isPhone($phone)) {
    $phoneError = "Seulment des chifres bien-sûr !";
    $isSuccess = false;
  }
  else {
    $emailTxt .= "Tél: $phone\n";
  }
  if (empty($message)) {
    $messageError = "Mais de quoi veux tu me parler !!";
    $isSuccess = false;
  }
  else {
    $emailTxt .= "Msg: $message\n";
  }
  if ($isSuccess) {
    $headers = "From: $firstName $lastName <$email>\r\nReply-To: $email";
    mail($emailTo, "Msg du Portfolio", $emailTxt, $headers);
    $firstName = $lastName = $email = $phone = $message = " ";
  }
    function isPhone ($var)
{
    return preg_match("/^[0-9 ]*$/", $var);
}
    function security ($var)
  {
    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
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
        <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" role="form">
          <div class="row">
            <div class="col-md-6">
              <label for="firstName">Prénom <span class="blue">*</span></label>
              <input id="firstname" class="form-control" type="text" name="firstname" value="<?php echo $firstName; ?>">
              <p class="comments"><?php echo $firstNameError; ?></p>
            </div>

            <div class="col-md-6">
              <label for="lastName">Nom <span class="blue">*</span></label>
              <input id="lastName" class="form-control" type="text" name="lastName" value="<?php echo $lastName; ?>">
              <p class="comments"><?php echo $lastNameError; ?></p>
            </div>

            <div class="col-md-6">
              <label for="email">Email <span class="blue">*</span></label>
              <input id="email" class="form-control" type="email" name="email" value="<?php echo $email; ?>">
              <p class="comments"><?php echo $emailError; ?></p>
            </div>

            <div class="col-md-6">
              <label for="phone">Téléphone</label>
              <input id="phone" class="form-control" type="tel" name="phone" value="<?php echo $phone; ?>">
              <p class="comments"><?php echo $phoneError; ?></p>
            </div>

            <div class="col-md-12">
              <label for="message">Message <span class="blue">*</span></label>
              <textarea id="message" class="form-control" name="message"  rows="4"><?php echo $message; ?></textarea>
              <p class="comments"><?php echo $messageError; ?></p>
            </div>

            <div class="col-md-12">
              <p class="blue"><strong>* Ces informations sont requises</strong></p>
            </div>

            <div class="col-md-12">
              <input type="submit" class="button1" value="Envoyer">
            </div>

          </div>
          <p class="thank-you" style="display:<?php if ($isSuccess) echo 'block'; else echo 'none';?>">votre message a bien été envoyé. Merci de m'avoir contacté :)</p>
        </form>
      </div>
    </div>


  </div>
</body>

</html>
