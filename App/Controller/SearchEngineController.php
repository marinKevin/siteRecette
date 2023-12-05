<?php
namespace App\Controller;

use App\Model\SearchEngine;
use App\Vue\Template;
use App\Utils\Utilitaire;

class SearchEngineController extends SearchEngine {
    public function search(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['ingredient'])){
                $this->setIngredient(Utilitaire::cleanInput($_POST['ingredient']));
                $recipe = $this->find();
                if(!empty($recipe)){
                    return $recipe;
                }
                $error = "Il n'y a pas de recette utilisant ces ingredients";               
            }
            else{
                $error = "Veuillez saisir un ingredient";
            }
        }
        return $error;


    }
    public function useFiltersTimes(){
        $error = "";
        $filterTimes = $this->getFilterTimes();

    
        if(!empty($filterTimes)){
            return $filterTimes;
        } 
        $error = "il n'y a pas de filtre !";
        return $error;
        
    }

    public function multiFilter($oldData){
        $newOldData = $oldData;

        $donneesFiltre = $_POST['timeChoice'];
        var_dump($donneesFiltre);

        // if(isset($_POST['submitFilter'])){
        //     $choice = $_POST['timeChoice'];
        //     var_dump($choice);
        //     return $this->toFilterTimes($choice, $newOldData);
            
        // }
    }

    public function pageAcceuil(){
        $data = $this->search();
        $data2 = $this->useFiltersTimes();
        $data_multiFilter = $this->multiFilter($data);
       
        Template::renderAcceuil(
            'nav.php',
            'Acceuil',
            ['vueSearchEngine.php', 'vueSearchEngineFilter.php', 'vueSearchEngineResult.php'],
            'footer.php',
            ['script1.js', 'script2.js'],
            ['main.css', 'style.css'],
            $data,
            $data2,
            $data_multiFilter
        );
    }
} 