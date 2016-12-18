<?php
header('Content-Type: text/html; charset=utf-8');
class clsSession extends clsAscend
{
    public $objAscend;

    public function __construct()
    {
        $this -> objAscend = new clsAscend();
        
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
        $sqlSession = "SELECT strData FROM tblSession WHERE strId = '$session_id' ";

        $resultado = $this->objAscend->dbQuery($sqlSession);

        if (count($resultado) > 0)
        {
            return $resultado[0]["strData"];
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

        $sessionExists = $this->objAscend->dbQuery("SELECT COUNT(strId) as SESIONEXISTS from tblSession WHERE strId = '$id'");
        echo "1<br>";
        $this->objAscend->printArray($sessionExists);

        settype($id, 'string');
        settype($sess_data, 'string');

        if ($sessionExists[0]['SESIONEXISTS'] < 1)
        {
            $insertSession = "INSERT INTO tblSession(strId, strLifetime, strData) VALUES ('$id',$lifeTime,'$sess_data');";
            echo $insertSession;
            $resultado = $this->objAscend->dbInsert($insertSession);
            echo "a<br>";
            $this->objAscend->printArray($resultado);
            echo "b<br>";
        }
        else
        {
            $insertSession = "UPDATE tblSession SET strData = '$sess_data', strLifetime =$lifeTime WHERE strId = '$id'";
            echo $insertSession;
            $resultado = $this->objAscend->dbUpdate($insertSession);
            $this->objAscend->printArray($resultado);
        }
        $this->objAscend->printArray($resultado);
        // echo $insertSession;


        // core_utils::printArray($resultado);

        return $resultado;
    }

    public function borrar($id) {

        $delete = $this->objAscend->dbDelete("DELETE FROM tblSession WHERE strId = '$id'");
        return $delete;
    }

    public function gc($maxlifetime = 1800)
    {
        $limiteTiempo = time() - $maxlifetime;
        $eliminar = $this->objAscend->dbDelete("DELETE FROM tblSession where strLifetime < $limiteTiempo");
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