<?php

$path = '/media/zjsxwc/06E2F1E9395B8371/学习';

function getDirContent($path){
    if(!is_dir($path)){
        return false;
    }
    //scandir方法
    $arr = array();
    $data = scandir($path);
    foreach ($data as $value){
        if($value != '.' && $value != '..'){
            $arr[] = $value;
        }
    }
    return $arr;
}

$fnameList = getDirContent($path);
foreach ($fnameList as $fname) {
    if ((mb_strpos($fname, "政治") !== false) && (mb_strpos($fname, ".mp4") !== false)) {
        $mp3name = str_replace("mp4", "mp3", $fname);
        $cmd = sprintf("ffmpeg -i \"%s\"  -b:a 0 -vn \"%s\"",
            $path . "/" . $fname,
            $path . "/" . $mp3name
        );
        var_dump($cmd);
        $output = shell_exec($cmd);
        var_dump($output);
    }
}


