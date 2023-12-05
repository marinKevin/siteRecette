<?php
namespace App\Controller;
use App\Model\Ingredient;
use App\Utils\Utilitaire;
class IngredientController extends Ingredient{
    public function addIngredient(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['nom_ingredient'])){
                $this->setNom(Utilitaire::cleanInput($_POST['nom_ingredient']));
                if(!$this->findOneBy()){
                    $this->add();
                    $error = "L'ingredient a été ajouté en BDD";
                }else{
                    $error = "L'ingredient' existe déja";
                }
            }
            else{
                $error = "Veuillez saisir le nom du l'ingredient";
            }
        }
        include './App/Vue/vueAddIngredient.php';
    }
}