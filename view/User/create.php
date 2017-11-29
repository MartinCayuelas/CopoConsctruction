<div class="container">
    <div class="row">
        <div class="box">

            <form method="post" action="index.php?action=<?php echo $action; ?>" >
                <fieldset class="text-center">
                    <legend><?php echo $titre; ?> User</legend>
                    <div class="col-lg-12">
                        <p>

                            <label for="login_id">Login</label><br>

                            <input type="text" value="<?php echo $vLogin ?>"placeholder="login" name="login" id="login_id"required/>
                           


                        </p>
                        <p>
                            <label for="pwd_id">Password</label><br>

                            <input type="password" placeholder="*****" name="password" id="pwd_id" required/>

                        </p>


                        <p>
                            <label for="admin_id">Admin?</label><br>
                            <input type="radio" name="admin" value="1" required/> Oui
                            <input type="radio" name="admin" value="0" required/> Non<br>
                        </p>

                        <p>
                            <label for="cell_id">Cell</label><br>

                            <input type="text" value="<?php echo $cell; ?> "placeholder="514-546-3332" name="cell" id=" cell_id" required/>

                        </p>


                    </div>


                    <div class="col-lg-12">
                        <p>
                            <input type="hidden" name="idUser" value="<?php echo $id; ?> " />
                            <input class="btn bg-primary" type="submit" value="Enregistrer" />
                        </p>
                    </div>
                </fieldset> 
            </form>
        </div>

    </div>
</div>





