<?php
/**
 * PHP Version 7.2
 * Mnt
 *
 * @category Controller
 * @package  Controllers\Mnt
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  Comercial http://
 * @version  CVS:1.0.0
 * @link     http://url.com
 */
 namespace Controllers\Mnt;

// ---------------------------------------------------------------
// Sección de imports
// ---------------------------------------------------------------
use Controllers\PublicController;
use Dao\Mnt\Pianos as Daopiano;
use Utilities\Validators;
use Views\Renderer;

/**
 * Piano
 *
 * @category Public
 * @package  Controllers\Mnt;
 * @author   Orlando J Betancourth <orlando.betancourth@gmail.com>
 * @license  MIT http://
 * @link     http://
 */
class Piano extends PublicController
{

    private $viewData= array();
    private $arrayEstado= array(); 
    private $arrayModeDesc= array();
    /**
     * Runs the controller
     *
     * @return void
     */
    public function run():void
    {
        
        
        $this->init();
        if(!$this->isPostBack()) {
            $this->procesarGet();
        }
        if($this->isPostBack()) {
            $this->procesarPost();
        }

        $this->procesarView();
      
        Renderer::render('mnt/piano', $this->viewData);
    }

    private function init() {
        $this->viewData["mode"]= "";
        $this->viewData["mode_desc"]= "";
        $this->viewData["crsf_token"]= "";
        $this->viewData["pianoid"]= "";
        $this->viewData["pianodsc"]= "";
        $this->viewData["error_pianodsc"]=  array();
        $this->viewData["pianobio"]= "";
        $this->viewData["error_pianobio"]= array();
        $this->viewData["pianosales"]= "";
        $this->viewData["error_pianosales"]=  array();
        $this->viewData["pianoimguri"]= "";
        $this->viewData["error_pianoimguri"]=  array();
        $this->viewData["pianoimgthb"]= "";
        $this->viewData["pianoprice"]= "";
        $this->viewData["error_pianoprice"]= array();
        $this->viewData["pianoest"]= "";
        $this->viewData["btnEnviarText"]= "Guardar";
        $this->viewData["showBtnEnviar"]= true;
        $this->viewData["readonly"]= false;

        $this->arrayModeDesc = array(
            "INS"=>"Nuevo Producto",
            "UPD"=>"Editando %s %s",
            "DSP"=>"Detalle de %s %s",
            "DEL"=>"Eliminado %s %s"
        );

        $this->arrayEstado = array(
            array("value" => "ACT", "text" => "Activo"),
            array("value" => "INA", "text" => "Inactivo"),
        );

        $this->viewData["pianoestArray"]= $this->arrayEstado;

    }

    private function procesarGet() {
        if(isset($_GET["mode"])) {
            $this->viewData["mode"]= $_GET["mode"]; 
            if(!isset($this->arrayModeDesc[$this->viewData["mode"]])) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_pianos",
                    "El modo solicitado no existe"
                );
            }
        }

        if($this->viewData["mode"] !== "INS" && isset($_GET["id"])) {
            $this->viewData["pianoid"]= intval($_GET["id"]); 
            $arrayPianos= Daopiano::getById($this->viewData["pianoid"]); 
            \Utilities\ArrUtils::mergeFullArrayTo($arrayPianos, $this->viewData);
        }
    }

    private function procesarPost() {
        $existErrores=false;
        \Utilities\ArrUtils::mergeArrayTo($_POST, $this->viewData);
        if(isset($_SESSION[$this->name . "crsf_token"]) && $_SESSION[$this->name . "crsf_token"] !== $this-> viewData["crsf_token"]) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_pianos",
                "Surgio un error"
            );
        }

        if(Validators::IsEmpty($this->viewData["pianodsc"])) {
            $this->viewData["error_pianodsc"][]= "Tiene que rellenar la descripcion";
            $existErrores= true;
        }
        if(Validators::IsEmpty($this->viewData["pianobio"])) {
            $this->viewData["error_pianobio"][]= "Tiene que rellenar la biografia del piano";
            $existErrores= true;
        }

        if(Validators::IsEmpty($this->viewData["pianosales"])) {
            $this->viewData["error_pianosales"][]= "Tiene que rellenar las ventas del piano";
            $existErrores= true;
        }

        if(Validators::IsEmpty($this->viewData["pianoimguri"])) {
            $this->viewData["error_pianoimguri"][]= "Tiene que rellenar la uri de la imagen";
            $existErrores= true;
        }

        if(Validators::IsEmpty($this->viewData["pianoprice"])) {
            $this->viewData["error_pianoprice"][]= "Tiene que rellenar el precio del piano";
            $existErrores= true;
        }


        if(!$existErrores) {
            $result= null; 
            switch($this->viewData["mode"]) {
                case 'INS': 
                    $result= Daopiano::insert(
                        $this->viewData["pianodsc"],
                        $this->viewData["pianobio"],
                        $this->viewData["pianosales"],
                        $this->viewData["pianoimguri"],
                        $this->viewData["pianoimgthb"],
                        $this->viewData["pianoprice"],
                        $this->viewData["pianoest"]
                    );

                    if($result) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_pianos",
                            "Producto Guardado Exitosamente"
                        );
                    }
                    break;
                case 'UPD': 
                        $result= Daopiano::update(
                            $this->viewData["pianoid"],
                            $this->viewData["pianodsc"],
                            $this->viewData["pianobio"],
                            $this->viewData["pianosales"],
                            $this->viewData["pianoimguri"],
                            $this->viewData["pianoimgthb"],
                            $this->viewData["pianoprice"],
                            $this->viewData["pianoest"]
                        );
    
                        if($result) {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_pianos",
                                "Producto Actualizado Exitosamente"
                            );
                        }
                        break;
                    case 'DEL':
                            $result = Daopiano::delete(
                                intval($this->viewData["pianoid"])
                            );
                            if ($result) {
                                \Utilities\Site::redirectToWithMsg(
                                    "index.php?page=mnt_pianos",
                                    "Producto Eliminado Exitosamente"
                                );
                            }
                            break;
            }
        }

    }

    private function procesarView() {
        if($this->viewData["mode"]==="INS") {
            $this->viewData["mode_desc"]= $this->arrayModeDesc["INS"];
            $this->viewData["btnEnviarText"]= "Guardar Nuevo";
        }
        else 
        {
            $this->viewData["mode_desc"]= sprintf(
                $this->arrayModeDesc[$this->viewData["mode"]],
                $this->viewData["pianodsc"],
                ", Codigo: ".$this->viewData["pianoid"],
            );

            $this->viewData["pianoestArray"]= 
            \Utilities\ArrUtils::objectArrToOptionsArray(
                $this->arrayEstado,
                'value',
                'text',
                'value',
                $this->viewData["pianoest"]
            );

            if($this->viewData["mode"]=="DSP") {
                $this->viewData["readonly"]= true;
                $this->viewData["showBtnEnviar"] = false;
            }

            if ($this->viewData["mode"] === "DEL") {
                $this->viewData["readonly"] = true;
                $this->viewData["btnEnviarText"] = "Eliminar";
            }
            if ($this->viewData["mode"] === "UPD") {
                $this->viewData["btnEnviarText"] = "Actualizar";
            }
        }
        $this->viewData["crsf_token"] = md5(getdate()[0] . $this->name);
        $_SESSION[$this->name . "crsf_token"] = $this->viewData["crsf_token"];
    }
}

?>
