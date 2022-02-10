<?php
    $dir = 'files';
    $entries = array_diff(scandir($dir, 1), array('..', '.'));

    $files = array();
    foreach ($entries as $currentFile){
        $files[] = $currentFile;
    }

    $hashedLines = array();
    foreach ($files as $file){
        $path = $dir."/".$file;
        $hashedData = hash('sha3-256', file_get_contents($path));
        $hashedLines[] = $hashedData;
    }

    asort($hashedLines);

    $string = implode ($hashedLines);
    $email = 'm.shnabel@yandex.ru';
    $string = hash('sha3-256', $string.$email);

    echo var_dump($string);
?>