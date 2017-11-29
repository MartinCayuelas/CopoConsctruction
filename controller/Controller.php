<?php

/* Model */
require_once File::build_path(array("model", "Model.php"));
require_once File::build_path(array("model", "ModelRealisation.php"));
require_once File::build_path(array("model", "ModelPresentation.php"));
require_once File::build_path(array("model", "ModelLien.php"));
require_once File::build_path(array("model", "ModelUtilisateur.php"));

/* Lib */

require_once File::build_path(array("lib", "Security.php"));
require_once File::build_path(array("lib", "Session.php"));

class Controller {

// Fonctions pour afficher les différentes pages du site
    public function accueil() {
        /*
         * Affiche la page d'Accueil
         */
        $tab_produit = ModelRealisation::getAllPrincipales(); //On récupère les images principales
        $tab = ModelPresentation::getPresentation(); // On recupère la présentation pour le petite description
        $controller = 'Accueil';
        $view = 'list';
        $pagetitle = 'COPO Construction inc.';
        require File::build_path(array("view", "view.php"));
    }

    public function copo() {
        /*
         * Affiche la page de COPOConstruction
         */
        $tab = ModelPresentation::getPresentation(); // On recupère la présentation

        $controller = 'Copo';
        $view = 'copo';
        $pagetitle = 'COPO Construction inc.';
        require File::build_path(array("view", "view.php"));
    }

    public function copoModif() {
        //Affiche la page pour modifier la présentation

        $controller = 'Copo';
        $view = 'copoModif';
        $pagetitle = 'COPO Construction inc.';
        require File::build_path(array("view", "view.php"));
    }

    public function Realisation() {

        /*
         * Fonction pour afficher la mosaique de réalisations
         */

        /* On recupère le nom de la page pour en faire un titre */

        $titreR = $_GET['p'];



        /* Appel fonction dans le Model */

        $tab_produit = ModelRealisation::getAllByLibelle($titreR);

        /* Données pour appeler la vue correspondante */
        $controller = 'Realisations';
        $view = 'mosaique';
        $pagetitle = $titreR . ' - COPO Construction';
        require File::build_path(array("view", "view.php"));
    }

    public function DetailRealisation() {
        /*
         * Affiche un projet en particulier avec un texte explicatif et des images
         */

        /* On recupère le nom de la page pour en faire un titre */


        $id = $_GET['id'];

        /* Appel fonction dans le Model */

        $tab_produit = ModelRealisation::getRealisationById($id);

        /* Données pour appeler la vue correspondante */
        $controller = 'Realisations';
        $view = 'realisation';
        $pagetitle = 'Détails - COPO Construction';
        require File::build_path(array("view", "view.php"));
    }

    public function liens() {
        /*
         * Affiche la page des Liens Utiles
         */
        $tab = ModelLien::getLiensUtiles(); //Certificats
        $tab_produit = ModelLien::getAllPartenaires(); //Partenaires
        $controller = 'Liens';
        $view = 'liens';
        $pagetitle = 'Liens Utiles - COPO Construction';
        require File::build_path(array("view", "view.php"));
    }

    public function contact() {
        /*
         * Affiche la page de contact
         */
        $tab = ModelPresentation::getPresentation(); // On recupère la présentation
        $controller = 'Contact';
        $view = 'contact';
        $pagetitle = 'Contact - COPO Construction';
        require File::build_path(array("view", "view.php"));
    }

    /* Fonctions Par page */

    /* Accueil + Realisations */

    public static function create() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $action = 'created';

            $titre = 'Ajout';

            $controller = 'Accueil';
            $view = 'create';
            $pagetitle = 'Formulaire d\'ajout - COPO-Dashboard';

