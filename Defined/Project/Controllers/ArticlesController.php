<?php
namespace Project\Controllers;

use Lorenum\Ionian\Core\Controller;
use Lorenum\Ionian\Errors\Exceptions\HTTPException_409;

class ArticlesController extends Controller{
    public function listAll(){
        $model = $this->getModels()->get("ArticlesModel");
        $articles = $model->getAllArticles();

        $this->response->setData($articles);
        $this->response->output();
    }

    public function getSingle($articleID){
        $model = $this->getModels()->get("ArticlesModel");
        $article = $model->getArticleByID($articleID);

        $this->response->setData($article);
        $this->response->setMessage("Successful listing of article ID $articleID");
        $this->response->output();
    }

    public function addSingle(){
        $title = $this->request->body("title");
        $content = $this->request->body("content");

        $model = $this->getModels()->get("ArticlesModel");

        if(!$model->insertArticle($title, $content))
            throw new HTTPException_409("Resource already exists");

        $this->response->setMessage("Successful Insert");
        $this->response->setData(["id" => $this->getModels()->getDb()->lastInsertId()]);
        $this->response->output();
    }
}