<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
<?php

$semA = sem_get(1, 1, 0666, 0);
$semB = sem_get(2, 1, 0666, 0);
if(sem_acquire($semA)){
if (!file_exists('/'.$_POST["name"])) {
    mkdir('./'.$_POST["name"], 0777, true);
    $myfile = fopen('./'.$_POST["name"].'/info', "w");
    fwrite($myfile, $_POST["username"]."\n");
    fwrite($myfile,md5($_POST["psw"])."\n");
    fwrite($myfile,$_POST["description"]."\n");
    fclose($myfile);
		sem_release($semA);
	}
	else {
		echo "Blog o takiej nazwie istnieje";
	}
}
else {
	echo "Błąd tworzenia semafora A1";
}



include 'menu.php';
?>
</body>
</html>
