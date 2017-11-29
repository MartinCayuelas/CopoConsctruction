<div class="container">
    <div class="row">
        <div class="box">

            <form method="post" action="index.php?action=<?php echo $action; ?>" enctype="multipart/form-data" >
                <fieldset class="text-center">
                    <legend><?php echo $titre; ?> d'une réalisation <?php echo $princi; ?></legend>
                    <div class="col-lg-6">
                        <p>
                            <label for="lib_id">Libelle</label><br>

                            <input type="text" placeholder="Ex : Solarium" value="<?php echo $lib ?>" name="libelle" id="lib_id" required/>

                        </p>
                        <p>
                            <label for="princi_id">Principale?</label>
                            <br>
                            <input type="radio" name="principale" value="1" required/> Oui
                            <input type="radio" name="principale" value="0" required/> Non
                            <br>
                        </p>
                        <p>
                            <label for="descrip_id">Description</label><br> 
                            <textarea type="text" name="description" id="descrip_id"  rows="4" cols="45" required>
                                <?php echo $txt; ?>
                            </textarea>
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <p>
                            <label for="image_id">Image n°1</label><br> 
                            <input type="text" value="<?php echo $image; ?>" placeholder="Ex: Agrandissement" name="image1" id="image_id" required/>
                            <input type="file" name="fileToUpload" id="fileToUpload" onchange="PreviewImage();"/>
                             <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                             <br>

                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="image">
                        </fieldset>
                        <script type="text/javascript">

                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("image").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>


                        </p>
                        <p>
                            <label for="img2_id">Image n°2</label><br> 
                            <input type="text" value="<?php echo $image2; ?>" placeholder="Ex: Agrandissement2" name="image2" id="img2_id" />
                            <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="PreviewImage2();"/>
                            <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                             <br>

                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="image2">
                        </fieldset>
                        <script type="text/javascript">

                            function PreviewImage2() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload2").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("image2").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>

                        </p>
                        <p>
                            <label for="img3_id">Image n°3</label><br> 
                            <input type="text" value="<?php echo $image3; ?>" placeholder="Ex: Agrandissement3" name="image3" id="img3_id" />
                            <input type="file" name="fileToUpload3" id="fileToUpload3" onchange="PreviewImage3();" />
                            <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                             <br>

                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="image3">
                        </fieldset>
                        <script type="text/javascript">

                            function PreviewImage3() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload3").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("image3").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>

                        </p>
                        <p>
                            <label for="img4_id">Image n°4</label><br> 
                            <input type="text" value="<?php echo $image4; ?>" placeholder="Ex: Agrandissement4" name="image4" id="img4_id" />
                            <input type="file" name="fileToUpload4" id="fileToUpload4" onchange="PreviewImage4();"/>
                            <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                             <br>

                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="image4">
                        </fieldset>
                        <script type="text/javascript">

                            function PreviewImage4() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload4").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("image4").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>

                        </p>

                    </div>

                    <div class="col-lg-12">
                        <p>
                            <input type="hidden" name="idRealisation" value=<?php echo $id ?> />
                            <input class="btn bg-primary" type="submit" value="Enregistrer" />
                        </p>
                    </div>
                </fieldset> 
            </form>
        </div>

    </div>
</div>





