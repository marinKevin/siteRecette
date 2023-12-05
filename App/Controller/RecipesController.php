<?php
namespace App\Controller;
use App\Model\Recipes;
use App\Utils\Utilitaire;
use App\Vue\Template;
class RecipesController extends Recipes{
    // public function addRecipe(){
    //     $error = "";
    //     if(isset($_POST['submit'])){
    //         if(!empty($_POST['name_recipe']) and !empty($_POST['steps_recipe'])){
                
    //             $this->setName(Utilitaire::cleanInput($_POST['name_recipe']));
    //             $this->setSteps(Utilitaire::cleanInput($_POST['steps_recipe']));
    //             if($_POST['id_time'] !== ''){
    //                 $this->getTime()->setId(Utilitaire::cleanInput($_POST['id_time']));
    //             }else{
    //                 $this->getTime()->setId(null);
    //             }
    //             if($_POST['id_equipment'] !== ''){
    //                 $this->getEquipment()->setId(Utilitaire::cleanInput($_POST['id_equipment']));
    //             }else{
    //                 $this->getEquipment()->setId(null);
    //             }                
    //             if(!$this->findOneBy()){
    //                 $this->add();
    //                 $error = "La recette a été ajouté en BDD";
    //             }else{
    //                 $error = "La recette existe déja";
    //             }
    //         }else{
    //             $error = "Veuillez saisir les deux champs";
    //         }
    //     }
        // Template::render('nav.php','NewRecipe','vueAddRecipe.php','footer.php',$error, [],[]);
        // var_dump(Template::render("nav.php",'NewRecipe','vueAddRecipe.php','footer.php',"$error"));
    // }
    public function getAllRecipes(){
        $errorGet = "";
        $recipes = $this->findAll();
        
        if(empty($recipes)){
            $errorGet = "Il n'y à aucune unité de mesure enregistré";
        }
        return $errorGet;
        /*Template::render('nav.php','New Unit Measure','vueAllUnitMeasure.php','footer.php', ['script1.js', 'script2.js'],['main.css', 'style.css'], $error, $units);*/
    }

}