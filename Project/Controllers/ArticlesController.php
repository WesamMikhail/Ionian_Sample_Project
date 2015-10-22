<?php
namespace Project\Controllers;

use Lorenum\Ionian\Core\Controller;
use Lorenum\Ionian\Errors\HTTPExceptions\HTTPException_409;

class ArticlesController extends Controller{
    public function listAction(){
        $model = $this->getModel("ArticlesModel");
        $articles = $model->getAllArticles();

        $this->getResponse()->setData($articles);
        $this->getResponse()->output();
    }

    public function getAction($articleID){
        $model = $this->getModel("ArticlesModel");
        $article = $model->getArticleByID($articleID);

        $this->getResponse()->setData($article);
        $this->getResponse()->setMessage("Successful listing of article ID $articleID");
        $this->getResponse()->output();
    }

    public function addAction(){
        $title = $this->getBody("title");
        $content = $this->getBody("content");

        $model = $this->getModel("ArticlesModel");

        if(!$model->insertArticle($title, $content))
            throw new HTTPException_409("Resource already exists");

        $this->getResponse()->setMessage("Successful Insert");
        $this->getResponse()->setData(["id" => $model->getlastInsertId()]);
        $this->getResponse()->output();
    }
}