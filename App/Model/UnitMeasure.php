<?php
namespace App\Model;
use App\Utils\BddConnect;
class UnitMeasure extends BddConnect{
    //Attributs
    private ?int $id_unit_measure;
    private ?string $name_unit_measure;
    //constructeur
    //Getters et Setters
    public function getId():?int{
        return $this->id_unit_measure;
    }
    public function setId(?int $id){
        $this->id_unit_measure = $id;
    }
    public function getNom():?string{
        return $this->name_unit_measure;
    }
    public function setNom(?string $name){
        $this->name_unit_measure = $name;
    }
    //Méthodes
    //Ajouter une unité de mesure en BDD
    public function add(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('INSERT INTO unit_measure(name_unit_measure)VALUES(?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //Chercher une unité par son nom en BDD
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('SELECT id_unit_measure, name_unit_measure FROM
            unit_measure WHERE name_unit_measure = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, UnitMeasure::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function find(){
        try{
            $requete = 'SELECT id_unit_measure FROM unit_measure WHERE id_unit_measure =?';
            $requete2 = 'SELECT id_unit_measure, name_unit_measure FROM unit_measure WHERE id_unit_measure =?';
            $id = $this->getId();
            $req = $this->connexion()->prepare($requete);
            $req->bindParam(1, $id, \PDO::PARAM_INT);
            $req->execute();
             //test si la requête renvoi un enregistrement
            if($req->fetch()){
                $req2 = $this->connexion()->prepare($requete2);
                $req2->bindParam(1, $id , \PDO::PARAM_INT);
                $req2->execute();
                $req2->setFetchMode(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, UnitMeasure::class);
                $unit = $req2->fetch();
            }
            else{
                $unit = null;
            }
            return $unit;
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findAll(){
        try {
            $req = $this->connexion()->prepare('SELECT id_unit_measure,name_unit_measure FROM unit_measure');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, UnitMeasure::class);
        } catch (\Exception $e) {
            die('Erreur :'.$e->getMessage());
        }
    }
    public function update(){
        try {
            $id  = $this->id_unit_measure;
            $name = $this->name_unit_measure;
            $req = $this->connexion()->prepare('UPDATE unit_measure SET name_unit_measure = ? WHERE id_unit_measure = ?');
            $req->bindParam(1, $name, \PDO::PARAM_STR);
            $req->bindParam(2, $id, \PDO::PARAM_STR);
            $req->execute();
        } catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?> 