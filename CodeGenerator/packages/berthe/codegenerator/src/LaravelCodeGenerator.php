<?php
namespace Berthe\Codegenerator;

use Berthe\CodeGenerator\TemplateProvider;
/**
 * Created by PhpStorm.
 * User: seydou
 * Date: 01/09/16
 * Time: 09:40 ص
 */
class LaravelCodeGenerator implements ILaravelCodeGenerator
{
    private $mda;


    public function __construct($table = array())
    {
        $this->mda = $table;
    }

    /**
     * Function generating a view Based on it name
     * @param string $template
     * @param string $outdir
     */
    function generateLaravel($template = "form", $outdir = "form")
    {
        foreach($this->mda as $tableName => $table){
            $table['title'] = $tableName;
            $fileGenerator = new FileGenerator(TemplateProvider::getTemplate($template), ["table" => $table]);
            $fileGenerator->put(base_path('out/'.$outdir).'/'.$tableName.'.php');
        }
    }

    function generateLaravelModel()
    {
        $this->generateLaravel("model", "model");
    }

    function generateLaravelSchema()
    {
        $this->generateLaravel("schema", "schema");
    }

    function generateLaravelController()
    {
        $this->generateLaravel("controller", "controller");
    }

    function generateLaravelForm()
    {
        $this->generateLaravel("form", "form");
    }

    public function generate($type = "Form")
    {
        $generateMethod = "generateLaravel".$type;
        $this->$generateMethod();
    }

}