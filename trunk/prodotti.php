<?php
require_once 'inc.php/titolo_sito.inc.php';
require_once 'inc.php/config.inc.php';
$connessione = mysql_connect($nomehost,$nomeuser,$password);
if (!$connessione) {
    die('Non posso connettermi: ' . mysql_error());
    exit;
}
else{
  mysql_select_db($nome_db);
}
/*Prelevo i dati per la creazione dell'elenco dei prodotti*/
$query = "SELECT * FROM categoria_prodotto";
$result = mysql_query($query);
mysql_close($connessione);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Prodotti | <?php echo $titolo_sito ?></title>
    <meta name="description" content="Prodotti di Puntocasa Tendaggi: Tende da sole, Tende da interno, Zanzariere, Veneziane" />
    <link rel="stylesheet" href="css/newslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/nyroModal.css" type="text/css" media="screen" />
<?php   require_once 'init.php'; ?>
    <div id="titolo_pagina_corrente">Prodotti</div>
    <div id="content_categorie_prodotti">
      <?php
        while ( $row = mysql_fetch_assoc($result) )
        {
      ?>
          <div id="<?php echo $row['id']; ?>" class="categoria_prodotto">
            <div class="thumbnail_categoria">
              <img src="<?php echo $row['logo']; ?>" style="width:75px; height:75px;" alt="Logo di <?php echo $row['nome']; ?>"/>
            </div>
            <div class="testo_associato">
              <div class="nome_categoria"><?php echo $row['nome']; ?></div>
              <hr />
              <div class="descrizione_categoria"><?php echo $row['descrizione']; ?></div>
            </div>
          </div>
      <?php
        }
      ?>
    </div>
    <div class="incavatura" id="incavatura_up"></div>
    <div class="incavatura" id="incavatura_down"></div>
    <div id="news_block">
        <div class="news_slider">
          <ul class="slides">
          </ul> <!-- chiude slides -->
        </div> <!-- chiude news_slider -->
    </div> <!-- Chiude id="contenuto" -->
    <div class="news_slider-left"></div>
    <div class="news_slider-right"></div>
    <script type="text/javascript" src="js/jquery.nyroModal.custom.js"></script>
    <!--[if IE 6]>
      <script type="text/javascript" src="js/jquery.nyroModal-ie6.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
      //Creazione album in base alla categoria di prodotto scelta
      $('.categoria_prodotto').click(function(){
        $('#news_block').animate({
          width:"124px",
          left:"18px"
        }, 700).css('z-index','0');
        $('ul.slides').html('').css('top','0px');
        $('.news_slider-right').hide();
        $('.news_slider-left').hide();
        id_set = $(this).attr('id');
        $.getJSON('crea_albums.php', {id_photoset: id_set}, function(data){
          num_sets = data.length;
          num_set_into_li = 3;
          if (num_sets <4)
            num_li = 1;
          else if ( (num_sets % num_set_into_li) == 0)
            num_li = num_sets / num_set_into_li;
          else
            num_li = Math.floor((num_sets / num_set_into_li)) + 1;
          for (i=0; i<num_li; i++)
            $('ul.slides').append('<li title="'+i+'"></li>');
          var index = 0;
          var j=0;
          $.each((data), function(i,item){
            if (j == num_set_into_li){
              j=0;
              index++;
            }
            li = $('li[title='+index+']');
            var id_photoset = item.id;
            var nome_photoset = item.nome;
            var url_photo = item.logo;
            if (j < (num_set_into_li-1))
              var nome_classe = 'news_box';
            else if (j == (num_set_into_li-1)){
              nome_classe = 'news_box last';
            }
            li.append("<div class='"+nome_classe+"' id='"+id_photoset+"'>"+
                        "<div class='bg_set' id='"+id_photoset+"'></div>"+
                        "<div class='thumbnail_content'>"+
                          "<div class='gallery clearfix'  id='"+id_photoset+"'>"+
                            "<img class='thumbnail' id='"+id_photoset+"' src='"+url_photo+"' />"+
                          "</div>"+
                        "</div>"+
                        "<div class='nome_album' id='"+id_photoset+"'>"+
                          "<a target='_blank' href='show_gallery.php?id_photoset="+id_photoset+"&nome_photoset="+nome_photoset+"' class='nyroModal link_nome_album' id='"+id_photoset+"'>"+nome_photoset+"</a>"+
                        "</div>"+
                      "</div>");
            j++;
          });
          numeroLiPoint = $(".news_slider li").size();
          largLi = $("ul.slides li").height()+49;
          largLiTot = numeroLiPoint*largLi;
          termina = (largLiTot-largLi);
          if (numeroLiPoint >1){
            $('.incavatura').show();
            $('.news_slider-right').show();
            $('.news_slider-left').show();
          }
        });
      });
      $('a.link_nome_album').live("mouseover", function(){
        $('.nyroModal').nyroModal();
        id = id = $(this).attr('id');
        $('#'+id+' img.thumbnail').animate({opacity:'1'}, 500);
      }).live("mouseleave", function(){
          $('#'+id+' img.thumbnail').animate({opacity:'0.2'}, 300);
      });
      $('.categoria_prodotto').mouseover(function(){
        id = $(this).attr('id');
        $('#'+id+' .thumbnail_categoria').css('opacity','1');
      }).mouseleave(function(){
          $('#'+id+' .thumbnail_categoria').css('opacity','0.2');
      });
      //up
      $('.news_slider-left').live("click", function(){
        boxUl = $(".news_slider ul.slides");
        if ( boxUl.css('top') != '0px')
          boxUl.animate({top:"+="+largLi+"px"}, 1000,'easeOutBack');
        else
          return;
      });
      //down
      $('.news_slider-right').live("click", function(){
        boxUl = $(".news_slider ul.slides");
        if ( boxUl.css('top') != -termina+'px')
          boxUl.animate({top:"-="+largLi+"px"}, 1000,'easeOutBack');
        else
          return;
      });
    </script>
<?php  require_once 'finish.php'?>

