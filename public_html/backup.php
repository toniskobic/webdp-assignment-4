<?php
$putanja = dirname($_SERVER['REQUEST_URI']);
$direktorij = getcwd();
require "$direktorij/baza.class.php";
require "$direktorij/sesija.class.php";

Sesija::kreirajSesiju();

if(isset($_GET['napravi'])) {
    $command = "";
    exec($command);

    $_SESSION['file'] = 'datoteke/backup.sql';

    header("Location: ./obrasci/obrazac.php");
}
if(isset($_GET['vrati'])) {
    if(!empty($_SESSION['file'])) {
        $file = $_SESSION['file'];
        $command = "";
        exec($command);
        unlink ($file); 

        $_SESSION['file'] = '';
    }
    header("Location: ./obrasci/obrazac.php");
}
?>