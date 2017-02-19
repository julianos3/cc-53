<?php
include_once('topo-ajax.php');

$arquivo = $_GET['arquivo'];

$arquivo = PATHUPLOAD.$arquivo; // Aqui a gente só junta o diretório com o nome do arquivo

header('Content-type: octet/stream');
header('Content-disposition: attachment; filename="'.basename($arquivo).'";');
header('Content-Length: '.filesize($arquivo));
readfile($arquivo);
exit;
?>