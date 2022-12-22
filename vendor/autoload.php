<?php

// autoload.php @generated by Composer
$url = "https://api.themoviedb.org/3/discover/movie?api_key=93b20005a7082547745bfa44e9379899&sort_by=vote_average.desc&language=hu-HU";
$json = file_get_contents($url);
$obj = json_decode($json);

$total_pages = $obj->total_pages;
$count = 0;

echo "<a target='_blank' href='https://www.themoviedb.org/'><img src='https://www.themoviedb.org/assets/2/v4/logos/v2/blue_square_2-d537fb228cf3ded904ef09b136fe3fec72548ebc1fea3fbbd1ad9e36364db38b.svg' height='50px' alt='The Movie DataBase'/></a>";
echo "<br />This product uses the TMDB API but is not endorsed or certified by TMDB.<br />";
echo "<br /><u>Top Rated Movies:</u><br /><br />";

for ($x=1; $x < 12; $x++) {
    
    $url_single = "https://api.themoviedb.org/3/discover/movie?api_key=93b20005a7082547745bfa44e9379899&sort_by=vote_average.desc&page={$x}&language=hu-HU";
    $json_single = file_get_contents($url_single);
    $obj_single = json_decode($json_single);

    foreach ($obj_single->results as $result) {
        $count++;
        echo  $count. ". " . $result->title;
        echo "<br />";
    }
}
echo "<br />";


/*
echo "<pre>";
print_r($obj->results[0]->title);
echo "<pre>";
*/

if (PHP_VERSION_ID < 50600) {
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
    }
    $err = 'Composer 2.3.0 dropped support for autoloading on PHP <5.6 and you are running '.PHP_VERSION.', please upgrade PHP or use Composer 2.2 LTS via "composer self-update --2.2". Aborting.'.PHP_EOL;
    if (!ini_get('display_errors')) {
        if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
            fwrite(STDERR, $err);
        } elseif (!headers_sent()) {
            echo $err;
        }
    }
    trigger_error(
        $err,
        E_USER_ERROR
    );
}

require_once __DIR__ . '/composer/autoload_real.php';

return ComposerAutoloaderInitef94261095632c51db777f92c093f4bd::getLoader();
