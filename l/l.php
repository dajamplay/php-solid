<?php

// Принцип подстановки Барбары Лисков
// Liskov substitution principle (L, LSP)
// Производный класс должен быть взаимозаменяем с родительским классом
// Наследники не противоречат базовому классу

class Bird {
    public function fly() {
        $flySpeed = 10;
        return $flySpeed;
    }
}

class Duck extends Bird {
    public function fly() {
        $flySpeed = 8;
        return $flySpeed;
    }

    public function swim() {
        $swimSpeed = 2;
        return $swimSpeed;
    }
}

class Pinguin extends Bird {
    public function fly() {
        return 'not fly =(((';
    }

    public function swim() {
        $swimSpeed = 4;
        return $swimSpeed;
    }
}

class BirdRun {

    private $bird;

    public function __construct(Bird $bird)
    {
        $this->bird = $bird;
    }

    public function run() {
        $flySpeed = $this->bird->fly();
        echo $flySpeed;
    }
}

//$bird = new Bird();
//$bird = new Duck();

//разные типы данных у методов !!!
$bird = new Pinguin();

$birdRun = new BirdRun($bird);
$birdRun->run();