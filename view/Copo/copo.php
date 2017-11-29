<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-md-6">


                <?php
                foreach ($tab as $v) {

                    $image = $v->getImage();

                    echo <<<EOF
                    <img src="./images/{$image}.jpg" alt="..." class="img-responsive">
                    
EOF;
                }
                ?>



            </div>

            <div class="col-md-6">
                <?php
                foreach ($tab as $v) {
                    $vId = htmlspecialchars($v->getIdPresentation());
                    $txt = $v->getTexte();
                    $txt2 = $v->getDescription();
                    $txt3 = $v->getContact();
                    $imageC = $v->getImageC(); //image de contact
                    echo $txt;
                }
                ?>
                <?php
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                    
                   
                    <form action = "index.php?action=updateCopo" method = "POST">
                            <input type="hidden" name="idPresentation" value={$vId} />
                            
                            <input type="hidden" name="image" value={$image} />
                            <input type="hidden" name="texte" value="{$txt}" />
                            <input type="hidden" name="texte2" value="{$txt2}" />
                            <input type="hidden" name="texte3" value="{$txt3}" />
                             <input type="hidden" name="image2" value={$imageC} />
                    
                        <div class="form-group col-lg-12 text-center">
                             <br>
                            <a href="index.php?action=updateCopo&idPresentation={$vId}"><button type="submit" class="btn btn-info">Modifier</button></a>
                        </div>
EOF;
                }
                ?>
            </div>




        </div>
    </div>
</div>
