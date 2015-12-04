<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Contador extends CI_Model 
{
 
    function visitas()
    {
 
        // Pregunto si la variable counte existe
        if (!isset($_COOKIE['counte'])) 
        {
 
            // $dtz = new DateTimeZone("America/Lima"); //Your timezone
            // $currentv = new DateTime('NOW');
            // $currentv = $currentv->format('Y-m-d H:i:s'); // had to format this  
 
            $dtz = new DateTimeZone("America/Argentina/Buenos_Aires"); //Your timezone
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d H:i:s");                   
            
            // Los campos a registrar
            $this->fecha = $currentv;
            $this->direccionip   = $_SERVER['REMOTE_ADDR']; // direccionip
            $this->direccionip4  = ip2long($_SERVER['REMOTE_ADDR']); // direccionip4
 
            $this->db->insert('visitas', $this);
 
        }
 
        setcookie('counte', 1, time()+3700);
 
        // Realizo una query a la la tabla visitas
        $consulta = $this->db->query('SELECT count(*) as visitas FROM visitas');            
        $res      = $consulta->row();  // retorna los resultados de la tabla visitas
 
        return $res;
 
    }
 
}
 