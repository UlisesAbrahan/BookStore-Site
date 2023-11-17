<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function inicio()
    {
        $data['titulo']='Inicio';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/principal2.php");
        echo view("templates/piePagina.php");

      
    }

    public function verFactura()
    {
        $data['titulo']='Inicio';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/verFactura.php");
        echo view("templates/piePagina.php");

      
    }

 

    public function quienesSomos()
    {
        $data['titulo']='Quienes Somos';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/quienesSomos.php");
        echo view("templates/piePagina.php");
    }

    public function comercializacion()
    {
        $data['titulo']='Comercializacion';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/comercializacion.php");
        echo view("templates/piePagina.php");
    }

    public function terminosUsos()
    {
        $data['titulo']='Terminos y Usos';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/terminosUsos.php");
        echo view("templates/piePagina.php");
    }
    
  

    public function contacto()
    {
        $data['titulo']='Consultas';

        echo view("templates/head.php",$data);
        echo view("templates/menu.php");
        echo view("plantillas/contacto.php");
        echo view("templates/piePagina.php");
    }

    public function administrador()
    {
        $data['titulo']='Menu administrador';

        echo view("templates/head.php",$data);
        echo view("templates/menuAdmin.php");
        echo view("plantillas/principal2.php");
        echo view("templates/piePagina.php");
    }
    

  


  
   
  
    
    
    
    

 /*  public function index()
    {
        return view('welcome_message');
    }

    public function prueba()
    {
        return view('prueba.php');
    }

    
    public function plantilla ()
    {
    	return view('plantilla.php');
    }
    public function nueva_plantilla ()
    {
        
    	return view('nueva_plantilla.php');
    }

    public function cabecera()
    {
       return view('cabecera.php');
    }

    public function piePagina()
    {
        echo view("plantillas/piePagina.php");
    }
  */
    
   
}
