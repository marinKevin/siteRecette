 <?php ob_start()?>

    <p>RESULTAT :</p>

    <?php echo "<pre>";
    var_dump($data);
    echo "</pre>";  ?>

    <?php if( is_array($data)){
        foreach($data as $recipes)
            foreach($recipes as $recipe):?>
            <div class="recipe">
                <p><?=$recipe ?></p>
            </div>
        <?php endforeach;
    } else {
        print "$data";

    }
    ?>

<?php $content2 = ob_get_clean()?>