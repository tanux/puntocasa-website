<h1>Log Aggiornamento database PuntoCasa</h1>
<br />
<?php
require_once '../phpFlickr/phpFlickr.php';
require_once 'config.inc.php';

$api_key = '24ae51960a8362527dc74421d11d3829';
$secret = '684b43edfd2501d4';
$user_id = '65433983@N07';
$die_on_error = false;
$flickr = new phpFlickr($api_key,$secret,$die_on_error);
$photosets = $flickr->photosets_getList($user_id);


echo "Ora mi connetto al server in cui risiede il database <br />";
$connessione = mysql_connect($nomehost,$nomeuser,$password);
if (!$connessione) {
    die('Errore nella connessione al server in cui risiede il database: ' . mysql_error());
    echo "<br /> Lo script è terminato";
    exit;
}
else{
  echo "Connessione al server avvenuta con successo";
  echo "<br /> Ora seleziono il database";
  if (mysql_select_db($nome_db)){
    echo "<br /> Database selezionato con successo <br />";
  }
  else{
    die('Errore nella selezione del database: ' . mysql_error());
    echo "<br /> Lo script è terminato";
    exit;
  }
}
/* Popolo la tabella sottocategoria_prodotti coi dati presi da Flickr */
foreach ($photosets['photoset'] as $photoset)
{
  $id_photoset = $photoset['id'];
  $nome_photoset = $photoset['title'];
  $descrizione = $photoset['description'];
  $categoria = 0;
  if ($descrizione === "esterne")
    $categoria = 1;
  elseif ($descrizione === "interne")
    $categoria = 2;
  elseif ($descrizione === "zanzariere")
    $categoria = 3;
  $num_photos = $photoset['photos'];
  $farm = $photoset['farm'];
  $server = $photoset['server'];
  $id_primary = $photoset['primary'];
  $secret = $photoset['secret'];
  $url_photo = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$id_primary.'_'.$secret.'_m.jpg';
  $result = mysql_insert('sottocategoria_prodotto', array(
                                               'id' => $id_photoset,
                                               'nome' => $nome_photoset,
                                               'logo' => $url_photo,
                                               'categoria_prodotto' => $categoria,
                                          ));
  if (!$result) {
    $update_query = 'UPDATE sottocategoria_prodotto SET nome="'.$nome_photoset.'", logo="'.$url_photo.'" WHERE id='.$id_photoset;
    $result_update = mysql_query($update_query);
    if (!$result_update){
      die('Errore nella connessione al server in cui risiede il database: ' . mysql_error());
      echo "<br /> Lo script è terminato";
      exit;
    }
  }
}
mysql_close($connessione);
echo "<br /> Aggiornamento del database di Punto Casa avvenuto con successo!";


function mysql_insert($table, $inserts) {
  $values = array_map('mysql_real_escape_string', array_values($inserts));
  $keys = array_keys($inserts);
  return mysql_query('INSERT INTO `'.$table.'` (`'.implode('`,`', $keys).'`) VALUES (\''.implode('\',\'', $values).'\')');
}