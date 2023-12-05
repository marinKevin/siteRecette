<?php
namespace App\Controller;
use App\Model\Time;
use App\Utils\Utilitaire;
class TimeController extends Time{
    public function addTime(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['name_time'])){
                $this->setNom(Utilitaire::cleanInput($_POST['name_time']));
                if(!$this->findOneBy()){
                    $this->add();
                    $error = "Le temps a été ajouté en BDD";
                }else{
                    $error = "Le temps existe déja";
                }
            }
            else{
                $error = "Veuillez saisir le temps";
            }
        }
        include './App/Vue/vueAddTime.php';
    }
}