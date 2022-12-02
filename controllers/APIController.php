<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController{
    public static function index(){

        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar(){
        
        // Almacena la cita y devuelve la ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        // Alamcena los servicios con el ID de la CIta
        $idServicios = explode(",", $_POST['servicios']);

        foreach ($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];

            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        // Retornamos una respuesta
        // $respuesta = [
        //     'resultado' => $resultado
        // ];

        echo json_encode(['resultado' => $resultado]);
    }

    public static function actualizar(){
        
        $id = $_POST['id'];

        $cita = Cita::find($id);

        $cita->estado = 1;

        $cita->guardar();

        header('Location:'.$_SERVER['HTTP_REFERER']);

    }

    public static function eliminar(){
        $id = $_POST['id'];
        $cita = Cita::find($id);
        $cita->eliminar();
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }

}