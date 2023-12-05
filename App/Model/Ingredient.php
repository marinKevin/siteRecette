<?php
namespace App\Model; 
use App\Utils\BddConnect;
class Ingredient extends BddConnect{
    private ?int $id_ingredient;
    private ?string $name_ingredient;
    public function getId():?int{
        return $this->id_ingredient;
    }
    public function setId(?int $id){
        $this->id_ingredient = $id;
    }
    public function getNom():?string{
        return $this->name_ingredient;
    }
    public function setNom(?string $name){
        $this->name_ingredient = $name;
    }
    public function add(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('INSERT INTO ingredient(name_ingredient)VALUES(?)');
            $req->bindParam(1, $name_ingredient, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('SELECT id_ingredient, name_ingredient FROM
            ingredient WHERE name_ingredient = ?');
            $req->bindParam(1, $name_ingredient, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Ingredient::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}