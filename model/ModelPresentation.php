<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelPresentation {

    private $idPresentation;
    private $image;
    private $texte;
    private $description;
    private $contact;
    private $imageC;

    public function __construct($id = NULL, $img = NULL, $txt = NULL, $desc = NULL, $contact = NULL, $img2 = NULL) {
        if (!is_null($id) && !is_null($img) && !is_null($txt) && !is_null($desc) && !is_null($contact) && !is_null($img2)) {
            $this->idPresentation = $id;
            $this->image = $img;
            $this->texte = $txt;
            $this->description = $desc;
            $this->contact = $contact;
            $this->imageC = $img2;
        }
    }

    function getIdPresentation() {
        return $this->idPresentation;
    }

    function getImageC() {
        return $this->imageC;
    }

    function getImage() {
        return $this->image;
    }

    function getTexte() {
        return $this->texte;
    }

    function getDescription() {
        return $this->description;
    }

    function getContact() {
        return $this->contact;
    }

    public function getPresentation() {
        $sql = "SELECT * FROM Presentation";
        $req = Model::$pdo->query($sql);
        $tab = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelPresentation');


        if (empty($tab)) {
            return false;
        }
        return $tab;
    }

    public function updated($id) {
        $sql = "UPDATE Presentation SET image =:read3, texte =:read, description =:read4, contact =:read5, imageC =:read6 WHERE idPresentation=:read2";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "read" => $this->texte,
            "read2" => $id,
            "read3" => $this->image,
            "read4" => $this->description,
            "read5" => $this->contact,
            "read6" => $this->imageC,
        );
        return $req->execute($values);
    }

}
