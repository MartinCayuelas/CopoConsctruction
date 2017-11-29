<div class="container">
    <div class="row">
        <div class="box">
            <form action="index.php?action=updatedCopo" method="POST" enctype="multipart/form-data">
                <fieldset class="text-center">
                    <legend>Modification de la présentation</legend>
                    <div class="col-md-6 ">
                        <label for="image_id">Image </label><br> 
                        <input type="text" name="image" value=<?php echo $image; ?> /> 

                        <br>

                        <input type="file" name="fileToUpload" id="fileToUpload" onchange="PreviewImage();">
                        <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                        <br>

                        <br>
                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="imageContact">
                        </fieldset>

                        <script type="text/javascript">

                            function PreviewImage() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("imageContact").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>
                        <br>
                        <h5>Texte Page Acceuil</h5>
                        <textarea type="text" name="texte2" id="texte_id2"  rows="5" cols="35" required>
                            <?php echo $txt2; ?>
                        </textarea>
                        <br>
                        <h5>Texte Page Contact</h5>
                        <textarea type="text" name="texte3" id="texte_id3"  rows="5" cols="35" required>
                            <?php echo $txt3; ?>
                        </textarea>
                        <br>
                        <label for="image_id2">Image Page Contact </label><br> 
                        <input type="text" name="image2" value=<?php echo $imageC; ?> /> 
                        <br>

                        <input type="file" name="fileToUpload2" id="fileToUpload2" onchange="PreviewImage2();">
                        <button type="reset" class="btn-xs btn-warning" id="deletePres">Effacer</button>
                        <br>
                        <fieldset class="visualisation">
                            <img alt="Visualisation" class="img-responsive" id="imageCopo">
                        </fieldset>

                        <script type="text/javascript">

                            function PreviewImage2() {
                                var oFReader = new FileReader();
                                oFReader.readAsDataURL(document.getElementById("fileToUpload2").files[0]);

                                oFReader.onload = function (oFREvent) {
                                    document.getElementById("imageCopo").src = oFREvent.target.result;
                                };
                            }
                            ;

                        </script>

                    </div>

                    <textarea type="text" name="texte" id="texte_id"  rows="20" cols="65" required>
                        <?php echo $txt; ?>
                    </textarea>

                    <br>



                    <div class="col-lg-12">
                        <p>
                            <br>
                            <input type="hidden" name="idPresentation" value=<?php echo $id; ?> />
                            <input class="btn bg-primary" type="submit" value="Enregistrer" />
                        </p>
                    </div>

                </fieldset> 
            </form>







        </div>
    </div>
</div>


