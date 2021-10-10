<?php
class session{
        //ATRIBUTOS
        private $baseDatos;
        private $mensajeError;
        private $usNombre;
        private $usPass;
    
        //CONSTRUCTOR
        public function __construct()
        {
            if (@session_start()) {
            }
        }
    
        public function iniciar($usuario, $pass)
        {
            // session_start();
            $exito = false;
            if ($usuario != null && $pass != null) {
                $this->usNombre= $usuario;
                $this->usPass=  $pass; //md5($pass);
                echo $this->usPass . "<br>";
                $exito = true;
            }
            return $exito;
        }
    
        /**
         * Evalua que el usuario ya haya sido inicializado
         * Si no fue inicializado busca en la base de datos si ya está registrado. Sino devuelve false
         */
        public function validar()
        {
            $exito = false;
            if ($this->usNombre != null && $this->usPass != null) {
                if (!isset($_SESSION['usNombre']) && !isset($_SESSION['usPass'])) {
                    $sql = "SELECT COUNT(*) FROM usuario WHERE usNombre = '{$this->usNombre}' AND usPass = '{$this->usPass}'";
                    $this->baseDatos = new BaseDatos();
                    $resultado = $this->baseDatos->query($sql);
                    $row = $resultado->fetch(PDO::FETCH_ASSOC);
                    if ($row['COUNT(*)'] != 0) {
                        $exito = true;
                        $_SESSION['usNombre'] = $this->usNombre;
                        $_SESSION['usPass'] = md5($this->usPass);
                        $_SESSION['activa'] = true;
                        echo $_SESSION['usPass'];
                    }
                }
            }
            return $exito;
        }
    
        public function activa()
        {
            return isset($_SESSION['activa']);
        }
    
        public function getUsuario()
        {
            return $_SESSION['usNombre'];
        }
    
        public function getRol()
        {
            return $_SESSION['idRol'];
        }
    
        public function cerrar()
        {
            return session_destroy();
        }
    }

