<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Lab PHP</title>
</head>
<body>
<?php
$semC = sem_get(3, 1, 0666, 0);
date_default_timezone_set('Europe/Warsaw');
$current_date = date('Y-m-d H:i:s');
$index=0;
if(isset($_GET['post'])){
	$path = $_GET['post'].".k/";
}
if (!file_exists($path)) {
		if(sem_acquire($semC)){
		mkdir($_GET['post'].".k", 0777, true);
		sem_release($semC);
		}
		else {
			echo "Błąd tworzenia semafora C1";
		}
}
if(sem_acquire($semC)){
chmod($_GET['post'].".k", 0777);
foreach (new DirectoryIterator($path) as $filei) {
    if (!$filei->isDot()) {
        $index+=1;
    }
}
sem_release($semC);
}
else {
	echo "Błąd tworzenia semafora C2";
}
if (!file_exists($path.strval($index))){
		if(sem_acquire($semC)){
		$file = fopen($path.strval($index),'w+');
		chmod($path.strval($index), 0777);
    $data =$_GET["reaction"]."\n".$current_date."\n".$_GET["nickname"]."\n".$_GET["comment"]."\n";
    fwrite($file, $data);
    fclose($file);
		chmod($path.strval($index), 0777);
		sem_release($semC);
	}
		else {
			echo "Błąd tworzenia semafora C3";
		}
}
include 'menu.php';
?>
</body>
</html>
