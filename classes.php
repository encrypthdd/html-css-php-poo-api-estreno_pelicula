<?php

declare(strict_types = 1);
class SuperHero{
   /* public $name;
    public $powers;
    public $planet;
    public $level;*/

   /* public function __construct($name, $powers, $planet){
        $this->name = $name;
        $this->powers = $powers;
        $this->planet = $planet;
        $this->level = 0;
    }*/
    #   promoted properties -> PHP 8.0
    public function __construct(
        private string $name,
        public array $powers,
        public string $planet,
        

    ){}

    public function attack(){
        return "$this->name ataca cons sus poderes";
    }

    public function showAll(){
        return get_object_vars($this);
    }

    public function descriptions(){
        $powers = implode(", ", $this->powers);
        return "$this->name es un super heroe que viene de  $this->planet y tiene los siguientes poderes:
        $powers";
    }

    public static function random(){
        $names = ["Thor", "Spiderman", "Wolverin", "Iroman"];
        $powers = [
            ["Super Fuerza", "Volar", "Rayos Laser"],
            ["Super Fuerza", "Super Agilidad", "Telarñas"],
            ["Regeneracion", "Super Fuerza", "Garras de adamantium"],
            ["Super Fuerza", "Volar", "Rayos Laser"],
            ["Super Fuerza", "Super Agilidad", "Cambio de tamaño"],
        ];
        $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

        $name = $names[array_rand($names)];
        $power = $powers[array_rand($powers)];
        $planet = $planets[array_rand($planets)];

        //echo "El superheroe elegido es $name, que viene de $planet y tiene los siguientes poderes: " . implode(", ", $power);
        return new self($name, $power, $planet);
    }
}

//  metodo publico
#$hero = new SuperHero("Batman",["inteligencia", "fuerza", "tecnología"], "Gotham");
/*$hero->name = "Batman";
$hero->powers = "inteligencia, fuerza y tecnología";
$hero->planet = "Gotham";*/
#echo $hero->descriptions();

//  metodo estatico
//SuperHero::random();
$hero = SuperHero::random();
echo $hero->descriptions();

?>