<?php

interface EstrategiaMostrarMensaje {
    public function mostrar($mensaje);
}

class EstrategiaConsola implements EstrategiaMostrarMensaje {
    public function mostrar($mensaje) {
        echo "Mensaje en consola: $mensaje<br>";
    }
}

class EstrategiaJSON implements EstrategiaMostrarMensaje {
    public function mostrar($mensaje) {
        echo json_encode(['mensaje' => $mensaje]) . "<br>";
    }
}

class EstrategiaTXT implements EstrategiaMostrarMensaje {
    public function mostrar($mensaje) {
        $archivo = fopen("mensaje.txt", "a");
        fwrite($archivo, "Mensaje en archivo: $mensaje\n");
        fclose($archivo);
        echo "Mensaje guardado en mensaje.txt";
    }
}

class Contexto {
    private $estrategia;

    public function __construct(EstrategiaMostrarMensaje $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

$mensaje = "Este es un mensaje de prueba";

$contextoConsola = new Contexto(new EstrategiaConsola());
$contextoConsola->mostrarMensaje($mensaje);

$contextoJSON = new Contexto(new EstrategiaJSON());
$contextoJSON->mostrarMensaje($mensaje);

$contextoTXT = new Contexto(new EstrategiaTXT());
$contextoTXT->mostrarMensaje($mensaje);

?>
