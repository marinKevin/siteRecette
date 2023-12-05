<?php
namespace App\Controller;
use App\Model\UnitMeasure;
use App\Utils\Utilitaire;
use App\Vue\Template;
class UnitMeasureController extends UnitMeasure{

    public function addUnitMeasure(){
        $errorAdd = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['name_unit_measure'])){
                $this->setNom(Utilitaire::cleanInput($_POST['name_unit_measure']));
                if(!$this->findOneBy()){
                    $this->add();
                    $errorAdd = "L'unité de mesure a été ajouté en BDD";
                }else{
                    $errorAdd = "L'unité existe déja";
                }
            }
            else{
                $errorAdd = "Veuillez saisir la nouvelle unité de mesure";
            }
        }
        return $errorAdd;
        /*Template::render('nav.php','New Unit Measure','vueAddUnitMeasure.php','footer.php',$error, ['script1.js', 'script2.js'],['main.css', 'style.css']);*/
    }
    public function getAllUnitMeasure(){
        $errorGet = "";
        $units = $this->findAll();
        
        if(empty($units)){
            $errorGet = "Il n'y à aucune unité de mesure enregistré";
        }
        return $errorGet;
        /*Template::render('nav.php','New Unit Measure','vueAllUnitMeasure.php','footer.php', ['script1.js', 'script2.js'],['main.css', 'style.css'], $error, $units);*/
    }
    public function updateChocoblast(){
        $errorUp ="";
        $data = null;
        
        if(isset($_GET['id_unit_measure'])){
            if(!empty($_GET['id_unit_measure'])){
                $this->setId(Utilitaire::cleanInput($_GET['id_unit_measure']));
                $unit = $this->find();
                if($unit){
                    $data = $unit;
                    if(isset($_POST['submit'])){
                        if(!empty($_POST['name_unit_measure'])){
                            $name = Utilitaire::cleanInput($_POST['name_unit_measure']);
                            $this->setNom($name);
                            $this->update();
                            $errorUp = "L'unité de mesure a été mise a jour";
                        } else{
                             $errorUp = "Veuillez remplir le champ du formulaire";
                        }
                    }   
                } else{
                    $errorUp = "L'unité n'existe pas";
                }
            } else{
                $errorUp = "Les valeurs des paramètres sont vides";
            }
        } else{
            $errorUp = "Les paramètres sont invalides";
        }
        return $errorUp;
    }
    public function pageAdminUnitMeasure(){
        $units = $this->findAll();
        $this->addUnitMeasure();
        $errorAdd = $this->addUnitMeasure();
        $this->getAllUnitMeasure();
        $errorGet = $this->getAllUnitMeasure();
        Template::renderAdmin(
            'nav.php',
            'final Measure',
            ['vueAddUnitMeasure.php', 'vueAllUnitMeasure.php'],
            'footer.php',
            ['script1.js', 'script2.js'],
            ['main.css', 'style.css'],
            [$errorAdd, $errorGet],
            $units
        );
    }


}