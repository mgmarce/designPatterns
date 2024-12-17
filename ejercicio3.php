<?php

interface Character {
    public function getDescription();
    public function getPower();
}

class Vampire implements Character {
    public function getDescription() {
        return "Misterioso vampiro de ojos cafes, elegante y atractivo de 140 años";
    }

    public function getPower() {
        return 62; 
    }
}

class Ghost implements Character {
    public function getDescription() {
        return "Valiente fantasma, agresivo y sin miedo a nada, pero a veces es tímido";
    }

    public function getPower() {
        return 45;
    }
}

class Zombie implements Character {
    public function getDescription() {
        return "Zombie con ataques rapidos, es agresivo, solo actua sin pensar. Pero le gustaría que los demás sepan que le gustan los gatitos y el kpop";
    }

    public function getPower() {
        return 70;
    }
}

abstract class WeaponDecorator implements Character {
    protected $character;

    public function __construct(Character $character) {
        $this->character = $character;
    }

    public function getDescription() {
        return $this->character->getDescription();
    }

    public function getPower() {
        return $this->character->getPower();
    }
}

class Claws extends WeaponDecorator {
    public function getDescription() {
        return parent::getDescription() . " con garras afiladas";
    }

    public function getPower() {
        return parent::getPower() + 25; // Power boost
    }
}

class Sword extends WeaponDecorator {
    public function getDescription() {
        return parent::getDescription() . " empuñando una espada oscura";
    }

    public function getPower() {
        return parent::getPower() + 30; // Power boost
    }
}

class PhantomAura extends WeaponDecorator {
    public function getDescription() {
        return parent::getDescription() . " rodeado de un aura fantasmagórica";
    }

    public function getPower() {
        return parent::getPower() + 20; // Power boost
    }
}

// 5. Program Execution
// Create base characters
$vampire = new Vampire();
$ghost = new Ghost();
$zombie = new Zombie();

// Decorate characters with weapons/habilities
$vampireWithClaws = new Claws($vampire);
$ghostWithAura = new PhantomAura($ghost);
$zombieWithSword = new Sword($zombie);

$zombieWithClawsAndSword = new Claws($zombieWithSword);

echo $vampireWithClaws->getDescription() . " - Poder: " . $vampireWithClaws->getPower() . "<br>";
echo $ghostWithAura->getDescription() . " - Poder: " . $ghostWithAura->getPower() .  "<br>";
echo $zombieWithSword->getDescription() . " - Poder: " . $zombieWithSword->getPower() .  "<br>";
echo $zombieWithClawsAndSword->getDescription() . " - Poder: " . $zombieWithClawsAndSword->getPower() .  "<br>";

?>
