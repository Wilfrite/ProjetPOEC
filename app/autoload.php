<?php

function autoloadFile($filename) {
    if (is_readable($filename)) {
        require $filename;
    }
}

function autoloadModel($className) {
    $filename = ROOT . "/models/" . $className . ".php";
    autoloadFile($filename);
}

function autoloadController($className) {
    $filename = ROOT . "/controllers/" . $className . ".php";
    autoloadFile($filename);
}

//spl_autoload_register("autoloadCore");
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");