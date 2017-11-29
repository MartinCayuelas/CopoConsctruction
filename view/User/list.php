<?php

echo '<div class="container">';
echo '<div class="row">';

$cpt = 1;


foreach ($tab as $v) {
   
    $vLogin = htmlspecialchars($v->getLogin());

   




    echo <<< EOF

        
                           
            <div class="col-xs-4 col-lg-4">
                
                 <p>
                   {$cpt}. {$vLogin}
                 </p>
                       
                       
                       
EOF;
    if (isset($_SESSION['login']) && Session::is_admin()) {

        echo <<< EOF
                            
                             <a href="index.php?action=deleteUser&login={$vLogin}"><button class="btn btn-danger" type="button">Supprimer</button></a>
                             <form action="index.php?action=updateUser" method = "POST">
                                

                                <input type="hidden" name="login" value="{$vLogin}" />
                                <input type="hidden" name="cell" value="{$cell}" />


                                <br>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </form>
        
                       
                       
EOF;
    }
    echo <<< EOF

        
                  
                    
              </div>
                      
EOF;
    $cpt+= 1;
}

if (isset($_SESSION['login'])&& Session::is_admin()) {

    echo <<< EOF

        
                       
            <div class="box">
            <div class="text-center">
            <a href="index.php?action=createUser"><button class="btn btn-primary" type="button">Ajouter un Utilisateur</button></a>
                </div>
              </div>
EOF;
}

echo "</div>";
echo "</div>";
