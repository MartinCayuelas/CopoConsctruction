<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">

                <h3>
                    Contactez nous
                </h3>
                <hr>

            </div>
            <?php
            foreach ($tab as $v) {
                $image = $v->getImage();
                $imageC = $v->getImageC(); //image de contact
                $txt2 = $v->getDescription();
                $vId = htmlspecialchars($v->getIdPresentation());
                $txt = $v->getTexte();
                $txt3 = $v->getContact();

                echo <<<EOF

<div class="box">
    {$txt3}
 </div>
EOF;
            }

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
                            </form>
EOF;
            }
            
              echo <<<EOF
            
                <div class="col-lg-12 text-center">
                    <img src="./images/{$imageC}.jpg" alt="..." class="img-responsive">
                    <br>
                 </div>
             </div>
EOF;
            
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
                            </form>
EOF;
            }
            ?>

            <div class="col-lg-12 formu">
                <div class="text-center">
                    <h4>Coordonnées</h4>
                    <div>
                        <span class="contact2">cell: 514-915-2676</span>
                    </div>
                    <div>
                        <span class="contact2">email: m.dextradeur@copo-reno.com</span>
                    </div>
                </div>
                <br>
                <form method="post" action="index.php?action=sendEmail">
                    <div class="row">
                        <div class="box">
                            <br>
                            <div class="form-group col-md-6">
                                <label class="contact">Nom <span class="required">*</span></label>
                                <input type="text" name="name" class="form-control formu" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="contact">Prénom <span class="required">*</span></label>
                                <input type="text" name="prenom"  class="form-control formu" required/>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="contact">Adresse Email <span class="required">*</span></label>
                                <input type="email" name="mail" class="form-control formu" required/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="contact">N° de téléphone</label>
                                <input type="tel" name="phone"  class="form-control formu">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="contact">Sujet <span class="required">*</span></label>
                                <input type="text" name="subject" class="form-control formu"  required/>
                            </div>

                            <div class="form-group col-lg-12">
                                <label class="contact">Message <span class="required">*</span></label>
                                <textarea  name="message"  class="form-control formu" rows="6"  required/></textarea>
                            </div>
                            <div class="form-group col-lg-12">

                                <button  type="submit" class="btn btn-default">Envoyer</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
<br>
