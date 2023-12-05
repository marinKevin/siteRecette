<?php ob_start(); ?>
   <form action="" method="post">
        <label for="name_unit_measure">Saisir la nouvelle unité de mesure:</label>
        <input type="text" name="name_unit_measure">
        <input type="submit" value="Ajouter" name="submit">
    </form><br>
    <p><?=$error[0]?></p>
    <?php $content1 = ob_get_clean(); ?>