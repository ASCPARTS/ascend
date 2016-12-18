<?php
header('Content-Type: text/html; charset=utf-8');
class clsSession extends clsAscend
{
    private $objAscend;

    public function __construct()
    {
        session_set_save_handler
        (
            array(&$this, 'abrir'),
            array(&$this, 'cerrar'),
            array(&$this, 'leerSesion'),
            array(&$this, 'escribirSesion'),
            array(&$this, 'borrar'),
            array(&$this, 'gc')
        );
        //register_shutdown_function('session_write_close');
        session_start();
        $this -> objAscend = new clsAscend();
    }


    public function abrir($save_path, $session_name) {


        return true;
    }

    public function cerrar() {
        session_write_close();
        return true;
    }

    public function leerSesion($session_id)
    {
        $sqlSession = "SELECT strData FROM tblSesion WHERE intId = '$session_id' ";
        $resultado = $this->bd->query($sqlSession);

        if ($resultado["total"] > 0)
        {
            return $resultado["registros"][0]["strData"];
        }
        else
        {
            return true;
        }

    }

    public function escribirSesion($id, $sess_data) {

        $lifeTime = time();
        $insertSession = '';
        $resultado = '';

        $sessionExists = $this->bd->query("SELECT COUNT(intId) as SESIONEXISTS from tblSesion WHERE intId = '$id'");

        settype($id, 'string');
        settype($sess_data, 'string');

        if ($sessionExists["registros"][0]['SESIONEXISTS'] < 1)
        {
            $insertSession = "INSERT INTO tblSesion(strId, strLifetime, strData) VALUES ('$id',$lifeTime,'$sess_data');";
        }
        else
        {
            $insertSession = "UPDATE tblSesion SET strData = '$sess_data', strLifetime =$lifeTime WHERE intId = '$id'";
        }
        // echo $insertSession;

        $resultado = $this->bd->execute($insertSession);
        // core_utils::printArray($resultado);

        return $resultado;
    }

    public function borrar($id) {

        $delete = $this->bd->execute("DELETE FROM tblSesion WHERE intId = '$id'");
        return $delete;
    }

    public function gc($maxlifetime = 1800)
    {
        $limiteTiempo = time() - $maxlifetime;
        $eliminar = $this->bd->execute("DELETE FROM tblSesion where strLifetime < $limiteTiempo");
        return true;
    }

    public function setvar($variable, $valor) {
        $_SESSION[$variable] = serialize($valor);
        $this->update_session_vars();
    }

    public function unsetvar($variable) {
        unset($_SESSION[$variable]);
        $this->update_session_vars();
    }

    public function getvar($variable) {
        if (isset($_SESSION[$variable])) {
            return unserialize($_SESSION[$variable]);
        } else {
            return false;
        }
    }

    public function existsvar($variable) {
        if (isset($_SESSION[$variable])) {
            return true;
        } else {
            return false;
        }
    }

    public function update_session_vars() {
        foreach (array_keys($_SESSION) as $variableSesionActual) {

            $_SESSION[$variableSesionActual] = $_SESSION[$variableSesionActual];
        }
    }

}

?>