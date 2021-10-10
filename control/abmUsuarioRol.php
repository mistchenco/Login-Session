<?php
class AbmUsuarioRol {
	 /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return object
     */
    private function cargarObjeto($param){
        //verEstructura($param);
	 	$objUsuarioRol = null;
        //print_r($param);
	 	if( array_key_exists('idRol',$param) and array_key_exists('idUsuario',$param)){
	 		$objUsuarioRol = new usuarioRol();
            $objUsuarioRol->setear($param['objUsuario'], $param['objRol']);
        }
        return $objUsuarioRol;
    }


     /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return object
     */
    private function cargarObjetoConClave($param){
    	$objUsuarioRol = null;
        //print_R ($param);
    	if( isset($param['objUsuario']) && isset($param['objRol']) ){
    		$objUsuarioRol = new UsuarioRol();
            $objUsuarioRol->setear($param['objUsuario'], $param['objRol']);
    	}
    	return $objUsuarioRol;
    }
 /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */

    private function seteadosCamposClaves($param){

    	$resp = false;
    	if (isset($param['objUsuario']) && isset($param['objRol']));

    	$resp = true;
    	return $resp;

    }


    public function alta($param){
    	$resp = false;
    	$objUsuarioRol = $this->cargarObjeto($param);
    	if ($objUsuarioRol!=null and $objUsuarioRol->insertar()){
    		$resp = true;
    	}

    	return $resp;
    }

     /**
     * permite eliminar un objeto
     * @param array $param
     * @return boolean
     */

    public function baja($param){
        //verEstructura($param);
    	$resp = false;
    	if ($this->seteadosCamposClaves($param)){

    		$objUsuarioRol = $this->cargarObjeto($param);

    		if ($objUsuarioRol !=null and $objUsuarioRol->eliminar()){

    			$resp = true;
    		}
    	}
    	return $resp;
    }
  /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        //print_R($param);
    	$resp = false;
    	if ($this->seteadosCamposClaves($param)){

    		$objUsuarioRol = $this->cargarObjeto($param);

    		if($objUsuarioRol !=null and $objUsuarioRol->modificar()){
    			$resp = true;

    		}
    	}
    	return $resp;
    }

/**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */

    public function buscar($param){
        // print_R ($param);

    	$where = " true ";
    	if ($param<>NULL){
    		if  (isset($param['idUsuario']))
    			$where.=" and idUsuario='".$param['idUsuario']."'";
    		if  (isset($param['idrol']))
    			$where.=" and idRol ='".$param['idRol']."'";
    	}
        $objUsuarioRol= new UsuarioRol();
        $arreglo = $objUsuarioRol->listar($where);
        return $arreglo;

    }




}