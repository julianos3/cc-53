<?php
if($tituloBlog != ''){
    
    $objBlog = new Blog();
    $objBlog->id=$exp['1'];
    $objBlog->carregar();
    
    $title = $objBlog->titulo;
}else{
    $title = "Blog";
}

$ativo = "blog";
$subAtivo = $seoCategoria;
include_once ("site/public/inc/cabecalho.php");

if(($exp[2] == "pagina") || ($exp[2] == '')){
    include 'site/blog_lista.php';
}else{
    if((is_integer($exp[1])) || (is_string($exp[2]))){
    /*
        if($exp[1] != 'pagina' and $exp[1] != 'busca'){
            $blog = Blog::listar("and b.ativo = 's' and bi.principal = 's' and b.id = ".$exp[1]);
            if(is_array($blog)){
                $objBlog = current($blog);
                include 'site/blog_individual.php';
            }}else{
            include 'site/blog_lista.php';
        }
        */
                include 'site/blog_individual.php';
    }else{
        include 'site/blog_lista.php';
    }
}
include_once ("site/public/inc/rodape.php");

?>