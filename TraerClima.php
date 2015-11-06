<?php
$articulos = simplexml_load_string(file_get_contents("http://clarin.feedsportal.com/c/33088/f/577681/index.rss"));
$num_noticia=1;
$max_noticias=5;
foreach($articulos->channel->item as $noticia)
{ 
	echo "    
        <h1><a href=$noticia->link>$noticia->title</a></h1>
        $noticia->description
        
    	 ";
    $num_noticia++;
    if($num_noticia > $max_noticias)
    {
        break;
    }
}
?>
