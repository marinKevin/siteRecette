<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page_Admin</title>
</head>
<body>
<form action="" method="post">
    <!-- table recipes  -->
        <label for="name_receipe">Nom de la recette:</label>
        <input type="text" name="name_recipe">
        <label for="steps_recipe">Etapes de la recette:</label>
        <input type="text" name="steps-recipe">
        <input type="submit" value="Ajouter" name="submit">
    <!-- table ingredient -->
    <label for="nom_ingredient">Saisir l'ingredient:</label>
        <input type="text" name="nom_ingredient">
    <!-- table quantity  -->
    <label for="amount_quantity">Saisir l'ingredient:</label>
        <input type="number" name="amount_quantity">

    </form>
</body>
</html>