<?php

echo '<div class="container">';
echo '<div class="row">';

echo <<<EOF

 <div class="text-center col-lg-12">
            <h3>
EOF;
              
                echo $titreR;
    echo <<<EOF

            </h3>
            <hr>
        </div>
EOF;



foreach ($tab_produit as $v) {
    $vLib = htmlspecialchars($v->getLibelle());

    $image = $v->getImage1();
    $id = htmlspecialchars($v->getIdRealisation());




    echo <<< EOF

        
                           
            <div class="col-xs-4 col-lg-4">
                <a href="index.php?action=DetailRealisation&id={$id}" class="thumbnailAcc">
                  <img src="./images/{$image}.jpg" alt="..." class="img-responsive imgPrincipale">
                   
                      
                       
                       
                       
EOF;
    if (isset($_SESSION['login']) && Session::is_admin()) {

        echo <<< EOF
                            
                             <a href="index.php?action=delete&idRealisation={$id}"><button class="btn btn-danger" type="button">Supprimer</button></a>

        
                       
                       
EOF;
    }
    echo <<< EOF

        
                   
                </a>       
              </div>
                      
EOF;
}

if (isset($_SESSION['login']) && Session::is_admin()) {

    echo <<< EOF

        
                       
            <div class="box">
            <div class="text-center">
            <a href="index.php?action=create"><button class="btn btn-primary" type="button">Ajouter une nouvelle réalisation</button></a>
                </div>
              </div>
EOF;
}

echo "</div>";
echo "</div>";

