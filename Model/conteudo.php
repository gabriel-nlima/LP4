<?php ob_start();
?>
<?php 
include_once ('../View/ViewAgenda.php');
                $view = new ViewAgenda();
                $view->exibeRelatorioAgenda();
?>
