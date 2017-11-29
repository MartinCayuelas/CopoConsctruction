<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelLien {

    private $idLien;
    private $libelle;
    private $image;
    private $lienweb;

    function getIdLien() {
        return $this->idLien;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getImage() {
        return $this->image;
    }

    function getLienweb() {
        return $this->lienweb;
    }

    public function __construct($id = NULL, $lib = NULL, $img = NULL, $lien = NULL) {
        if (!is_null($id) && !is_null($lib) && !is_null($img) && !is_null($lien)) {
            $this->idLien = $id;
            $this->libelle = $lib;
            $this->image = $img;
            $this->lienweb = $lien;
        }
    }

    public function getAllPartenaires() {

        $sql = "SELECT * FROM Liens WHERE libelle = 'partenaire'";
        $req = Model::$pdo->query($sql);
        $tab_prod = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelLien');


        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }

    public function getLiensUtiles() {
        $sql = "SELECT * FROM Liens WHERE libelle != 'partenaire'";
        $req = Model::$pdo->query($sql);
        $tab_prod = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelLien');


        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }

    public function save() {

        try {
            $sql = "INSERT INTO Liens (idLien,libelle,image, lienweb) VALUES (:id, :libelle, :img, :lien)";
            $req = Model::$pdo->prepare($sql);
            $values = array(
                'id' => $this->idLien,
                'libelle' => $this->libelle,
                'img' => $this->image,
                'lien' => $this->lienweb,
            );
            return $req->execute($values);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) {
        try {
            $sql = "DELETE FROM Liens WHERE idLien =:read1";
            $req = Model::$pdo->prepare($sql);
            $values = array(
                'read1' => $id,
            );
            $req->execute($values);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updated($id) {
        $sql = "UPDATE Liens SET libelle =:read2, image =:read3, lienweb =:read4 WHERE idLien=:read5";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            
            "read2" => $this->libelle,
            "read3" => $this->image,
            "read4" => $this->lienweb,
            "read5" => $id,
        );
        return $req->execute($values);
    }

    public function getNbPartenaires(){
        $sql = "SELECT COUNT(*) AS total FROM Liens";
        $req = Model::$pdo->query($sql);
        $tab_prod = $req->FETCH();


        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }
}
