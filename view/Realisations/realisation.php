<div class="container">
    <div class="row">




        <?php
        foreach ($tab_produit as $v) {
            $vId = htmlspecialchars($v->getIdRealisation());
            $vLib = htmlspecialchars($v->getLibelle());

            $image = $v->getImage1();
            $image2 = $v->getImage2();
            $image3 = $v->getImage3();
            $image4 = $v->getImage4();

            $vDes = $v->getDescription();

            if ($image4 != NULL) {
                echo <<< EOF
           
           <div class="box">  

            <div class="col-md-6 realisation">
                <br>
                <a href="./images/{$image}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image}.jpg" alt="..." >
                </a>
                <br>

                <br>
                <a href="./images/{$image2}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image2}.jpg" alt="...">
                </a>
                <br>
           </div>
            <div class=" col-md-6 realisation">
                <br>
                <a href="./images/{$image3}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image3}.jpg" alt="...">
                </a>
                <br>
            
                <br>
                <a href="./images/{$image4}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image4}.jpg" alt="...">
                </a>
                <br>
            </div>

            <div class="text-center realisation  col-lg-12">
                <br>
                <div class="caption">
                    <h3>{$vLib}</h3>
                    <p>
                        {$vDes} 
                    </p>

                </div>
                
                       
          
             
EOF;
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                        
                        <br>
                      
                       <form action = "index.php?action=update" method = "POST">
                            <input type="hidden" name="idRealisation" value=$vId />
                            <input type="hidden" name="libelle" value="$vLib" />
                            <input type="hidden" name="image" value="$image"/>
                            <input type="hidden" name="image2" value="$image2"/>
                            <input type="hidden" name="image3" value="$image3"/>
                            <input type="hidden" name="image4" value="$image4"/>
                            <input type="hidden" name="texte" value="$vDes" />
                             <button type="submit" class="btn btn-info">Modifier</button>
                             
                         </form><br>
                                  <a href="index.php?action=delete&idRealisation={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                               
EOF;
                }
                echo <<<EOF
                                  
            </div>           
        </div>
EOF;
            } else if ($image3 != NULL && $image4 == NULL) {
                 echo <<< EOF
           
           <div class="box">  

            <div class="col-xs-4 col-lg-4 realisation">
                <br>
                <a href="./images/{$image}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image}.jpg" alt="..." >
                </a>
                <br>


            </div>
            <div class="col-xs-4 col-lg-4 realisation">
                <br>
                <a href="./images/{$image2}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image2}.jpg" alt="...">
                </a>
                <br>
            </div>
             
            <div class="col-xs-4 col-lg-4 realisation">
                <br>
                <a href="./images/{$image3}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image3}.jpg" alt="...">
                </a>
                <br>
            </div>
            

            <div class="text-center realisation  col-lg-12">
                <br>
                <div class="caption">
                    <h3>{$vLib}</h3>
                    <p>
                        {$vDes} 
                    </p>

                </div>
                
                       
          
             
EOF;
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                        
                        <br>
                      
                       <form action = "index.php?action=update" method = "POST">
                            <input type="hidden" name="idRealisation" value=$vId />
                            <input type="hidden" name="libelle" value="$vLib" />
                            <input type="hidden" name="image" value="$image"/>
                            <input type="hidden" name="image2" value="$image2"/>
                            <input type="hidden" name="image3" value="$image3"/>
                            <input type="hidden" name="image4" value="$image4"/>
                            <input type="hidden" name="texte" value="$vDes" />
                             <button type="submit" class="btn btn-info">Modifier</button>
                             
                         </form><br>
                                  <a href="index.php?action=delete&idRealisation={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                               
EOF;
                }
                echo <<<EOF
                                  
            </div>           
        </div>
EOF;
                
            } else if ($image2 != NULL && $image3 == NULL && $image4 == NULL) {
                echo <<< EOF
           
           <div class="box">  

            <div class="col-md-8 realisation">
                <br>
                <a href="./images/{$image}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image}.jpg" alt="..." >
                </a>
                <br>


            </div>
            <div class=" col-md-4 realisation">
                <br>
                <a href="./images/{$image2}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image2}.jpg" alt="...">
                </a>
                <br>
            </div>
             
           

            <div class="text-center realisation  col-lg-12">
                <br>
                <div class="caption">
                    <h3>{$vLib}</h3>
                    <p>
                        {$vDes} 
                    </p>

                </div>
                
                       
          
             
EOF;
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                        
                        <br>
                      
                       <form action = "index.php?action=update" method = "POST">
                            <input type="hidden" name="idRealisation" value=$vId />
                            <input type="hidden" name="libelle" value="$vLib" />
                            <input type="hidden" name="image" value="$image"/>
                            <input type="hidden" name="image2" value="$image2"/>
                            <input type="hidden" name="image3" value="$image3"/>
                            <input type="hidden" name="image4" value="$image4"/>
                            <input type="hidden" name="texte" value="$vDes" />
                             <button type="submit" class="btn btn-info">Modifier</button>
                             
                         </form><br>
                                  <a href="index.php?action=delete&idRealisation={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                               
EOF;
                }
                echo <<<EOF
                                  
            </div>           
        </div>
EOF;
            } else {

                echo <<< EOF
            <div class="box realisation">  

            <div class="col-md-6">
                <br>

                <a href="./images/{$image}.jpg" target=_blank>
                    <img class="img-responsive img-rea" src="./images/{$image}.jpg" alt="..." >
                </a>
                <br>


            </div>
           

            <div class="text-center  col-md-6">
                <br>
                <div class="caption">
                    <h3>{$vLib}</h3>
                    <p>
                        {$vDes} 
                    </p>

                </div>
                <br>
                       
            </div>
                        
            
EOF;
                if (isset($_SESSION['login']) && Session::is_admin()) {
                    echo <<<EOF
                        
                        <br>
                      
                       <form action = "index.php?action=update" method = "POST">
                            <input type="hidden" name="idRealisation" value=$vId />
                            <input type="hidden" name="libelle" value="$vLib" />
                            <input type="hidden" name="image" value="$image"/>
                            <input type="hidden" name="image2" value="$image2"/>
                            <input type="hidden" name="image3" value="$image3"/>
                            <input type="hidden" name="image4" value="$image4"/>
                            <input type="hidden" name="texte" value="$vDes" />
                             <button type="submit" class="btn btn-info">Modifier</button>
                             
                         </form><br>
                                  <a href="index.php?action=delete&idRealisation={$vId}"><button class="btn btn-danger">Supprimer</button></a>
                               
EOF;
                }
                echo <<<EOF
                                  
            </div>           
        </div>
EOF;
            }
        }
        ?>

        <?php
        if (isset($_SESSION['login']) && Session::is_admin()) {
            echo <<<EOF
             <div class="box text-center">
            <a href="index.php?action=create"><button class="btn btn-primary">Ajouter une réalisation</button></a>
        </div>
EOF;
        }
        ?>

    </div>
</div>

