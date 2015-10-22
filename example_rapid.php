<?php
if(is_readable('vendor/autoload.php'))
    require_once 'vendor/autoload.php';

use Lorenum\Ionian\Core\App;
use Lorenum\Ionian\Database\Database;
use Lorenum\Ionian\Response\JSONResponse;
use Lorenum\Ionian\Routers\Rapid;
use Lorenum\Ionian\Request\Parser;

$app = new App(App::MODE_PROD);
$app->settings->setRequest(Parser::parseFromGlobals());
$app->settings->setDb(Database::createFromJSONFile("Project/settings.json"));
$app->settings->setResponse(new JSONResponse());
$app->settings->setRouter(new Rapid());
$app->run();

