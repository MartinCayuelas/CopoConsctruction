<div class="text-center col-lg-12">
    <h4>
        Dashboard

    </h4>
    <hr>
</div>

<?php
echo '<br>';

if (isset($_SESSION['login']) && Session::is_admin()) {
    
    
   
    
    echo <<<EOF
    
    
    
    
    <div class="box text-center">
    
    <h6> Administration des Utilisateurs </h6>
    
    <a href="index.php?action=createUser"><button class="btn btn-success">Ajouter un Utilisateur</button></a>
  
    <a href="index.php?action=listUser"><button class="btn btn-primary">Liste des Utilisateurs</button></a>
    
    <br>
    <h6> Informations du site </h6>
    <p>
    Nombre de réalisations : {$nbRealisations['total']}
    </p>
    <p>
    Nombre de partenaires : {$nbPartenaires['total']}
    </p>
    <p>
    Nombre d'utilisateurs : {$nbUsers['total']}
    </p>
    </div>
EOF;
}



foreach ($tab as $v) {
    
    $vLogin = htmlspecialchars($v->getLogin());
    $cell = $v->getCell();




    echo <<<EOF
<div class="text-center">
  <h4> 
     Informations Personnelles               
   </h4> 
   <hr>


<form action="index.php?action=updateUser" method = "POST">
    

    <input type="hidden" name="login" value="{$vLogin}" />
    <input type="hidden" name="cell" value="{$cell}" />


    <br>
    <button type="submit" class="btn btn-warning">Modifier mes données personnelles</button>
</form>
<br>
<br>
</div>
EOF;
}