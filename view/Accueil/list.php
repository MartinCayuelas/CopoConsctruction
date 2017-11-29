<?php

echo '<div class="container">';
echo '<div class="row">';



foreach ($tab as $v) {
    $image = $v->getImage();
    $txt2 = $v->getDescription();
    $vId = htmlspecialchars($v->getIdPresentation());
    $txt = $v->getTexte();
    $txt3 = $v->getContact();
    $imageC = $v->getImageC(); //image de contact

    echo <<<EOF

<div class="box">
    {$txt2}
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
EOF;
}






foreach ($tab_produit as $v) {
    $vLib = htmlspecialchars($v->getLibelle());

    $image = $v->getImage1();
    $id = htmlspecialchars($v->getIdRealisation());




    echo <<< EOF

        
                           
            <div class="col-xs-4 col-lg-4">
                <a href="index.php?action=Realisation&p={$vLib}" class="thumbnailAcc">
                  <img src="./images/{$image}.jpg" alt="..." class="img-responsive imgPrincipale">
                    <div class="carousel-captionAcc">
                       <h4>{$vLib}</h4> 
                       
                       
                       
EOF;

    if (isset($_SESSION['login']) && Session::is_admin()) {

        echo <<< EOF
                            
                             <a href="index.php?action=delete&idRealisation={$id}"><button class="btn btn-danger" type="button">Supprimer</button></a>

        
                       
                       
EOF;
    }
    echo <<< EOF

        
                   </div>
                </a>       
              </div>
                      
EOF;
}

if (isset($_SESSION['login']) && Session::is_admin()) {

    echo <<< EOF

        
                       
            <div class="box">
            <div class="text-center">
            <a href="index.php?action=create"><button class="btn btn-primary" type="button">Ajouter une nouvelle section</button></a>
                </div>
              </div>
EOF;
}

echo "</div>";
echo "</div>";
