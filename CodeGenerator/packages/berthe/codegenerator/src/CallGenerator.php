<?php
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 05:40 م
 */

namespace Berthe\Codegenerator;
use Berthe\Codegenerator\LaravelCodeGenerator;

class CallGenerator
{
    public function getSite(){
        return array();
    }

    public function index()
    {
        $laravelGenerator = new LaravelCodeGenerator($this->getSite());
        $laravelGenerator->generate('ShowForm');
        $laravelGenerator->generate('Schema');
        $laravelGenerator->generate('Model');
        $laravelGenerator->generate('Controller');
        $laravelGenerator->generate('Schema');

    }

}