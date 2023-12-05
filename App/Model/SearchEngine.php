<?php
namespace App\Model;
use App\Utils\BddConnect;
class SearchEngine extends BddConnect{
    private ?string $recipeMatch;
    private ?string $ingredient;
    private  $dataToFilter;
    public function getRecipe():?string{
        return $this->recipeMatch;
    }
    public function setRecipe(?string $recipe){
        $this->recipeMatch = $recipe;
    }
    public function getIngredient():?string{
        return $this->ingredient;
    }
    public function setIngredient(?string $newIngredient){
        $this->ingredient = $newIngredient;
    }
    public function getDataToFilter(){
        return $this->dataToFilter;
    }
    public function setDataToFilter($newDataToFilter){
        $this->dataToFilter = $newDataToFilter;
    }
    public function find(){
        try{
            $ing = $this->getIngredient();
            $req = $this->connexion()->prepare('SELECT name_recipe FROM to_cook INNER JOIN ingredient ON to_cook.id_ingredient = ingredient.id_ingredient INNER JOIN recipe ON to_cook.id_recipe = recipe.id_recipe WHERE name_ingredient = ?');
            $req->bindParam(1, $ing, \PDO::PARAM_STR);
            $req->execute();
            $req->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, SearchEngine::class);
            return $req->fetchAll();
        }
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function getFilterTimes(){
        try{
            $req = $this->connexion()->query('SELECT name_time, id_time FROM times');
            $req->execute();
            return $req->fetchAll(\PDO::FETCH_ASSOC);
        }
        catch (\Exception $e) {
            die('Error : '.$e->getMessage());
        }
    }
    public function toFilterTimes($filter, $newOldData){

        // var_dump($newOldData);
        // try {
        //     /*$oldData = $this->getDataToFilter();*/

            

        //     $request = 'SELECT name_recipe FROM recipe WHERE name_recipe = ';

        //     if(is_array($oldData)){
        //         foreach($oldData as $recipe){
        //             $request .= ' ? OR ';
        //         }
        //         $request = rtrim($request, ' OR ');
        //     }else{
        //         var_dump($oldData);
        //         echo "Ajoutez des ingredients";
                
        //     }
            


        //     switch ($filter){
        //         case "":
        //             $time = "";
        //             break;
        //         case "Très rapide (moins de 30 minutes)":
        //             $time = 'AND id_times = 1';
        //             break;
        //         case "Rapide (entre 30 minutes et une heure)":
        //             $time = 'AND id_times = 2';
        //             break;
        //         case "Long (entre une heure et deux)":
        //             $time = 'AND id_times = 3';
        //             break;
        //         case  "Très long (plus de deux heures)":
        //             $time = 'AND id_times = 4';
        //             break;
        //         default:
        //             $time = "";
        //             break;
        //     }
        //     $request .= $time;
        //     $req = $this->connexion()->prepare($request);
        //     $num = 1;
        //     foreach($oldData as $recipe){  
        //         $req->bindParam($num, $recipe, \PDO::PARAM_STR);
        //         $num ++;
        //     }
        //     $req->execute();
        //     return $req->fetchAll(\PDO::FETCH_CLASS| \PDO::FETCH_PROPS_LATE, SearchEngine::class);
        // } catch (\Exception $e) {
        //     die('Error : '.$e->getMessage());
        // }
    }



}
