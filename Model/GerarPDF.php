<?php
ob_clean();
include_once('conexaoBD.php');
include_once('mpdf60/mpdf.php');

class GerarRelatorio extends mpdf{
	function __construct()
  {
    ob_clean();
    ob_start();
    include_once ('conteudo.php');
    //$mpdf->debug = true;
    //$nomeArquivo = "dados.html";
    $html = ob_get_clean();
    $css = file_get_contents('../View/Templates/css/estiloPDF.css');
    $mpdf = new mPDF();
    //$mpdf->allow_charset_conversion = true;
    //$mpdf->charset_in = 'utf-8';
    $mpdf->WriteHTML($css,1);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    //unlink($nomeArquivo);
    //ob_clean();
    exit;
  }
}
?>