            require File::build_path(array("view", "view.php"));
        }
    }

    public static function created() {

        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            /*
             * Pour chaque image, on regarde si le nom est vide ou pas
             * 
             * S'il n'est pas vide, on regarde si il y a un fichier qui a été envoyé
             * 
             * On effectue des contrôles sur l'image
             * 
             * Si il n'y a pas d'erreur l'image est ajoutée au dossier "images"
             * 
             * On effectue cela pour les 4 images
             */



            if (empty($_POST['image2'])) {
                $image2 = NULL;
            } else {
                $image2 = $_POST['image2'];


                if (isset($_FILES['fileToUpload2'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload2']['name'];
                    $file_size = $_FILES['fileToUpload2']['size'];
                    $file_tmp = $_FILES['fileToUpload2']['tmp_name'];
                    $file_type = $_FILES['fileToUpload2']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload2']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }



                    if (empty($errors) == true) {

                        /*
                         * Le nom de l'image sera celui que l'on aura remplit dans le formulaire
                         */

                        $name = $image2 . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }

            if (empty($_POST['image3'])) {
                $image3 = NULL;
            } else {
                $image3 = $_POST['image3'];


                if (isset($_FILES['fileToUpload3'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload3']['name'];
                    $file_size = $_FILES['fileToUpload3']['size'];
                    $file_tmp = $_FILES['fileToUpload3']['tmp_name'];
                    $file_type = $_FILES['fileToUpload3']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload3']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }



                    if (empty($errors) == true) {
                        $name = $image3 . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }

            if (empty($_POST['image4'])) {
                $image4 = NULL;
            } else {
                $image4 = $_POST['image4'];


                if (isset($_FILES['fileToUpload4'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload4']['name'];
                    $file_size = $_FILES['fileToUpload4']['size'];
                    $file_tmp = $_FILES['fileToUpload4']['tmp_name'];
                    $file_type = $_FILES['fileToUpload4']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload4']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }



                    if (empty($errors) == true) {
                        $name = $image4 . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }



            if (isset($_FILES['fileToUpload'])) {
                $errors = array();


                $name = $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }



                if (empty($errors) == true) {
                    $name = $_POST['image1'] . "." . $file_ext;
                    
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }


            $r = new ModelRealisation(0, $_POST['libelle'], $_POST['principale'], $_POST['image1'], $_POST['image2'], $_POST['image3'], $_POST['image4'], $_POST['description']);


            if ($r->save() == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la creation';
                require FILE::build_path(array("view", "view.php"));
            } else {
                $tab_produit = ModelRealisation::getAllPrincipales();
                $controller = 'Accueil';
                $view = 'list';
                $pagetitle = 'Ajout réussi';
                require FILE::build_path(array("view", "view.php"));
            }
        }
    }

    public static function delete() {
        
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {
            
            $id = $_GET['idRealisation'];



            $d = ModelRealisation::deleteById($id);


            if ($d == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Impossible à supprimer';
                require File::build_path(array("view", "view.php"));
            } else {



                Controller::accueil();
            }
        }
    }

    public static function update() {


        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {
            
            /*
             * Varibales récupérées pour les transmettre à la vue que l'on va appeler
             * On peut ainsi avoir une vue "générique"
             */
            $action = 'updated';

            $id = $_POST['idRealisation'];

            $lib = $_POST['libelle'];
            $image = $_POST['image'];
            $image2 = $_POST['image2'];
            $image3 = $_POST['image3'];
            $image4 = $_POST['image4'];
            $txt = $_POST['texte'];

            $titre = 'Modification';

            if ($_POST['principale'] == '1') {
                $princi = 'principale';
            } else {
                $princi = '';
            }


            $controller = 'Accueil';
            $view = 'create';
            $pagetitle = 'Mise à jour Réalisation';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    public static function updated() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            /*
             * Pour chaque image, on regarde si le nom est vide ou pas
             * 
             * S'il n'est pas vide, on regarde si il y a un fichier qui a été envoyé
             * 
             * On effectue des contrôles sur l'image
             * 
             * Si il n'y a pas d'erreur l'image est ajoutée au dossier "images"
             * 
             * On effectue cela pour les 4 images
             */


            if (empty($_POST['image2'])) {
                $image2 = NULL;
            } else {
                $image2 = $_POST['image2'];


                if (isset($_FILES['fileToUpload2'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload2']['name'];
                    $file_size = $_FILES['fileToUpload2']['size'];
                    $file_tmp = $_FILES['fileToUpload2']['tmp_name'];
                    $file_type = $_FILES['fileToUpload2']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload2']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = 'File size must be excately 2 MB';
                    }

                    if (empty($errors) == true) {
                        $name = $_POST['image2'] . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }
            if (empty($_POST['image3'])) {
                $image3 = NULL;
            } else {
                $image3 = $_POST['image3'];


                if (isset($_FILES['fileToUpload3'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload3']['name'];
                    $file_size = $_FILES['fileToUpload3']['size'];
                    $file_tmp = $_FILES['fileToUpload3']['tmp_name'];
                    $file_type = $_FILES['fileToUpload3']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload3']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = 'File size must be excately 2 MB';
                    }

                    if (empty($errors) == true) {
                        $name = $_POST['image3'] . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }
            if (empty($_POST['image4'])) {
                $image4 = NULL;
            } else {
                $image4 = $_POST['image4'];


                if (isset($_FILES['fileToUpload4'])) {
                    $errors = array();

                    $libelle = $_POST['libelle'];


                    $file_name = $_FILES['fileToUpload4']['name'];
                    $file_size = $_FILES['fileToUpload4']['size'];
                    $file_tmp = $_FILES['fileToUpload4']['tmp_name'];
                    $file_type = $_FILES['fileToUpload4']['type'];
                    $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload4']['name'])));

                    $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                    if (in_array($file_ext, $expensions) === false) {
                        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                    }

                    if ($file_size > 2097152) {
                        $errors[] = 'File size must be excately 2 MB';
                    }

                    if (empty($errors) == true) {
                        $name = $_POST['image4'] . "." . $file_ext;
                        if (move_uploaded_file($file_tmp, "images/" . $name)) {
                            echo "Success";
                        } else {
                            echo 'No Success';
                        }
                    } else {
                        print_r($errors);
                    }
                }
            }

            if (isset($_FILES['fileToUpload'])) {
                $errors = array();

                $libelle = $_POST['libelle'];


                $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

                $name = $_POST['image1'] . "." . $file_ext;

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }



                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $name = $_POST['image1'] . "." . $file_ext;
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }



            $r = new ModelRealisation(0, $_POST['libelle'], $_POST['principale'], $_POST['image1'], $_POST['image2'], $_POST['image3'], $_POST['image4'], $_POST['description']);


            if ($r->updated($_POST['idRealisation']) == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la modification';
                require File::build_path(array("view", "view.php"));
            } else {

                Controller::accueil();
            }
        }
    }

    /* COPO */

    public static function updateCopo() {

        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $id = $_POST['idPresentation'];


               
            $txt = $_POST['texte'];
            $image = $_POST['image'];
            $txt2 = $_POST['texte2'];
            $txt3 = $_POST['texte3'];
            $imageC = $_POST['image2'];


            $controller = 'Copo';
            $view = 'copoModif';
            $pagetitle = 'Mise à jour Présentation';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    public static function updatedCopo() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            /*
             * Pour chaque image, on regarde si le nom est vide ou pas
             * 
             * S'il n'est pas vide, on regarde si il y a un fichier qui a été envoyé
             * 
             * On effectue des contrôles sur l'image
             * 
             * Si il n'y a pas d'erreur l'image est ajoutée au dossier "images"
             * 
             * 
             */


            if (isset($_FILES['fileToUpload'])) {
                $errors = array();

                $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $name = $_POST['image'] . "." . $file_ext;
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }
            
              if (isset($_FILES['fileToUpload2'])) {
                $errors = array();

                $file_name = $_FILES['fileToUpload2']['name'];
                $file_size = $_FILES['fileToUpload2']['size'];
                $file_tmp = $_FILES['fileToUpload2']['tmp_name'];
                $file_type = $_FILES['fileToUpload2']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload2']['name'])));

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $name = $_POST['image2'] . "." . $file_ext;
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }
            
            /*
             * On crée un objet pour pouvoir l'envoyer dans la base de données
             */

            $v = new ModelPresentation(0, $_POST['image'], $_POST['texte'], $_POST['texte2'], $_POST['texte3'],$_POST['image2']);


            if ($v->updated($_POST['idPresentation']) == false) {
                /*
                 * Si ça n'a pas fonctionné, on renvoi un page d'erreur
                 */
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la modification';
                require File::build_path(array("view", "view.php"));
            } else {

                Controller::Copo();
            }
        }
    }

    /* Contact */

    public static function sendEmail() {
        //Mail de reception
        $myemail = "m.dextradeur@copo-reno.com";
        
        /*
         * Options:
         * - Headers (ce que l'on verra écrit dans l'en-tête du mail
         * - Le corps du mail avec nom, prenom, mail, n°tel, et le sujet
         */

        $header = $_POST['mail'];
        $name = $_POST['name'];
        $prenom = $_POST['prenom'];
        $email = $_POST['mail'];

        $phone = $_POST['phone'];


        $subject = $_POST['subject'];

        $message = $_POST['message'];

        

        $headers = 'From: copo-reno.com' . "\r\n" .
                'Reply-To:' . $header . "\r\n" .
                'X-Mailer: PHP/' . phpversion();


// set up email
        $msg = "Nom: " . $name . "\nPrénom: " . $prenom . "\nTel: " . $phone . "\nEmail: " . $email . "\nSujet: " . $subject . "\nMessage: \n" . $message;
        $msg = wordwrap($msg, 70);
        $envoi = mail($myemail, "Nouveau message du Site Copo", $msg, $headers);

        if ($envoi) {
            /*
             * Si le mail a bien été envoyé, retour sur la page d'accueil
             */
            Controller::accueil();
        } else {
            /*
             * Sinon page d'erreur
             */
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Erreur mail';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    /* Liens */

    public static function createPartenaire() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {


            $action = "createdP";
            $titre = "Ajout";
            $lien = '';
            $image = '';
            $id = '';

            $controller = 'Liens';
            $view = 'create';
            $pagetitle = 'Formulaire d\'ajout - COPO-Dashboard';

            require File::build_path(array("view", "view.php"));
        }
    }

    public static function createdP() {

        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            /*
             * on regarde si il y a un fichier qui a été envoyé
             * 
             * On effectue des contrôles sur l'image
             * 
             * Si il n'y a pas d'erreur l'image est ajoutée au dossier "images"
             * 
             * 
             */


            if (isset($_FILES['fileToUpload'])) {
                $errors = array();


                $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $name = $_POST['image'] . "." . $file_ext;
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $name = $_POST['image'] . "." . $file_ext;
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }

            $l = new ModelLien(0, $_POST['libelle'], $_POST['image'], $_POST['lien']);

            /* A refaire */

            if ($l->save() == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la creation';
                require FILE::build_path(array("view", "view.php"));
            } else {
                Controller::Liens();
            }
        }
    }

    public static function deleteP() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {
            $id = $_GET['idLien'];

            $d = ModelLien::deleteById($id);
            if ($d == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Impossible à supprimer';
                require File::build_path(array("view", "view.php"));
            } else {
                Controller::Liens();
            }
        }
    }

    public static function updateP() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $action = "updatedP";
            $titre = "Modification";
            $lien = $_POST['lien'];
            $image = $_POST['image'];
            $id = $_POST['idLien'];

            $controller = 'Liens';
            $view = 'create';
            $pagetitle = 'Mise à jour Partenaire';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    public static function updatedP() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            /*
             *  on regarde si il y a un fichier qui a été envoyé
             * 
             * On effectue des contrôles sur l'image
             * 
             * Si il n'y a pas d'erreur l'image est ajoutée au dossier "images"
             * 
             * On effectue cela pour les 4 images
             */


            if (isset($_FILES['fileToUpload'])) {
                $errors = array();


                $file_name = $_FILES['fileToUpload']['name'];
                $file_size = $_FILES['fileToUpload']['size'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];
                $file_type = $_FILES['fileToUpload']['type'];
                $file_ext = strtolower(end(explode('.', $_FILES['fileToUpload']['name'])));

                $expensions = array("jpeg", "jpg", "JPEG", "JPG", "PNG", "png");

                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
                }

                if ($file_size > 2097152) {
                    $errors[] = 'File size must be excately 2 MB';
                }

                if (empty($errors) == true) {
                    $name = $_POST['image'] . "." . $file_ext;
                    if (move_uploaded_file($file_tmp, "images/" . $name)) {
                        echo "Success";
                    } else {
                        echo 'No Success';
                    }
                } else {
                    print_r($errors);
                }
            }

            $v = new ModelLien(0, $_POST['libelle'], $_POST['image'], $_POST['lien']);


            if ($v->updated($_POST['idLien']) == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la modification';
                require File::build_path(array("view", "view.php"));
            } else {

                Controller::Liens();
            }
        }
    }

    /* Connexion */

    public function copoConnect() {
        $controller = 'Dashboard';
        $view = 'connexion';
        $pagetitle = 'Dashboard - COPO Construction';
        require File::build_path(array("view", "view.php"));
    }

    public static function connectedCopo() {
        $crypt = Security::chiffrer($_POST['password']);

        $login = $_POST['login'];

        $v = ModelUtilisateur::checkPassword($login, $crypt);



        if ($v != false) {


            $_SESSION['admin'] = $v->getAdmin($login);


            $_SESSION['login'] = $login;

            Controller::dashboard();
        } else {

            self::copoConnect();
        }
    }

    public static function deconnect(){
        
        /*
         * On "libere" la session
         */

        unset($_SESSION['login']);
        unset($_SESSION['admin']);


        Controller::accueil();
    }

    public static function createUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {
            $action = 'createdUser';

            $id = $_POST['idUser'];

            $controller = 'User';
            $view = 'create';
            $pagetitle = 'Ajouter User';
            require File::build_path(array("view", "view.php"));
        }
    }

    public static function createdUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $crypt = Security::chiffrer($_POST['password']);

            $user = new ModelUtilisateur($_POST['login'], $crypt, $_POST['admin'], $_POST['cell']);


            if ($user->save() == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la creation';
                require FILE::build_path(array("view", "view.php"));
            } else {
                Controller::listUser();
            }
        }
    }

    /* ADministration */

    public function dashboard() {

        if (!Session::is_connected()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $login = $_SESSION['login'];
            $tab = ModelUtilisateur::getUserByLogin($login);

            $nbPartenaires = ModelLien::getNbPartenaires();
            $nbRealisations = ModelRealisation::getNbRealisations();
            $nbUsers = ModelUtilisateur::getNbUsers();

            $controller = 'Dashboard';
            $view = 'dashboard';
            $pagetitle = 'Panneau de Contrôle';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    public function listUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $tab = ModelUtilisateur::getAllUsers();
            $controller = 'User';
            $view = 'list';
            $pagetitle = 'Liste Users';
            require File::build_path(array("view", "view.php"));
        }
    }

    public function updateUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $action = 'updatedUser';

            $id = $_POST['idUser'];


            $titre = 'Modification';
            $vLogin = $_POST['login'];
            $cell = $_POST['cell'];


            $controller = 'User';
            $view = 'create';
            $pagetitle = 'Mise à jour User';
            require FILE::build_path(array("view", "view.php"));
        }
    }

    public function updatedUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {

            $crypt = Security::chiffrer($_POST['password']);

            $user = new ModelUtilisateur($_POST['login'], $crypt, $_POST['admin'], $_POST['cell']);


            if ($user->updated($_POST['login']) == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Erreur lors de la creation';
                require FILE::build_path(array("view", "view.php"));
            } else {
                Controller::dashboard();
            }
        }
    }

    public function deleteUser() {
        if (!Session::is_admin()) {
            $controller = 'Accueil';
            $view = 'listVide';
            $pagetitle = 'Error Accès';
            require File::build_path(array("view", "view.php"));
        } else {
            $login = $_GET['login'];

            $d = ModelUtilisateur::deleteByLogin($login);
            if ($d == false) {
                $controller = 'Accueil';
                $view = 'listVide';
                $pagetitle = 'Impossible à supprimer';
                require File::build_path(array("view", "view.php"));
            } else {
                Controller::dashboard();
            }
        }
    }

}
