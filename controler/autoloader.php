<?php
function chargerClasse($classname)
{
  require './class/'.$classname.'.php';
}

spl_autoload_register('chargerClasse');

session_start();
?>