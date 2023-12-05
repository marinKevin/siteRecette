<?php ob_start() ?>

<form id="formFilter" method="POST" action="#">
    <select name="timeChoice" >
        <option value="Yeeeeesssssss">Hooooo</option>

        <?php if (is_array($data2)) {
            foreach ($data2 as $times) : ?>
                <option value="<?= $times['name_time'] ?>"><?= $times['name_time'] ?></option>
            <?php endforeach;
        } else {
            print $data2;
        }
        ?>
    </select>
    <input type="submit" name="submitFilter" value="Filtrer">
</form>

<?php 
 if(isset($_POST["submitFilter"])){
    $testRecup = $_POST["timeChoice"];
    var_dump($testRecup);
 }
?>

<script>
    document.getElementById('formFilter').addEventListener('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        console.log(formData);
        fetch('/mvc_frigo/acceuil', {
            method: 'POST',
            body: formData
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

<?php $content3 = ob_get_clean() ?>
