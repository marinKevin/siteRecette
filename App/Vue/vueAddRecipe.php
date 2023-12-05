<?php ob_start(); ?>   
   <form action="" method="post">
        <label for="name_receipe">Nom de la recette:</label>
        <input type="text" name="name_recipe">
        <label for="steps_recipe">Etapes de la recette:</label>
        <textarea name="steps_recipe"></textarea>
        <label for="time">Temps de la recette</label>
        <select name="time">
            <option value=""></option>
        <?php foreach($times as $t){ ?>
            <option value= "<?= $t['id_time']?>"><?= $t['name_time']?></option>    
            <?php } ?>
        </select>
        <label for="equipment">Ustensiles</label>
        <select name="equipment">
            <option value=""></option>
        <?php foreach($equiments as $e){ ?>
            <option value= "<?= $e['id_equipment']?>"><?= $e['name_equipment']?></option>    
            <?php } ?>
        </select>
        <input type="submit" value="Ajouter" name="submit">
        <div><?=$error?></div>
    </form><br>
<?php $content = ob_get_clean(); ?>