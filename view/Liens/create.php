<div class="container">
    <div class="row">
        <div class="box">

            <form method="post" action="index.php?action=<?php echo $action; ?>" enctype="multipart/form-data" >
                <fieldset class="text-center">
                    <legend><?php echo $titre; ?> d'un partenaire</legend>
                    <div class="col-lg-6">
                        <p>
                            <label for="lib_id">Libelle</label><br>
                            <select name="libelle" id="mod_id" required="">

                                <option value="partenaire">partenaire</option>
                                <option value="certificat">certificat</option>

                            </select>
                        </p>

                        <p>
                            <label for="descrip_id">lien Web</label><br> 
                            <textarea type="text" name="lien" id="descrip_id"  rows="3" cols="25" required>
                            <?php echo $lien; ?>
                            </textarea>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p>
                            <label for="img_id">Image</label><br> 
                            <input type="text" value="<?php echo $image; ?>" placeholder="Ex: partenaire" name="image" id="img_id" required/>
                            <input type="file" name="fileToUpload" id="img_id" required/>
                             <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>


                        </p>


                    </div>

                    <div class="col-lg-12">
                        <p>
                            <input type="hidden" name="idLien" value=<?php echo $id ?> />
                            <input class="btn bg-primary" type="submit" value="<?php echo $titre; ?>" />
                        </p>
                    </div>
                </fieldset> 
            </form>
        </div>

    </div>
</div>





