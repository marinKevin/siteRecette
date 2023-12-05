<?php
namespace App\Model;
use App\Utils\BddConnect;
class Recipes extends BddConnect{
    //Attributs
    private ?int $id_recipe;
    private ?string $name_recipe;
    private ?string $steps_recipe;
    private Time $time;
    private Equipment $equipment;
    private Ingredient $ingredient;
    private Quantity $quantity;
    
    //constructeur

    public function __construct(){
        $this->time = new Time();
        $this->equipment = new Equipment();
        $this->ingredient = new Ingredient();
    }

    //Getters et Setters
    
    public function getId():?int{
        return $this->id_recipe;
    }
    public function setId(?int $id){
        $this->id_recipe = $id;
    }
    public function getName():?string{
        return $this->name_recipe;
    }
    public function setName(?string $name){
        $this->name_recipe = $name;
    }
    public function getSteps():?string{
        return $this->steps_recipe;
    }
    public function setSteps(?string $steps){
        $this->steps_recipe = $steps;
    }
    public function getTime():?Time{
        return $this->time;
    }
    public function setTime($time){
        $this->id_recipe = $time;
    }
    public function getEquipment():?Equipment{
        return $this->equipment;
    }
    public function setEquipment($equipment){
        $this->id_recipe = $equipment;
    }
    public function getQuantity():?Quantity{
        return $this->quantity;
    }
    public function setQuantity($quantity){
        $this->$quantity = $quantity;
    }
    public function getIngredient():?Ingredient{
        return $this->ingredient;
    }
    public function setIngredient($ingredient){
        $this->id_recipe = $ingredient;
    }


    //Méthodes
    
    public function add(){
        try {
            $nom = $this->getName();
            $contenu = $this->getSteps();
            $id_time = $this->getTime()->getId();
            $id_equipment = $this->getEquipment()->getId();
            $req = $this->connexion()->prepare('INSERT INTO recipe(name_recipe, steps_recipe)VALUES(?,?)');
            $req->bindParam(1, $nom, \PDO::PARAM_STR);
            $req->bindParam(2, $contenu, \PDO::PARAM_STR);
            $req->execute();
            $req2 = $this->connexion()->prepare('INSERT INTO Time(name_recipe, steps_recipe)VALUES(?,?)');
            $req2->bindParam(1, $nom, \PDO::PARAM_INT);
            $req2->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }

    public function findOneBy(){
        try {
            $recipe = $this->getName();
            $req = $this->connexion()->prepare('SELECT id_recipe, name_recipe, steps_recipe FROM
            recipes WHERE name_recipe = ?');
            $req->bindParam(1, $recipe, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Recipes::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function findAll(){
        try {
            $req = $this->connexion()->prepare('SELECT id_recipe,name_recipe FROM recipe');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Recipes::class);
        } catch (\Exception $e) {
            die('Erreur :'.$e->getMessage());
        } 
    }
}
?>