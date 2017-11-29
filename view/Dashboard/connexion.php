<div class="container">
    <div class="row">
        <div class="box "> 

            <div class="col-lg-12 text-center realisation">
                <br>
                <h4>
                    Connexion
                </h4>
                <hr>

            </div>


            <div class="col-md-12 realisation">
                <form method="post" action="index.php?action=connectedCopo" enctype="multipart/form-data">
                    <div class="row">
                        <br>
                        <div class="form-group col-md-12 text-center">
                            <label>Login</label>
                            <br>
                            <input type="text" name="login" placeholder="login" id="login_id"  required/>
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <label>Password</label>
                            <br>
                            <input type="password" name="password" placeholder="******" id="password_id" required/>
                        </div>



                        <div class="form-group col-lg-12 text-center">
                            <input type="hidden" name="connect">
                            <button  type="submit" class="btn btn-success">Connexion</button>
                        </div>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>