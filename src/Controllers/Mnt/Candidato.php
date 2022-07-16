<?php
namespace Controllers\Mnt;
use Controllers\PublicController;
use Dao\Mnt\Candidatos as DaoCandidatos;
use Utilities\Validators;
use Views\Renderer;


class Candidato extends PublicController
{

    private $viewData= array();
    private $arrayModeDesc= array();
 
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
      
        Renderer::render('mnt/candidato', $this->viewData);
    }

    private function init() {
        $this->viewData["mode"]= "";
        $this->viewData["mode_desc"]= "";
        $this->viewData["id"]= "";
        $this->viewData["nombre"]= "";
        $this->viewData["error_nombre"]=  array();
        $this->viewData["identidad"]= "";
        $this->viewData["error_identidad"]=  array();
        $this->viewData["edad"]= "";
        $this->viewData["error_edad"]= array();
        $this->viewData["btnEnviarText"]= "Guardar";
        $this->viewData["showBtnEnviar"]= true;
        $this->viewData["readonly"]= false;

        $this->arrayModeDesc = array(
            "INS"=>"Nuevo Candidato",
            "UPD"=>"Editando %s %s",
            "DSP"=>"Detalle de %s %s",
            "DEL"=>"Eliminado %s %s"
        );

    }

    private function procesarGet() {
        if(isset($_GET["mode"])) {
            $this->viewData["mode"]= $_GET["mode"]; 
            if(!isset($this->arrayModeDesc[$this->viewData["mode"]])) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_canditatos",
                    "modo no existe"
                );
            }
        }

        if($this->viewData["mode"] !== "INS" && isset($_GET["id"])) {
            $this->viewData["pianoid"]= intval($_GET["id"]); 
            $arrayCandidatos= DaoCandidatos::getById($this->viewData["id"]); 
            \Utilities\ArrUtils::mergeFullArrayTo($arrayCandidatos, $this->viewData);
        }
    }

    private function procesarPost() {
        $existErrores=false;
        \Utilities\ArrUtils::mergeArrayTo($_POST, $this->viewData);

        if(Validators::IsEmpty($this->viewData["nombre"])) {
            $this->viewData["error_nombre"][]= "Tiene que rellenar el nombre";
            $existErrores= true;
        }
        if(Validators::IsEmpty($this->viewData["identidad"])) {
            $this->viewData["error_identidad"][]= "Tiene que rellenar la identidad";
            $existErrores= true;
        }

        if(Validators::IsEmpty($this->viewData["edad"])) {
            $this->viewData["error_edad"][]= "Tiene que rellenar la edad";
            $existErrores= true;
        }


        if(!$existErrores) {
            $result= null; 
            switch($this->viewData["mode"]) {
                case 'INS': 
                    $result= DaoCandidatos::insert(
                        $this->viewData["nombre"],
                        $this->viewData["identidad"],
                        $this->viewData["edad"],
                    );

                    if($result) {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=mnt_canditatos",
                            "Se registro el candidato"
                        );
                    }
                    break;
                case 'UPD': 
                        $result= DaoCandidatos::update(
                            $this->viewData["nombre"],
                            $this->viewData["identidad"],
                            $this->viewData["edad"],
                            $this->viewData["id"],
                            
                        );
    
                        if($result) {
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=mnt_canditatos",
                                "se actualizo el candidato"
                            );
                        }
                        break;
                    case 'DEL':
                            $result = DaoCandidatos::delete(
                                intval($this->viewData["id"])
                            );
                            if ($result) {
                                \Utilities\Site::redirectToWithMsg(
                                    "index.php?page=mnt_canditatos",
                                    "se elimino el candidato"
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
                $this->viewData["id"],
                $this->viewData["nombre"],
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
    }
}

?>
