<?php
function autoloader($classname)
{
    $fullpath = "../classes/" . $classname . ".cls.php";
    include_once $fullpath;
}
spl_autoload_register("autoloader");
