<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
</head>

<body>


<h1 id="title">Formularz tworzenia komentarza</h1>
<form action="../projektphp/koment.php" target="_blank">
    <input type="hidden" name="post" value=<?php  echo $_GET['post'];?>>
    <label for="reaction"><b>Select type of comment:</b></label><br/>
    <select name="reaction">
        <option value="pos">Pozytywny</option>
        <option value="neg">Negatywny</option>
        <option value="neu">Neutralny</option>
    </select><br/>
    <label for="comment"><b>Your comment:</b></label><br/>
    <textarea name="comment" placeholder="Type your comment" cols="30" rows="10"></textarea><br/>
    <label for="nickname"><b>Name:</b></label><br/>
    <input type="text" placeholder="Enter your nickname" name="nickname" required="required">
    </input><br/>
    <input type="submit" value="Submit">
	</input><br/>
    <input type="reset" value='reset'</p>
    </input><br/>
</form>
<?php include 'menu.php'; ?>
</body>
</html>
