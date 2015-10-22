<?php
namespace Project\Models;

use Lorenum\Ionian\Core\Model;

class ArticlesModel extends Model{

    public function getAllArticles(){
        $stm = $this->db->prepare("SELECT * FROM articles");
        $stm->execute();

        return $stm->fetchAll();
    }

    public function getArticleByID($id){
        $stm = $this->db->prepare("SELECT * FROM articles WHERE id = :id");
        $stm->execute([
            ":id" => $id
        ]);

        return $stm->fetchObject();
    }

    public function insertArticle($title, $content){
        $stm = $this->db->prepare("INSERT INTO articles (title, body) VALUES (:title, :body)");
        return $stm->execute([
            ":title" => $title,
            ":body" => $content
        ]);
    }
}