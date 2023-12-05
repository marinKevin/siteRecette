<?php
namespace App\Controller;
use App\Controller\RecipesController;
use App\Controller\IngredientController;
use App\Controller\QuantityController;
use App\Controller\TimeController;
use App\Controller\EquipmentController;
use App\Controller\UnitMeasureController;
use App\Utils\Utilitaire;

$equipmentController = new EquipmentController;  
$ingredientController = new IngredientController;
$quantityController = new QuantityController;
$recipesController = new RecipesController;
$timeController =new TimeController;
$unitMeasureController = new UnitMeasureController;

include './App/Vue/vueHeader.php';
$recipesController ->addRecipe();
$quantityController->addQuantity();
include './App/Vue/vueFooter.php';




?>