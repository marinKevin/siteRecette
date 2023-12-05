<?php
    require_once './autoload.php';
    use App\Controller\EquipmentController;
    use App\Controller\IngredientController;
    use App\Controller\QuantityController;
    use App\Controller\RecipesController;
    use App\Controller\TimeController;
    use App\Controller\UnitMeasureController;
    use App\Controller\SearchEngineController;
    $equipmentController = new EquipmentController;  
    $ingredientController = new IngredientController;
    $quantityController = new QuantityController;
    $recipesController = new RecipesController;
    $timeController =new TimeController;
    $unitMeasureController = new UnitMeasureController;
    $searchEngineController = new SearchEngineController;
    session_start();
    $url = parse_url($_SERVER['REQUEST_URI']);
    $path = isset($url['path']) ? $url['path'] : '/';
    switch ($path) {
        case '/mvc_frigo/':
            include './home.php';
            break;
        case '/mvc_frigo/test':
            include './test.php';
            break;
        case '/mvc_frigo/admin':
            include_once './App/Controller/AdminController.php';
            // $recipesController->addRecipe();
            break;
        /*case '/mvc_frigo/recette':
            $recipesController->addRecipe();
            break;*/
        case '/mvc_frigo/unit':
            $unitMeasureController->pageAdminUnitMeasure();
            break;
        case '/mvc_frigo/acceuil':
            $searchEngineController->pageAcceuil();
            break;
        default:
            include './error.php';
            break;
    }
?>