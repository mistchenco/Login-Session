<?php

class usuarioRol
{

    //Atributos (Politica un usuario puede tener un solo rol, por eso se implementa el objRol y no coleccion de Roles)
    private $objUsuario;
    private $objRol;
    private $mensajeOperacion;

    public function __construct()
    {
        $this->objUsuario;
        $this->objRol;
        $this->mensajeOperacion = "";
    }

    public function setear($objUsuario, $objRol)
    {
        $this->setObjRol($objRol);
        $this->setObjUsuario($objUsuario);
    }

    //GETTERS
    public function getObjUsuario()
    {
        return $this->objUsuario;
    }
    public function getObjRol()
    {
        return $this->objRol;
    }

    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    //SETTERS
    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;

        return $this;
    }
    public function setObjRol($objRol)
    {
        $this->objRol = $objRol;

        return $this;
    }

    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;

        return $this;
    }


    //CONSULTAS A BBDD
    public function cargar()
    {
        $resp = false;
        $base = new BaseDatos();
        $objUsuario = $this->getObjUsuario();
        $idUsuario = $objUsuario->getIdUsuario();
        $objRol = $this->getObjRol();
        $idRol = $objRol->getIdRol();
        $sql = "SELECT * FROM usuarioRol WHERE idUsuario = '$idUsuario' AND idrol = '$idRol'";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['idUsuario'], $row['idRol']);
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->listar: " . $base->getError());
        }
        return $resp;
    }

    public function listar($condicion = "")
    {
        $arregloUsuarioRol = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM usuarioRol ";
        if ($condicion != "") {
            $sql = $sql . ' where ' . $condicion;
        }


        $res = $base->Ejecutar($sql);
        if ($res > -1) {
            if ($res > 0) {

                while ($row = $base->Registro()) {
                    $objUsuarioRol = new UsuarioRol();

                    $objUsuario = new Usuario();
                    $objUsuario->setIdUsuario($row['idUsuario']);
                    $objUsuario->cargar();

                    $objRol = new Rol();
                    $objRol->setIdRol($row['idRol']);
                    $objRol->cargar();

                    $objUsuarioRol->setear($objUsuario, $objRol);;
                    array_push($arregloUsuarioRol, $objUsuarioRol);
                }
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->listar: " . $base->getError());
        }
        return $arregloUsuarioRol;
    }


    public function insertar()
    {
        $base = new BaseDatos();
        $resp = false;
        $objUsuario = $this->getObjUsuario();
        $idUsuario = $objUsuario->getIdUsuario();
        $objRol = $this->getObjRol();
        $idRol = $objRol->getIdRol();
        $sql = "INSERT INTO usuariorol(idUsuario, idRol) VALUES ('$idUsuario', '$idRol')";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                //$this->setId($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->insertar: " . $base->getError());
        }

        return $resp;
    }

    public function modificar()
    {
        $resp = false;
        $base = new BaseDatos();
        $objUsuario = $this->getObjUsuario();
        $idUsuario = $objUsuario->getIdUsuario();
        $objRol = $this->getObjRol();
        $idRol = $objRol->getIdRol();
        $sql = "UPDATE usuarioRol SET idUsuario = '$idUsuario', idRol = '$idRol' WHERE idUsuario = '$idUsuario' AND idRol = '$idRol'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar()
    {
        $base = new BaseDatos();
        $resp = false;
        $objUsuario = $this->getObjUsuario();
        $idUsuario = $objUsuario->getIdUsuario();
        $objRol = $this->getObjRol();
        $idRol = $objRol->getIdRol();
        if ($base->Iniciar()) {
            $sql = "DELETE FROM usuarioRol WHERE idUsuario = '$idUsuario' AND idRol = '$idRol'";
            if ($base->Ejecutar($sql)) {
                $resp =  true;
            } else {
                $this->setmensajeoperacion("UsuarioRol->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("UsuarioRol->eliminar: " . $base->getError());
        }
        return $resp;
    }
}
