<?php ob_start()?>

    <h1>Search Engine</h1>

    <form id="formSearch" method="POST" action="#">
        <input type="text" name="ingredient" placeholder="Ingredient..."> 
        <input type="submit" name="submit" value="chercher"> 
    </form>



<?php $content1 = ob_get_clean();?>