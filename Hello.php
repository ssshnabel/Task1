<?php
    //$filenames = '/file_([0-9]|[a-z])([0-9]|[a-z])\.data/'; //регулярку не может сравнить

    //$files = '/files';
    //$path = set_include_path(get_include_path() . PATH_SEPARATOR . $files); //не видит путь
    //$context = stream_context_create($path);
//    $lines = array();
    $hashedLines = array();
    $files = array();
    $dir = opendir('.');

    while(($currentFile = readdir($dir)) !== false){
    if ( $currentFile == '.' or $currentFile == '..' ){
        continue;
    }
    $files[] = $currentFile;
    }
    closedir($dir);

    //foreach (glob("*.file") as $filename) {

        //if (preg_match($filenames, $path)){
//            $open = fopen($filenames, "rb");
//            $size = filesize($filenames);
//            $binary = fread($open, $size);
            //array_push($lines, $filename);
//            fclose($open);
        //}
    //}

    foreach ($files as $name){
        //$fileContent = file_get_contents($name, false, $context);
        $fileContent = file_get_contents($name, true);
        $data = hash('sha3-256', $fileContent );
        array_push($hashedLines, $data);
    }


//$data = hash('sha3-256', file_get_contents($filenames, false, $context));
//    $data =
    echo var_dump($hashedLines);
?>