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

            if($template == "schema"){
                $path = base_path('out/'.$outdir).'/'.date('j_m_y_h_i_s').'_create_'.$tableName.'_table.php';
            }else{
                $path = base_path('out/'.$outdir).'/'.$tableName.'.php';
            }

            $fileGenerator->put($path);

            //Change Dir Right.
            chmod($path, 0777);
        }
    }

    /**
     * Function generate a Model php files for the given MCD
     */
    function generateLaravelModel()
    {
        $this->generateLaravel("model", "model");
    }

    /**
     * Function generating Schema php files for the given MCD
     */
    function generateLaravelSchema()
    {
        $this->generateLaravel("schema", "schema");
    }

    /**
     * Function generating Controller php files for the given MCD
     */
    function generateLaravelController()
    {
        $this->generateLaravel("controller", "controller");
    }

    /**
     * generating Form .blade.php files for the given MCD
     */
    function generateLaravelForm()
    {
        $this->generateLaravel("form", "form");
    }

    /**
     * Funcion generating the Files dynamically based on a Given param
     *
     * @param string $type : Allowed => Form, Model, Schema and Controller.
     */
    public function generate($type = "Form")
    {
        $generateMethod = "generateLaravel".$type;
        $this->$generateMethod();
    }

}