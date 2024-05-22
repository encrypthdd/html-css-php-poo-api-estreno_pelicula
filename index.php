<?php

require_once 'consts.php';
require_once 'functions.php';
require_once 'classes/NextMovie.php';

$next_movie = NextMovie::fetch_and_create_movie(API_URL);
$next_movie_data = $next_movie->get_data();

//$data = getData(API_URL);
//$untilMessage = getUntilMessage($data["days_until"]);
    
?>

<?php renderTemplate('head', ["title" => $next_movie_data["title"]]); ?>
<?php renderTemplate('main', array_merge(
    $next_movie_data, ["until_message" => $next_movie->getUntilMessage()]
)); ?>

