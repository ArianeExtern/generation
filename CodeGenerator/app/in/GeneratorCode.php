<?php
namespace App\in;
use Berthe\Codegenerator\CallGenerator;

/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:20 م
 */



class GeneratorCode  extends CallGenerator {

    private $site ;

    public function getSite(){
        $this->site = [
            //Table Film
            "film" => [
                "attributs" => ["titre" => "", "annee" => 0],
                "relations" => ["hasMany" => ["acteur"]],
            ],
            //Table Acteur
            "acteur" => [
                "attributs" => ["nom" => "", "age" => 0],
                "relations" => ["belongsTo" => ["film"]],
            ],
        ];

        return $this->site;
    }
}