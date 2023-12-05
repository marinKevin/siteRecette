<?php ob_start()?>
    <?php foreach($data as $recipe):?>
        <div class="recette">
            <p><?=$recipe->getName()?></p>
        </div>
    <?php endforeach?>
    <p><?=$error[0]?></p>
<?php $content2 = ob_get_clean();?>