<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html lang="pl" xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Lista blogów</title>
</head>

<body>

<?php
$semE = sem_get(5, 1, 0666, 0);
if ($_GET == null){ // no arguments passed
    echo "<h2>Blogi</h2><br/>";
    echo "<ul>";
    foreach((new DirectoryIterator("../projektphp/")) as $blog){
      if (!$blog->isDot() and $blog->isDir()){
        echo "<li> <a href='blog.php?nazwa=".$blog."' >".$blog."</a> </li>";
      }
    }
    echo "</ul>";
}
else {
    $name= $_GET{"nazwa"};
    $path = "../projektphp/".$name."/";
    if (!file_exists($path)){
      echo "blog nie istnieje";
      exit(2);
      }
    else {

    echo "Nazwa bloga: ".$name."<br/>";
    $file = fopen($path."info","r+");
    echo "Login: ".fgets($file)."<br/>";
    fgets($file,255);
    echo "Opis: ".fgets($file)."<br/>";
    fclose($file);

    echo "<h2>WPISY</h2>";
    $index = 1;
    foreach ((new DirectoryIterator("../projektphp/".$name."/")) as $var){
    if ($var->isDot()) continue;
    if ($var == "info") continue;
    if (is_dir($var)) continue; //katalog komentarzy
    if (pathinfo($var, PATHINFO_EXTENSION)==null) {
      echo "<h3>Wpis: ".$index."</h3>";

      $fp = fopen($path.$var,"r+");
      echo "Użytkownik: ".fgets($fp,255)."<br/>";
      echo "Kiedy: ".fgets($fp,255)." ".fgets($fp,255)."<br/>";
      echo "Treść: ".fgets($fp,1024)."<br/>";

      echo "<a href='addComent.php?post=".$path.$var."' > Dodaj komentarz do posta </a> </li>";
      echo "<br/>";

      if (!file_exists($path.$var.".k")){
        echo "<h4>Brak komentarzy!</h4>";
      }
      else{
        echo "<h4>Komentarze:</h4>";
        foreach ((new DirectoryIterator($path.$var.".k/")) as $kom){
          if ($kom->isDot()) continue;
          if(sem_acquire($semE)){
          $fp = fopen($path.$var.".k/".$kom,"r+");
          echo "Reakcja: ".fgets($fp,255)."<br/>";
          echo "Kiedy: ".fgets($fp,255)."<br/>";
          echo "Użytkownik: ".fgets($fp,255)."<br/>";
          echo "Treść: ".fgets($fp,1024)."<br/><br/>";
          sem_release($semE);
        }
        else {
          echo "Błąd tworzenia semafora E3";
        }
        }
      }

      $filenum=1;
      echo "<h4>Załączniki:</h4>";
      foreach ((scandir($path)) as $added){
          if (pathinfo($added)['filename'] == $var.$filenum) {
              echo "<a href=".$path.$var.$filenum.".".pathinfo($added)['extension']."> Załącznik".$filenum."  </a> <br/>";
              $filenum++;
          }
      }
      echo "<br/>";
      fclose($fp);
      $index++;}
    }
    }
}
include 'menu.php';
?>
</body>
</html>
