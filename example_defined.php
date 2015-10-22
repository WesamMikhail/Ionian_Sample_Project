<?php
if(is_readable('vendor/autoload.php'))
    require_once 'vendor/autoload.php';

use Lorenum\Ionian\Core\App;
use Lorenum\Ionian\Database\Database;
use Lorenum\Ionian\Response\JSONResponse;
use Lorenum\Ionian\Routers\Defined;
use Lorenum\Ionian\Request\Parser;

$app = new App(App::MODE_PROD);
$app->settings->setRequest(Parser::parseFromGlobals());
$app->settings->setDb(Database::createFromJSONFile("Project/settings.json"));
$app->settings->setResponse(new JSONResponse());
$app->settings->setRouter(new Defined());
$app->settings->getRouter()->get("/articles", "ArticlesController@listAction");
$app->settings->getRouter()->get("/articles/:", "ArticlesController@getAction");
$app->settings->getRouter()->post("/articles", "ArticlesController@addAction");
$app->run();