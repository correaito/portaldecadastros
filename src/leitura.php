<!-- Cabeçalho -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-BR">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
 <meta http-equiv="Content-language" content="pt-BR" />

<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>Notícias Dev Media</title> 
</head> 
<body> 
	
	<h1>Notícias Dev Media</h1> 


	<?php 

header('Content-Type: text/html; charset=utf-8');


	$link = "http://www.devmedia.com.br/xml/devmedia_full.xml";
	 //link do arquivo xml 
	$xml = simplexml_load_file($link) -> channel; //carrega o arquivo XML e retornando um Array 
	foreach($xml -> item as $item){ //faz o loop nas tag com o nome "item" //exibe o valor das tags que estão dentro da tag "item" //utilizamos a função "utf8_decode" para exibir os caracteres corretamente 
	echo "<strong>Título:</strong> ".($item -> title)."<br />"; 
	echo "<strong>Link:</strong> ".($item -> link)."<br />"; 
	echo "<strong>Descrição:</strong> ".($item -> description)."<br />"; 
	echo "<strong>Autor:</strong> ".($item -> author)."<br />"; 
	echo "<strong>Data:</strong> ".($item -> pubDate)."<br />"; 
	echo "<br />"; 
	} //fim do foreach 

	?>

	 </body>
	  </html>

