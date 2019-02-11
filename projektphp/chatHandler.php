<?php
file_put_contents("chatlogs", $_POST['message'] . "\n", FILE_APPEND); //zapisywanie wiadomosci do pliku
$st=file_get_contents("chatlogs");
$arar=explode("\n", $st);
$arr = array_slice($arar, -9,10,true);
$final=implode("\n",$arr);
file_put_contents("chatlogs", $final);
?>
