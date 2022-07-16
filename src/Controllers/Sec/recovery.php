<?php
    namespace Controllers\Sec;

use Controllers\PublicController;
use Dao\Security\Security;
use phpDocumentor\Reflection\Types\Void_;
use \Views\Renderer; 

class Recovery extends \Controllers\PublicController {

    private $codUser= "";
    private $pin= ""; 
    private $errorPin= "";
    
            public function run() :void {

                if($this->isPostBack()) {
                    $this->codUser= $_POST["id"];
                    $this->pin= $_POST["pin"];
                    $getUserInfo= \Dao\Security\Security::getPin($this->pin, $this->codUser);
                    error_log(
                        sprintf(
                            "ERROR: %s  %s trato de ingresar",
                            $this->pin, 
                            $this->codUser
                        )
                    );

                   if(\Utilities\Validators::IsEmpty($getUserInfo["pin"])) {
                         $this->errorPin= "El pin es invalido o ya expiro";
                   }

                   
                    if($this->errorPin === "") {
                        \Utilities\Site::redirectToWithMsg(
                            "index.php?page=sec_reset&id=".$this->codUser,
                            "Pin Correcto"
                        );
                    }
                }

                

                $dataView= get_object_vars($this);
                \Views\Renderer::render("security/recovery", $dataView);
            }
    }
?>