<?php
namespace App\vue;
class Template{
    public static function render($navbar,$title,$content,$footer, array $js, array $css, $error, $data = null){
            include './App/Vue/'.$navbar;
            include './App/Vue/'.$footer;
            include './App/Vue/'.$content;
            include './App/Vue/vueTemplate_render.php';
    }
    public static function renderAdmin($navbar,$title, array $contents,$footer, array $js,array $css, array $error, $data=null){
        include './App/Vue/'.$navbar;
        include './App/Vue/'.$footer;
        foreach($contents as $content){
                include './App/Vue/'.$content;
        }
        include './App/Vue/vueTemplate_renderAdmin.php';
}
public static function renderAcceuil($navbar, $title, array $contents, $footer, array $js, array $css, $data=null, $data2=null, $data_multiFilter = null){
        include './App/Vue/'.$navbar;
        include './App/Vue/'.$footer;
        foreach($contents as $content){
                include './App/Vue/'.$content;
        }
        include './App/Vue/vueTemplate_renderAcceuil.php';
}
}



?>
