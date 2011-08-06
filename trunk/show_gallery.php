<?php
$id_photoset = $_GET['id_photoset'];
?>
<html>
  <head>
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="js/galleria-1.2.3.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      function get_flickr_images( id ) {
        api_key='24ae51960a8362527dc74421d11d3829';
        photoset_id=id;
        url= 'http://api.flickr.com/services/rest/?&method=flickr.photosets.getPhotos&api_key='+api_key+'&photoset_id='+photoset_id+'&format=json&jsoncallback=?';
        $.getJSON(url, function(data) {
          $.each(data.photoset.photo, function(i,item){
            var photoUrl = 'http://farm' + item.farm + '.static.flickr.com/' + item.server + '/' + item.id + '_' + item.secret + '_b.jpg'
            $("<img />").attr("src" , photoUrl).appendTo('#galleria');
          });
          Galleria.loadTheme('js/galleria.classic.min.js');
          $('#galleria').galleria({
            width:450,
            height:450,
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
    <div class="comodo" id="<?php echo $id_photoset?>"></div>
    <div id="content_galleria">
      <div id="galleria"></div>
    </div>
  </body>
</html>
