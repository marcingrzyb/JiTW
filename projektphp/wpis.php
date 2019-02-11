<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
<?php
$semD = sem_get(4, 1, 0666, 0);
date_default_timezone_set('Europe/Warsaw');
$Bname = null;
$uval=0;
$passw=$_POST{"pasw"};
$szyfr=md5($passw);

foreach (new DirectoryIterator('../projektphp/') as $current){
    if ($current->isDot()) continue;
		if(is_dir($current)){
		$file = $current.'/info';
    $myfile = fopen($file,"r+");
    $nick = trim(fgets($myfile));
    $haslo = trim(fgets($myfile));
    if ($haslo == $szyfr and $nick == $_POST{"username"}){
        $Bname = $current;
        break;
    }
	}
}


if ($Bname== ""){
    echo "Nie odnaleziono bloga";
    exit(2);
	}
else{
$info = getdate();
$czas=str_replace("-","",$_POST{"data"}).str_replace(":","",$_POST{"time"}).$info['seconds'].$uval;
foreach ( new DirectoryIterator("../projektphp/".$Bname."/") as $currfile){
  if (!file_exists("../projektphp/".$Bname."/".$czas)) {
		if(sem_acquire($semD)){
		$file = fopen("../projektphp/".$Bname."/".$czas,"w");
    $data = $_POST["username"]."\n".$_POST["data"]."\n".$_POST["time"]."\n".$_POST["post"]."\n";
    fwrite($file, $data);
    fclose($file);
		$uval+=1;
		sem_release($semD);
  }
	else {
		echo "Błąd tworzenia semafora D2";
	}
}
}
}

$filenumber = 1;
if(sem_acquire($semD)){
foreach ($_FILES as $FILE){
    if (is_uploaded_file($FILE['tmp_name']))
    {
        $name = $FILE['name'];
        $info = pathinfo($name);
        $ext = $info['extension'];
        $wpis = "../projektphp/".$Bname."/".$czas;
        $newname = $wpis.strval($filenumber).".".$ext;
				move_uploaded_file( $FILE['tmp_name'], $newname);
        chmod($newname,0777);
			}
			$filenumber++;

    }
			sem_release($semD);
}
else {
	echo "Błąd tworzenia semafora D3";
}
include 'menu.php';
?>
</body>
</html>
