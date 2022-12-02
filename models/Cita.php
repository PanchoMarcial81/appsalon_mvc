<?php

namespace Model;

class Cita extends ActiveRecord{
    // Base de datos
    protected static $tabla = 'citas';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'estado', 'usuarioId'];

    public $id;
    public $fecha;
    public $hora;
    public $estado;
    public $usuarioId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->estado = 0;
        $this->usuarioId = $args['usuarioId'] ?? '';
    }
}