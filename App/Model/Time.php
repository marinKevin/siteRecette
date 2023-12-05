<?php
namespace App\Model;
use App\Utils\BddConnect;
class Time extends BddConnect{
    //Attributs
    private ?int $id_time;
    private ?string $name_time;
    //constructeur
    //Getters et Setters
    public function getId():?int{
        return $this->id_time;
    }
    public function setId(?int $id){
        $this->id_time = $id;
    }
    public function getNom():?string{
        return $this->name_time;
    }
    public function setNom(?string $name){
        $this->name_time = $name;
    }
    //Méthodes
    //Ajouter un roles en BDD
    public function add(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('INSERT INTO time(name_time)VALUES(?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //Chercher un roles par son nom en BDD
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('SELECT id_time, name_time FROM
            roles WHERE name_time = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Time::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>