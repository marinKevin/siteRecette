<?php
namespace App\Controller;
use App\Model\Quantity;
use App\Utils\Utilitaire;
class QuantityController extends Quantity{
    public function addQuantity(){
        $error = "";
        if(isset($_POST['submit'])){
            if(!empty($_POST['amount_quantity'])){
                $this->setAmount(Utilitaire::cleanInput($_POST['amount_quantity']));
                $this->add();
                $error = "Quantité ajouté en BDD";
            }
            else{
                $error = "Veuillez saisir la quantité";
            }
        }
        include './App/Vue/vueAddQuantity.php';
    }
}
