<?php
?>
            <div id="bottom">
                <div id="bottom_menubar">
                    <a href="index.php">Home</a> |
                    <a href="prodotti.php">Prodotti</a> |
                    <a href="contatti.php">Contatti</a> |
                    <a href="dove_siamo.php">Dove Siamo</a> |
                    <a href="note_legali.php">Note Legali</a> |
                    <a href="sitemap.php">Mappa Sito</a>
                    <span style="float:right;">
                      Design &amp; Developement:
                      <a href="finish.php#" class="contatti_personali" id="mario_speranza"> Mario Speranza</a> -
                      <a href="finish.php#" class="contatti_personali" id="gaetano_esposito">Gaetano Esposito</a>
                    </span>
                    <div style="text-align:right;">&copy; 2011 Tutti i diritti sono riservati </div>
                </div>
            </div>
            <div id="mario_speranza_contatti" class="boxContatti" style="top:555px; left:623px; display:none">
              <div class="boxContattiContent link_contatti_personali">
                <div style="text-align:center;">I miei contatti:</div>
                <table style="border:none">
                  <tr>
                    <td><a class="email_personale" href="mailto:mariosperanza88@gmail.com">E-mail</a></td>
                    <td><a href="http://it.linkedin.com/pub/mario-speranza/25/a10/253" onclick="targetBlank(this.href);return false;">LinkedIn</a> <br /></td>
                  </tr>
                  <tr>
                    <td style="padding-right:55px"><a href="http://www.facebook.com/mario.speranza" onclick="targetBlank(this.href);return false;">Facebook</a></td>
                    <td><a href="http://twitter.com/finish.php#!/mr_hope88" onclick="targetBlank(this.href);return false;">Twitter</a></td>
                  </tr>
                </table>
              </div>
              <div class="boxContattiArrow" style="margin: -2px 0 0 80px;">
                <div class="linea10"></div>
                <div class="linea9"></div>
                <div class="linea8"></div>
                <div class="linea7"></div>
                <div class="linea6"></div>
                <div class="linea5"></div>
                <div class="linea4"></div>
                <div class="linea3"></div>
                <div class="linea2"></div>
                <div class="linea1"></div>
              </div>
            </div>
            <div id="gaetano_esposito_contatti" class="boxContatti" style="top:555px; left:730px; display:none;">
              <div class="boxContattiContent link_contatti_personali">
                <div style="text-align:center;">I miei contatti:</div>
                <table style="border:none">
                  <tr>
                    <td><a class="email_personale" href="mailto:espositogaetano87@gmail.com">E-mail</a></td>
                    <td><a href="http://www.linkedin.com/pub/gaetano-esposito/24/8b/636" onclick="targetBlank(this.href);return false;">LinkedIn</a> <br /></td>
                  </tr>
                  <tr>
                    <td style="padding-right:55px"><a href="http://www.facebook.com/gaetano.esposito87" onclick="targetBlank(this.href);return false;">Facebook</a></td>
                    <td><a href="http://twitter.com/finish.php#!/tanux87" onclick="targetBlank(this.href);return false;">Twitter</a></td>
                  </tr>
                </table>
              </div>
              <div class="boxContattiArrow" style="margin: -2px 0 0 80px;">
                <div class="linea10"></div>
                <div class="linea9"></div>
                <div class="linea8"></div>
                <div class="linea7"></div>
                <div class="linea6"></div>
                <div class="linea5"></div>
                <div class="linea4"></div>
                <div class="linea3"></div>
                <div class="linea2"></div>
                <div class="linea1"></div>
              </div>
            </div>
        </div> <!-- chiude content_all-->
        <script type="text/javascript">
          var email;
          $('.contatti_personali').mouseover(function(){
            id=$(this).attr('id');
            if (id == 'mario_speranza'){
              email = 'mariosperanza88@gmail.com';
              $('#gaetano_esposito_contatti').fadeOut();
              mario = $('#'+id+'_contatti');
              mario.fadeIn().click(function(){
                $(this).fadeOut();
              });
            }
            if (id == 'gaetano_esposito'){
              $('#mario_speranza_contatti').fadeOut();
              email = 'espositogaetano87@gmail.com';
              gaetano = $('#'+id+'_contatti');
              gaetano.fadeIn().click(function(){
                $(this).fadeOut();
              });
            }
          });
          $('.email_personale').click(function(){
            alert(email);
          })
        </script>
    </body>
</html>