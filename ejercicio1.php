<?php
interface Personaje {
    public function atacar();
    public function getVelocidad();
}
class Esqueleto implements Personaje {
    public function atacar() {
        return "El Esqueleto pega puño";
    }
    public function getVelocidad() {
        return "Super lenta";
    }
}
class Zombi implements Personaje {
    public function atacar() {
        return "El Zombi ataca con armas";
    }
    public function getVelocidad() {
        return "Super rapida";
    }
}
class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        switch (strtolower($nivel)) {
            case "facil":
                return new Esqueleto();
            case "dificil":
                return new Zombi();
            default:
                throw new Exception("Nivel no soportado: $nivel");
        }
    }
}

try {
    $nivel = "facil";
    $personaje = PersonajeFactory::crearPersonaje($nivel);
    echo "Nivel: $nivel<br>";
    echo $personaje->atacar() . "<br>";
    echo "Velocidad: " . $personaje->getVelocidad() . "<br><br>";
    $nivel = "dificil";
    $personaje = PersonajeFactory::crearPersonaje($nivel);
    echo "Nivel: $nivel<br>";
    echo $personaje->atacar() . "<br>";
    echo "Velocidad: " . $personaje->getVelocidad() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>