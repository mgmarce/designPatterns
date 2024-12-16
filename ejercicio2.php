<?php

interface Archivo {
    public function abrir(): string;
}

class ArchivoWindows7 implements Archivo {
    private string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function abrir(): string {
        return "Abriendo archivo '$this->nombre' en formato Windows 7.";
    }
}

class ArchivoWindows10 {
    private string $nombre;

    public function __construct(string $nombre) {
        $this->nombre = $nombre;
    }

    public function abrirWindows10(): string {
        return "Abriendo archivo '$this->nombre' en formato Windows 10.";
    }
}

class AdaptadorWindows10 implements Archivo {
    private ArchivoWindows10 $archivoWindows10;

    public function __construct(ArchivoWindows10 $archivoWindows10) {
        $this->archivoWindows10 = $archivoWindows10;
    }

    public function abrir(): string {
        return $this->archivoWindows10->abrirWindows10();
    }
}

// Ejemplo de uso del programa
try {
    $archivoWin7 = new ArchivoWindows7("DocumentoWord.docx");
    echo $archivoWin7->abrir() . "<br>";

    $archivoWin10 = new ArchivoWindows10("PresentacionPowerPoint.pptx");
    $adaptador = new AdaptadorWindows10($archivoWin10);
    echo $adaptador->abrir() . "<br>";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
