<?php
if(is_readable('vendor/autoload.php'))
    require_once 'vendor/autoload.php';

use Lorenum\Ionian\Core\App;
use Lorenum\Ionian\Database\Database;

$app = new App(App::MODE_PROD);
$app->setDb(Database::createFromJSONFile("settings.json"));
$app->run();