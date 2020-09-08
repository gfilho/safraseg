<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$url = (isset($_GET['url']) && $_GET['url'] != 'index') ? $_GET['url'] : 'landing-page';
$url = array_filter(explode('/', $url));

$path = '.';

$file = $url[count($url)-1] . '.php';

foreach($url as $u){
    $path = $path . '/' . $u;
}

$path = $path . '.php';

if(is_file($path)){
    include_once $file;
}else{
    include_once '404.php';
}