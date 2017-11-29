
<div class="container">
    <div class="row">
        <div class="box">

            <div class="text-center col-lg-12">
                <h4>
                   Nos certificats
                </h4>
                <hr>

                <?php
                foreach ($tab as $v) {

                    $vId = htmlspecialchars($v->getIdLien());
                    $vLib = htmlspecialchars($v->getLibelle());
                    $vImg = $v->getImage();
                    $vLien = htmlspecialchars($v->getLienweb());

                    echo <<<EOF
                     
                     <a href="{$vLien}" class="img-thumbnailLiens" target="_blank">
                        <img src="./images/{$vImg}.jpg" alt="..." class="img-responsive ">
                      </a>
                  
                       
EOF;

                    if (isset($_SESSION['login']) && Session::is_admin()) {
                        echo <<<EOF
                     <br>
                        
                            
                            
        
                         <a href="index.php?action=deleteP&idLien={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                        
                        <form action = "index.php?action=updateP" method = "POST">
                            <input type="hidden" name="idLien" value=$vId />
                            <input type="hidden" name="libelle" value=$vLib />
                            <input type="hidden" name="image" value=$vImg />
                            <input type="hidden" name="lien" value=$vLien />
                            <br>
                             <button type="submit" class="btn btn-info">Modifier</button>
                         </form> <br>
                  <hr>
                     
EOF;
                    }
                }
                ?>




            </div>

        </div>

        <div class="box">
            <div class="text-center col-lg-12">
                <h4>
                    Nos Partenaires
                </h4>
                <hr>
                
                <?php
                foreach ($tab_produit as $v) {

                    $vId = htmlspecialchars($v->getIdLien());
                    $vLib = htmlspecialchars($v->getLibelle());
                    $vImg = $v->getImage();
                    $vLien = htmlspecialchars($v->getLienweb());

                    echo <<<EOF
                     
                     <a href="{$vLien}" class="img-thumbnailLiens" target="_blank">
                        <img src="./images/{$vImg}.jpg" alt="..." class="img-responsive ">
                      </a>
                        
                        
EOF;
                    if (isset($_SESSION['login']) && Session::is_admin()) {
                        echo <<<EOF
                     <br>
                        
                            
                            
        
                         <a href="index.php?action=deleteP&idLien={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                        
                        <form action = "index.php?action=updateP" method = "POST">
                            <input type="hidden" name="idLien" value=$vId />
                            <input type="hidden" name="libelle" value=$vLib />
                            <input type="hidden" name="image" value=$vImg />
                            <input type="hidden" name="lien" value=$vLien />
                            <br>
                             <button type="submit" class="btn btn-info">Modifier</button>
                         </form> <br>
                  <hr>
                     
EOF;
                    }
                }
                ?>

                <?php
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                     <br>
                

                <a href="index.php?action=createPartenaire"><button class="btn btn-primary">Ajouter un lien</button></a>
                 
                     
EOF;
                }
                ?>

            </div>


        </div>
    </div>
</div>