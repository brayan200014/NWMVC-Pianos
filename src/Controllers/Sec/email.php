<?php
namespace Controllers\Sec;

use Controllers\PublicController;
use phpDocumentor\Reflection\Types\Void_;
use \Views\Renderer; 

class Email extends \Controllers\PublicController {

    private $txtEmail = "";
    private $errorEmail = "";
    private $generalError = "";
    private $hasError = false;
    private $desc= "False";
            public function run() :void {

                if($this->isPostBack()) {
                    $this->txtEmail= $_POST["txtEmail"];

                    if (!\Utilities\Validators::IsValidEmail($this->txtEmail)) {
                        $this->errorEmail = "¡Correo no tiene el formato adecuado!";
                        $this->hasError = true;
                    }

                   if(!$this->hasError) {
                        if($user= \Dao\Security\Security::getUsuarioByEmail($this->txtEmail)){
                            if($user["userest"] != \Dao\Security\Estados::ACTIVO) {
                                $this->generalError = "¡Credenciales son incorrectas!";
                        $this->hasError = true;
                        error_log(
                            sprintf(
                                "ERROR: %d %s tiene cuenta con estado %s",
                                $user["usercod"],
                                $user["useremail"],
                                $user["userest"]
                            )
                        );
                           
                    } 
                       
                }
                else {
                    $this->generalError = "¡Credenciales son incorrectas!";
                    $this->hasError = true;
                } 

                if(!$this->hasError) {
                    $pin= rand(10000, 99999);
                    $fechaExp= date('Y-m-d H:i:s',  strtotime("+5 min"));  //(0*0*0*5*0) (m d h mi s)
                    \Dao\Security\Security::updateRecovery($pin, $fechaExp, $user["usercod"]);
                    if($mail= \Dao\Security\Security::sendEmail($user["useremail"], $pin)) {
                            $this->desc= "Enviado";
                            \Utilities\Site::redirectToWithMsg(
                                "index.php?page=sec_recovery&id=".$user["usercod"],
                                "Pin Enviado al correo"
                            );
                    }
                     else {
                        $this->desc= "No se envio";
                     }
                }
                  
            }
               
        }

                $dataView= get_object_vars($this);
                \Views\Renderer::render("security/email", $dataView);
           
            }
    }
?>