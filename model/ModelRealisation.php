<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelRealisation {

    private $idRealisation;
    private $libelle;
    private $principale;
    private $image1;
    private $image2;
    private $image3;
    private $image4;
    private $description;

    function getIdRealisation() {
        return $this->idRealisation;
    }

    function getLibelle() {
        return $this->libelle;
    }

    function getPrincipale() {
        return $this->principale;
    }

    function getImage1() {
        return $this->image1;
    }

    function getImage2() {
        return $this->image2;
    }

    function getImage3() {
        return $this->image3;
    }

    function getImage4() {
        return $this->image4;
    }

    function getDescription() {
        return $this->description;
    }

    public function __construct($id = NULL, $lib = NULL, $p = NULL, $img = NULL, $img2 = NULL, $img3 = NULL, $img4 = NULL, $desc = NULL) {
        if (!is_null($id) && !is_null($lib) && !is_null($p) && !is_null($img) && !is_null($img2) && !is_null($img3) && !is_null($img4) && !is_null($desc)) {
            $this->idRealisation = $id;
            $this->libelle = $lib;
            $this->principale = $p;
            $this->image1 = $img;
            $this->image2 = $img2;
            $this->image3 = $img3;
            $this->image4 = $img4;
            $this->description = $desc;
        }
    }

    public function getAllPrincipales() {
        $sql = "SELECT * FROM Realisation WHERE principale = '1'";
        $req = Model::$pdo->query($sql);
        $tab_prod = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelRealisation');


        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }

    public function getAllByLibelle($lib) {

        $sql = "SELECT * FROM Realisation WHERE libelle=:read1";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "read1" => $lib,
        );
        $req->execute($values);
        $tab_prod = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelRealisation');
        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }

    public function getRealisationById($id) {
        $sql = "SELECT * FROM Realisation WHERE idRealisation=:read1";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "read1" => $id,
        );
        $req->execute($values);
        $tab_prod = $req->FETCHALL(PDO::FETCH_CLASS, 'ModelRealisation');
        if (empty($tab_prod)) {
            return false;
        }
        return $tab_prod;
    }

    public function save() {

        try {
            $sql = "INSERT INTO Realisation (idRealisation,libelle,principale, image1, image2, image3, image4, description) VALUES (:id, :libelle, :princi, :img, :img2, :img3, :img4, :descrip)";
            $req = Model::$pdo->prepare($sql);
            $values = array(
                'id' => $this->idRealisation,
                'libelle' => $this->libelle,
                'princi' => $this->principale,
                'img' => $this->image1,
                'img2' => $this->image2,
                'img3' => $this->image3,
                'img4' => $this->image4,
                'descrip' => $this->description,
            );
            return $req->execute($values);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function deleteById($id) {
        try {
            $sql = "DELETE FROM Realisation WHERE idRealisation =:read1";
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
        $sql = "UPDATE Realisation SET libelle =:read, principale =:read2, image1 =:read3, image2 =:read4, image3 =:read7, image4 =:read8, description =:read5 WHERE idRealisation=:read6";
        $req = Model::$pdo->prepare($sql);
        $values = array(
            "read" => $this->libelle,
            "read2" => $this->principale,
            "read3" => $this->image1,
            "read4" => $this->image2,
            "read7" => $this->image3,
            "read8" => $this->image4,
            "read5" => $this->description,
            "read6" => $id,
        );
        return $req->execute($values);
    }

    public function getNbRealisations() {
        $sql = "SELECT COUNT(*)AS total FROM Realisation";
        $req = Model::$pdo->query($sql);
        $tab_prod = $req->FETCH();


        if (empty($tab_prod)) {
            return false;
        }
        
        return $tab_prod;
    }

}
