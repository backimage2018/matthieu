<?php

spl_autoload_register('autoload');

/*

La fonction recupere le nom de la class qu'elle ne trouve pas 
et concatene le fichier manquant en y ajoutant .class.php

*/
function autoload ($classACharger) {
    require $classACharger . '.class.php';
    
}


?>