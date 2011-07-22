<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Gaetano Esposito
 * Date: 21/07/11
 * Time: 15.25
 * To change this template use File | Settings | File Templates.
 */
require_once 'phpFlickr/phpFlickr.php';
$api_key = '24ae51960a8362527dc74421d11d3829';
$secret = '684b43edfd2501d4';
$user_id = '65433983@N07';
$die_on_error = false;
$flickr = new phpFlickr($api_key,$secret,$die_on_error);
//$flickr->enableCache("db", "mysql://puntocasa:mino4ever@mysql.netsons.com/puntocasa");
$photosets = $flickr->photosets_getList($user_id);
$num_sets = sizeof($photosets['photoset']);
$num_set_into_li = 3;
if ($num_sets <4)
  $num_li = 1;
elseif ( ($num_sets % $num_set_into_li) == 0)
  $num_li = $num_sets / $num_set_into_li;
else
  $num_li = floor(($num_sets / $num_set_into_li)) + 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Immagini | Dott.Salvatore Coppola - Oculista di Avellino</title>
    <meta name="description" content="Immagini del Dott.Salvatore Coppola, oculista di avellino" />
    <script src="js/jquery.newslider.js"></script>
    <link rel="stylesheet" href="css/newslider.css" type="text/css" />
<?php   require_once 'init.php'; ?>
    <script type="text/javascript">
      $(document).ready(function() {
        newsSlider();
      });
    </script>
    <div id="news_block">
        <div class="news_slider">
          <ul class="slides">
            <?php
              $index = 0;
              for ($i=0; $i<$num_li; $i++){  //creo i vari <li>
            ?>
                <li>
            <?php
                for ($j=0; $j<$num_set_into_li; $j++) //creo i div da mettere nel j-esimo <li>
                {
                  $photoset = $photosets['photoset'][$index];
                  $id_photoset = $photoset['id'];
                  $nome_photoset = $photoset['title'];
                  $num_photos = $photoset['photos'];
                  $farm = $photoset['farm'];
                  $server = $photoset['server'];
                  $id_primary = $photoset['primary'];
                  $secret = $photoset['secret'];
                  $url_photo = 'http://farm'.$farm.'.static.flickr.com/'.$server.'/'.$id_primary.'_'.$secret.'_m.jpg';
                  if ($j< ($num_set_into_li-1))
                    $nome_classe = "news_box";
                  elseif ($j == ($num_set_into_li-1))
                    $nome_classe = "news_box last";
            ?>
                  <div class="<?php echo $nome_classe?>" id="<?php echo $id_photoset?>">
                    <div class="bg_set" id="<?php echo $id_photoset?>" title="<?php echo $num_photos?>"></div>
                    <div class="thumbnail_content">
                      <img class="thumbnail" id="<?php echo $id_photoset?>" src="<?php echo $url_photo?>" style="opacity:0.3"/>
                    </div>
                    <div class="nome_album" id="<?php echo $id_photoset?>" >
                      <?php echo $nome_photoset?>
                    </div>
                  </div>
            <?php
                  $index++;
                  if ($index === $num_sets)
                    break;
                }
            ?>
            </li>
            <?php
            }
            ?>
           </ul> <!-- chiude slides -->
        </div> <!-- chiude news_slider -->
    </div> <!-- Chiude id="contenuto" -->        
    <div class="news_slider-left"></div>
    <div class="news_slider-right"></div>
<?php  require_once 'finish.php'?>

