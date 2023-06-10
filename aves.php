<?php require_once 'conexion.php';
class aves
{
    public $id;
    public $nombre;
    public $rasa;
    private $objconexion;

    public function __construct()
    {
        $this->id=0;
        $this->nombre="";
        $this->rasa="";
        $this->objconexion=new conection();
    }

    public static function listar()
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar('select * from cataves');
        $objconexion->cerrar();
        return $listado;
    }

    public static function obtenerporid($pid)
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar("select * from cataves WHERE id=$pid");
        $objconexion->cerrar();
        return $listado[0];
    }

    public function agregar()
    {
        $strConsultar="INSERT INTO cataves(nombre,rasa)
            VALUES('$this->nombre'".",'$this->rasa')";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function elim()
    {
        $strConsultar="DELETE FROM cataves WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function editar()
    {
        $strConsultar="UPDATE cataves set nombre='$this->correo'".",rasa='$this->rasa'
            WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
}