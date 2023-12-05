<?php ob_start()?>
    <?php foreach($data as $unit):?>
        <div class="UniteDeMesure">
            <p><?=$unit->getNom()?></p>
            <a href="./unit?id_unit_measure=<?=$unit->getId()?>">modifier</a>
        </div>
    <?php endforeach?>
    <p><?=$error[1]?></p>
<?php $content2 = ob_get_clean();?>