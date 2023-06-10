<?php require_once 'conexion.php';
class usuarios
{
    //atributos//
    public $id;
    public $correo;
    public $contrasena;
    private $objconexion;

    //constructor//
    public function __construct()
    {
        $this->id=0;
        $this->correo='';
        $this->contrasena='';
        $this->objconexion=new conection();
    }

    //metodos//
    public static function listar()
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar('select * from catusuarios');
        $objconexion->cerrar();
        return $listado;
    }

    public static function obtenerporid($pid)
    {
        $objconexion=new conexion();
        $listado=$objconexion->consultar("select * from catusuarios WHERE id=$pid");
        $objconexion->cerrar();
        return $listado[0];
    }

    //----------------------------------------- METODOS CRUD ---------------------------------------------//

    public function agregar()
    {
        $strConsultar="INSERT INTO catusuarios(id,correo,contrasena)
            VALUES('$this->correo'".",'$this->contrasena')";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function elim()
    {
        $strConsultar="DELETE FROM catusuarios WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
    public function editar()
    {
        $strConsultar="UPDATE catusuarios set correo='$this->correo'".",contrasena='$this->contrasena'
            WHERE id=$this->id";
        $resultado=$this->objconexion->actualizar($strConsultar);
        $this->objconexion->cerrar();
        return $resultado;
    }
   
    public function validausuario()
    {
        $objconexion=new conexion();
        $strConsulta="SELECT * FROM catusuarios WHERE correo='$this->correo' AND contrasena='$this->contrasena'";
        echo $strConsulta;
        $listado=$objconexion->consultar($strConsulta);
        
        
        if($listado)
        {
            return true;
        }
        else{
            return false;
        }
    }

}
