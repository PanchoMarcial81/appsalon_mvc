<?php 

namespace Model;

class AdminCita extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'citasservicios';
    protected static $columnasDB = ['id', 'hora', 'estado', 'cliente', 'email', 'telefono', 'servicio', 'precio'];

    public $id;
    public $hora;
    public $estado;
    public $cliente;
    public $email;
    public $telefono;
    public $servicio;
    public $precio;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->hora = $args['hora'] ?? '';
        $this->estado = $args['hora'] ?? 0;
        $this->cliente = $args['cliente'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->servicio = $args['servicio'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

}