<?php
namespace App\Model;
use App\Utils\BddConnect;
class Equipment extends BddConnect{
    private ?int $id_equipment;
    private ?string $name_equipment;
    public function getId():?int{
        return $this->id_equipment;
    }
    public function setId(?int $id){
        $this->id_equipment = $id;
    }
    public function getNom():?string{
        return $this->name_equipment;
    }
    public function setNom(?string $name){
        $this->name_equipment = $name;
    }
    public function add(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('INSERT INTO equipment(name_equipment)VALUES(?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findOneBy(){
        try {
            $nom = $this->getNom();
            $req = $this->connexion()->prepare('SELECT id_equipment, name_equipment FROM
            equipment WHERE name_equipment = ?');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Equipment::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>