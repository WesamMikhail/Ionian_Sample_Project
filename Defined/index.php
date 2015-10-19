<?php
if(is_readable('vendor/autoload.php'))
    require_once 'vendor/autoload.php';

use Lorenum\Ionian\Core\App;
use Lorenum\Ionian\Database\Database;
use Lorenum\Ionian\Routers\Defined;

$app = new App(App::MODE_PROD);
$app->setDb(Database::createFromJSONFile("settings.json"));
$app->setRouter(new Defined());
$app->getRouter()->get("/articles", "ArticlesController@listAll");
$app->getRouter()->get("/articles/:", "ArticlesController@getSingle");
$app->getRouter()->post("/articles", "ArticlesController@addSingle");
$app->run();