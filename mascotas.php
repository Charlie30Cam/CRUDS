<?php require_once 'conexion.php';
class mascotas
{
    public $id;
    public $nombre;
    public $especie;
    private $objconexion;

    public function __construct()
    {
        $this->id=0;
        $this->nombre="";
        $this->especie="";
        $this->objconexion=new conection();
    }

    public static function listar()
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar('select * from catmascotas');
        $objconexion->cerrar();
        return $listado;
    }

    public static function obtenerporid($pid)
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar("select * from catmascotas WHERE id=$pid");
        $objconexion->cerrar();
        return $listado[0];
    }

    public function agregar()
    {
        $strConsultar="INSERT INTO catmascotas(nombre,especie)
            VALUES('$this->nombre'".",'$this->especie')";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function elim()
    {
        $strConsultar="DELETE FROM catmascotas WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function editar()
    {
        $strConsultar="UPDATE catmascotas set nombre='$this->correo'".",especies='$this->especies'
            WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
}