<?php
require_once 'config.inc.php';
$id_photoset = $_GET['id_photoset'];

$connessione = mysql_connect($nomehost,$nomeuser,$password);
if (!$connessione) {
    die('Non riesco a connettermi: ' . mysql_error());
    exit;
}
else{
  mysql_select_db($nome_db);
}
$query = "SELECT * FROM sottocategoria_prodotto WHERE categoria_prodotto=".$id_photoset;
$result = mysql_query($query);
$i=0;
while ( $row = mysql_fetch_assoc($result) ){
  $dati[$i]['id']=   $row['id'];
  $dati[$i]['nome']= $row['nome'];
  $dati[$i]['logo']= $row['logo'];
  $i++;
}
mysql_close($connessione);
echo json_encode($dati);

?>
 
