<?php

class usuario
{
    private $idUsuario;
    private $usNombre;
    private $usPass;
    private $usMail;
    private $usDesabilitado;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->idUsuario = '';
        $this->usNombre = '';
        $this->usPass = '';
        $this->usMail = '';
        $this->usDesabilitado = '';
        $this->mensajeOperacion = '';
    }
    // Metodos Setters
    public function setear($idUsuario, $usNombre, $usPass, $usMail, $usDesabilitado)
    {
        $this->setIdUsuario($idUsuario);
        $this->setUsNombre($usNombre);
        $this->setUsPass($usPass);
        $this->setUsMail($usMail);
        $this->setUsDesabilitado($usDesabilitado);
    }


    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }
    public function setUsNombre($usNombre)
    {
        $this->usNombre = $usNombre;
    }
    public function setUsPass($usPass)
    {
        $this->usPass = $usPass;
    }

    public function setUsMail($usMail)
    {
        $this->usMail = $usMail;
    }
    public function setUsDesabilitado($usDesabilitado)
    {
        $this->usDesabilitado = $usDesabilitado;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    // Metodos Getters
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }




    public function getUsNombre()
    {
        return $this->usNombre;
    }




    public function getUsPass()
    {
        return $this->usPass;
    }




    public function getUsMail()
    {
        return $this->usMail;
    }




    public function getUsDesabilitado()
    {
        return $this->usDesabilitado;
    }




    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }

    // Consultas a la Base de Datos

    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario WHERE idUsuario = " . $this->getIdUsuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDesabilitado']);
                }
            }
        } else {
            $this->setmensajeoperacion("usuario->listar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($parametro = "")
    {
        // echo ' estoy en listar'; 
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuario ";
        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }

        $res = $base->Ejecutar($sql);

        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $obj = new usuario();
                    $obj->setear($row['idUsuario'], $row['usNombre'], $row['usPass'], $row['usMail'], $row['usDesabilitado']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeoperacion("usuario->listar: " . $base->getError());
        }

        return $arreglo;
    }
    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;

        $idUsuario = $this->getIdUsuario();
        $usNombre = $this->getUsNombre();
        $usPass = $this->getUsPass();
        $usMail = $this->getUsMail();
        $usDesabilitado = $this->getUsDesabilitado();
        //Preguntar si ponemos el id del usuario
        $sql = "INSERT INTO usuario(idUsuario,usNombre, usPass, usMail, usDesabilitado)
    VALUES ('$idUsuario','$usNombre', '$usPass', '$usMail', '$usDesabilitado')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setIdUsuario($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Usuario->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->insertar: " . $base->getError());
        }

        return $resp;
    }


    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $idUsuario = $this->getIdUsuario();
        $usNombre = $this->getUsNombre();
        $usPass = $this->getUsPass();
        $usMail = $this->getUsMail();
        $usDesabilitado = $this->getUsDesabilitado();

        $sql = "UPDATE usuario SET usNombre = '$usNombre', usPass = '$usPass', usMail = '$usMail', usDesabilitado = '$usDesabilitado' WHERE idUsuario = '$idUsuario'";
     
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion("Usuario->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        $idUsuario = $this->getIdUsuario();
        if ($base->Iniciar()) {
            $sql = "DELETE FROM usuario WHERE idUsuario = '$idUsuario'";
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion("Usuario->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Usuario->eliminar: " . $base->getError());
        }
        return $resp;
    }
}
