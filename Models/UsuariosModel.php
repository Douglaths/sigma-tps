<?php
class UsuariosModel extends Mysql
{
    private $intIdeUsuario;
    private $strIdentificacionUsuario;
    private $strNombresUsuario;
    private $strApellidosUsuario;
    private $strTelefonoUsuario;
    private $strEmailUsuario;
    private $strPassword;
    private $strRolUsuario;
    private $strStatusUsuario;

    public function __construct()
    {
        parent::__construct();
    }

    // $this->intIdeUsuario;
    // $this->strIdentificacionUsuario;
    // $this->strNombresUsuario;
    // $this->strApellidosUsuario;
    // $this->strTelefonoUsuario;
    // $this->strEmailUsuario;
    // $this->strPassword;
    // $this->strRolUsuario;
    // $this->strStatusUsuario;

    
    public function insertUsuario(
        string $identificacion,
        string $nombres,
        string $apellidos,
        string $telefono,
        string $email,
        string $password,
        string $rol,
        string $status
    ) {
        $this->strIdentificacionUsuario = $identificacion;
        $this->strNombresUsuario = $nombres;
        $this->strApellidosUsuario = $apellidos;
        $this->strTelefonoUsuario = $telefono;
        $this->strEmailUsuario = $email;
        $this->strPassword = $password;
        $this->strRolUsuario = $rol;
        $this->strStatusUsuario = $status;

        $return = 0;
        $sql = "SELECT * FROM tbl_usuarios WHERE
				identificacion = '{$this->strIdentificacionUsuario}'";
        $request = $this->select_all($sql);

        if (empty($request)) {

            // $rs = 1;
            $query_insert = "INSERT INTO tbl_usuarios(identificacion,nombres,apellidos,telefono,email,password,rolid,status)
            VALUES(?,?,?,?,?,?,?,?)";

            $arrData = array(
                $this->strIdentificacionUsuario,
                $this->strNombresUsuario,
                $this->strApellidosUsuario,
                $this->strTelefonoUsuario,
                $this->strEmailUsuario,
                $this->strPassword,
                $this->strRolUsuario,
                $this->strStatusUsuario
            );

            $request_insert = $this->insert($query_insert, $arrData);
            $return = $request_insert;
        } else {
            $return = "exist";
        }
        return $return;
    }

    // LISTADO DE LA TABLA
    public function selectUsuarios()
    {
        $whereAdmin = "";
        if($_SESSION['idUser'] != 1 ){
            $whereAdmin = " and p.ideusuario != 1 ";
        }
        
        $sql = "SELECT u.ideusuario,u.identificacion,u.nombres,u.apellidos,u.telefono,u.email,u.rolid,u.status,r.idrol,r.nombrerol 
                FROM tbl_usuarios u 
                INNER JOIN rol r
                ON u.rolid = r.idrol ".$whereAdmin;                
                // WHERE u.status != 0 ".$whereAdmin;
                $request = $this->select_all($sql);
                return $request;
    }

    public function selectUsuario(int $ideusuario){
        $this->intIdeUsuario = $ideusuario;
        $sql = "SELECT u.ideusuario,u.identificacion,u.nombres,u.apellidos,u.telefono,u.email,u.rolid,u.status,r.idrol,r.nombrerol 
                FROM tbl_usuarios u
                INNER JOIN rol r
                ON u.rolid = r.idrol
                WHERE u.ideusuario = $this->intIdeUsuario";
        $request = $this->select($sql);
        return $request;
    }

    //ACTUALIZAR USUARIO
    public function updateUsuario(
        int $ideusuario,
        string $identificacion,
        string $nombres,
        string $apellidos,
        string $telefono,
        string $email,
        string $rol,
        int $status,
        string $password
    ) {

        $this->intIdeUsuario = $ideusuario;
        $this->strIdentificacionUsuario = $identificacion;
        $this->strNombresUsuario = $nombres;
        $this->strApellidosUsuario = $apellidos;
        $this->strTelefonoUsuario = $telefono;
        $this->strEmailUsuario = $email;
        $this->strRolUsuario = $rol;
        $this->intStatus = $status;
        $this->$strPassword= $password;

        $sql = "SELECT * FROM tbl_usuarios WHERE (identificacion = '{$this->strIdentificacionUsuario}' AND ideusuario = $this->intIdeUsuario)
        OR (rolid = '{$this->strRolUsuario}' AND ideusuario = $this->intIdeUsuario)";
        $request != $this->select_all($sql);

        if (empty($request)) {
            // TODO PENDIENTE LA VALIDACIÓN SI EL CODIGO ES IGUAL QUE EL CODIGO DE OTRO USUARIO
            if (($this->strIdentificacionUsuario != "" OR $this->strIdentificacionUsuario !=  $this->strIdentificacionUsuario)) {

                $sql = "UPDATE tbl_usuarios SET identificacion=?, nombres=?, apellidos=?, telefono=?, email=?, rolid=?, status=?
						WHERE ideusuario = $this->intIdeUsuario ";

                $arrData = array(
                    $this->strIdentificacionUsuario,
                    $this->strNombresUsuario,
                    $this->strApellidosUsuario,
                    $this->strTelefonoUsuario,
                    $this->strEmailUsuario,
                    $this->strRolUsuario,
                    $this->intStatus
                );
            } 
            $request = $this->update($sql, $arrData);
        } else {
            $request = "exist";
        }
        return $request;
    }

    public function deleteUsuario(int $intIdeUsuario)
    {
        $this->intIdeUsuario = $intIdeUsuario;
        $sql = "UPDATE tbl_usuarios SET status = ? WHERE ideusuario = $this->intIdeUsuario ";
        $arrData = array(0);
        $request = $this->update($sql, $arrData);
        return $request;
    }

}