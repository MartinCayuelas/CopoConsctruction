<?php

class Security {

    private static $seed = 'CopoCanadiensMontreal';
    private static $salt = 'Firestorm';

    public function chiffrer($texte_en_clair) {
        $concat = Security::getSalt() . $texte_en_clair . Security::getSeed();
        $texte_chiffre = hash('sha256', $concat);

        return $texte_chiffre;
    }

    static public function getSeed() {
        return self::$seed;
    }
    static function getSalt() {
        return self::$salt;
    }



    

}
