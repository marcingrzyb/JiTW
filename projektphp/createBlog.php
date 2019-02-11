<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Tworzenie bloga</title>
</head>

<body>


<h1 id="title">Formularz tworzenia bloga</h1>

<form action="../projektphp/nowy.php" method="post">
    <label for="name"><b>Blog's Name</b></label><br/>
    <input type="text" placeholder="Enter name" name="name" required="required"/><br/>
    <label for="username"><b>Username</b></label><br/>
    <input type="text" placeholder="Enter Username" name="username" required="required"/><br/>
    <label for="psw"><b>Password</b></label><br/>
    <input type="password" placeholder="Enter Password" name="psw" required="required"/><br/>
    <label for="description"><b>Describe your blog</b></label><br/>
    <textarea name="description" cols="30" rows="10"></textarea><br/>
    <input type="submit" value="Akceptuj"><br/>
    <input type="reset"><br/>
</form>
<?php include 'menu.php'; ?>
</body>
</html>
