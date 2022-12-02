<h1 class="nombre-pagina">Panel de Administración</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos.</p>

<?php include_once __DIR__.'/../templates/barra.php'; ?>

<h2>Buscar Citas</h2>
<div class="busqueda">
    <form class="formulario">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
        </div>
    </form>
</div>

<?php
    if (count($citas) === 0) {
        echo "<h2>No hay citas en esta fecha</h2>";
    }
?>

<div class="citas-admin">
    <ul class="citas">
        <?php 
        $idCita = 0;
        foreach ($citas as $key => $cita){ 
            if ($idCita !== $cita->id) { 
                $total = 0;
        ?>
            <li>
                <p>ID: <span><?php echo $cita->id; ?></span></p>
                <p>Hora: <span><?php echo $cita->hora; ?></span></p>
                <p>Cliente: <span><?php echo $cita->cliente; ?></span></p>
                <p>Email: <span><?php echo $cita->email; ?></span></p>
                <p>Telefono: <span><?php echo $cita->telefono; ?></span></p>
                <h3>Servicios</h3>
        <?php 
            $idCita = $cita->id; 
            } // Fin de IF 

            $total += $cita->precio;
        ?>  
                <p class="servicio"><?php echo $cita->servicio." -  $".number_format($cita->precio,0, ',', '.'); ?></p>
            
        <?php
            $actual = $cita->id;
            $proximo = $citas[$key + 1]->id ?? 0;

            if (esUltimo($actual, $proximo)) {
        ?>
                <p class="total">Total: <span>$ <?php echo number_format($total,0, ',', '.'); ?></span></p>

            <?php
                if ($cita->estado === "0") {
            ?>

                <div class="acciones">
                    <form action="/api/actualizar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" class="boton" value="Completar Servicio">
                    </form>
                    <form action="/api/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo $cita->id; ?>">
                        <input type="submit" class="boton-eliminar" value="Eliminar">
                    </form>
                </div>
            <?php
                } else {
            ?>   
                <div class="acciones">
                    <h3 class="alerta exito">Servicio Completado</h3>
                </div> 
        <?php
                }
            }
        } // Fin de Foreach 
        ?>
            </li>
    </ul>
</div>

<?php 
    $script = "<script src='build/js/buscador.js'></script>";
?>