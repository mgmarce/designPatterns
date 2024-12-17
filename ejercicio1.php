<?php

interface Personaje {
    public function atacar(): string;
    public function getVelocidad(): int;
}

class Esqueleto implements Personaje {
    public function atacar(): string {
        return "El Esqueleto pega puño";
    }

    public function getVelocidad(): int {
        return 2;
    }
}

class Zombi implements Personaje {
    public function atacar(): string {
        return "El Zombi ataca con piedras";
    }

    public function getVelocidad(): int {
        return 7;
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

// Ejemplo de uso del programa
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
