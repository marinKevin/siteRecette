<?php
namespace App\Model;
use App\Utils\BddConnect;
class Quantity extends BddConnect{

    //Attributs
    private ?int $id_quantity;
    private ?float $amount_quantity;
    private Recipes $recipes;
    private Ingredient $ingredient;
    private UnitMeasure $unitMeasure;
    
    //constructeur

    public function __construct(){
        $this->recipes = new Recipes();
        $this->ingredient = new Ingredient();
        $this->unitMeasure = new UnitMeasure();
    }
    //Getters et Setters
    
    public function getId():?int{
        return $this->id_quantity;
    }
    public function setId(?int $id){
        $this->id_quantity = $id;
    }
    public function getAmount():?float{
        return $this->amount_quantity;
    }
    public function setAmount(?float $amount){
        $this->amount_quantity = $amount;
    }
    public function getRecipe():?Recipes{
        return $this->recipes;
    }
    public function setRecipe(?Recipes $recipe ){
        $this->recipes = $recipe;
    }
    public function getIngredient():?Ingredient{
        return $this->ingredient;
    }
    public function setIngredient(?Ingredient $ingredient){
        $this->ingredient = $ingredient;
    }
    public function getUnitMeasure():?UnitMeasure{
        return $this->unitMeasure;
    }
    public function setUnitMeasure(?UnitMeasure $unitMeasure){
        $this->unitMeasure = $unitMeasure;
    }

    //Méthodes
    
    public function add(){
        try {
            $amount = $this->getAmount();
            $req = $this->connexion()->prepare('INSERT INTO quantity(amount)VALUES(?)');
            $req->bindParam(1, $amount, \PDO::PARAM_STR);
            $req->execute();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    //Chercher un roles par son nom en BDD
    public function findOneBy(){
        try {
            $amount = $this->getAmount();
            $req = $this->connexion()->prepare('SELECT id_quantity, amount_quantity FROM
            quantity WHERE amount_quantity = ?');
            $req->bindParam(1, $amount, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, Quantity::class);
            return $req->fetch();
        } 
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
}
?>