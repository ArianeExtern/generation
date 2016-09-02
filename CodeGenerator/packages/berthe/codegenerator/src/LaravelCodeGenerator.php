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
     * Helper function used to prepend String to a file.
     * @param $toPrepend
     * @param $paths
     */
    private function prependStringToFile($toPrepend, $paths){
        foreach ($paths as $path){
            $content = file_get_contents($path);
            file_put_contents($path, "$toPrepend".$content);
            chmod($path, 0777);
        }
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

            if(in_array($template, array("model", "schema", "controller")))
                yield $path;
        }
    }

    /**
     * Function generate a Model php files for the given MCD
     */
    function generateLaravelModel()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("model", "model"));
    }

    /**
     * Function generating Schema php files for the given MCD
     */
    function generateLaravelSchema()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("schema", "schema"));
    }

    /**
     * Function generating Controller php files for the given MCD
     */
    function generateLaravelController()
    {
        $this->prependStringToFile("<?php \n", $this->generateLaravel("controller", "controller"));
    }

    /**
     * generating Form .blade.php files for the given MCD
     */
    function generateLaravelForm()
    {
        $this->prependStringToFile("", $this->generateLaravel("form", "form"));
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