<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
    <?php include 'StyleAddon.php'; ?>
    <script type="application/javascript" src="TimeValidator.js"></script>
    <script type="application/javascript" src="StylesheetChoser.js"></script>
    <script type="application/javascript" src="FileAdder.js"></script>
    <script type="application/javascript" src="AJAXmessenger.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function(event) {
      var datevalidated = validDate();
      var timevalidated = validTime();
      console.log(timevalidated);
      console.log(datevalidated);
      document.getElementsByName("data")[0].value = datevalidated;
      document.getElementsByName("time")[0].value = timevalidated;
    });
    </script>
</head>

<body>


<h1 id="title">Formularz tworzenia posta</h1>
<form  method="POST"  onsubmit="return inputValidator()" action="../projektphp/wpis.php" name="form"  ENCTYPE="multipart/form-data">
	<label for="username"><b>Username</b></label><br/>
    <input type="text" placeholder="Enter Username" name="username" required="required"></input><br/>
	<label for="pasw"><b>Password</b></label><br/>
    <input type="password" placeholder="Enter Password" name="pasw" required="required"></input><br/>
	<label for="post"><b>Your post:</b></label><br/>
	<textarea name="post" cols="40" rows="5"></textarea><br/>
	<label for="date">Date:</label>
	<input type="text" name="data" id="data"></input><br/>
  <label for="timea">Time:</label>
	<input type="text" name="time" id="time"></input><br/>
  <label for="attachments">Attach files:</label><br/>
  <input class="file" type="file" name="1" onclick="addFile()"></input><br/>
	<input type="submit" value="Submit" name="submit"></input><br/>
	<input type="reset" value="RESET"></input><br/>
</form>

<?php include 'oknochatu.php'; ?>
<?php include 'menu.php'; ?>
<?php include 'stopka.php'; ?>
</body>
</html>
