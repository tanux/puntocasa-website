<?php
$id_photoset = $_GET['id_photoset'];
$nome_photoset = $_GET['nome_photoset'];
?>
<html>
  <head>
    <style type="text/css">
      #content_galleria {
        background-color: #F5F5F5;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.4);
        margin: 0 auto;
        padding: 5px;
        width: 450px;
      }
      .galleria-layer div {
        background: url("img/bg-div-galleria-layer.png") repeat scroll 0 0 transparent;
        color: #FFFFFF;
        left: 10px;
        padding: 10px;
        position: absolute;
        top: 335px;
      }
    </style>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
    <script src="js/galleria-1.2.5.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/galleria.classic.css" type="text/css" />
    <script type="text/javascript">
      function get_flickr_images( id ) {
        api_key='24ae51960a8362527dc74421d11d3829';
        photoset_id=id;
        url= 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key='+api_key+'&photoset_id='+photoset_id+'&format=json&jsoncallback=?';
        var dati = [];
        $.getJSON(url, function(data) {
          $.each(data.photoset.photo, function(i,item){
            var photoUrl = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_b.jpg'
            var thumbnailUrl = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_s.jpg'
            dati.push({
              image: photoUrl,
              thumb: thumbnailUrl,
              layer: '<div>'+item.title+'</div>'
            });
          });
          Galleria.loadTheme('js/galleria.classic.min.js');
          $('#galleria').galleria({
            height:450,
            dataSource:dati,
            lightbox: true
          });
        });
      }
      $(document).ready(function(){
        id = $('div.comodo').attr('id');
        get_flickr_images(id);
      });
    </script>
 
  </head>
  <body>
    <div class="comodo" id="<?php echo $id_photoset?>" title="<?php echo $nome_photoset?>"></div>    
    <div id="content_galleria">
      <div id="galleria"></div>
    </div>
  </body>
</html>
