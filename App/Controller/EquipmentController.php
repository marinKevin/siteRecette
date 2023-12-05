<?php
namespace App\Controller;
use App\Model\Equipment;
use App\Utils\Utilitaire;
class EquipmentController extends Equipment{
    public function addEquipment(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['name_equipment'])){
                $this->setNom(Utilitaire::cleanInput($_POST['name_equipment']));
                if(!$this->findOneBy()){
                    $this->add();
                    $error = "L'ustensile a été ajouté en BDD";
                }else{
                    $error = "L'ustensile' existe déja";
                }
            }
            else{
                $error = "Veuillez saisir le nom du l'ustensile";
            }
        }
        include './App/Vue/vueAddEquiment.php';
    }
}
