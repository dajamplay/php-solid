<?php

// Принцип инверсии зависимостей
// dependency inversion principle
// Зависимость на Абстракциях. Нет зависимости на что-то конкретное

// Зависимости строятся на абстракциях, а не на классах

class LowRankingMale {
    public function eat() {
        $wife = new Wife();
        $food = $wife->getFood();
    }
}

class AverageRankingMale {

    private Wife $wife;

    public function __construct(Wife $wife)
    {
        $this->wife = $wife;
    }

    public function eat() {
        $food = $this->wife->getFood();
    }
}

class HighRankingMale {
    private IFoodProvider $foodProvider;

    public function __construct(IFoodProvider $foodProvider)
    {
        $this->foodProvider = $foodProvider;
    }

    public function eat() {
        $food = $this->foodProvider->getFood();
        echo $food;
    }

}

class Wife implements IFoodProvider {

    public function getFood() {
        return 'wife food';
    }

}

class Restaurant implements IFoodProvider {

    public function getFood()
    {
        return 'restaurant food';
    }

}

interface IFoodProvider {

    public function getFood();

}

$food = new Restaurant();

$male = new HighRankingMale($food);

$male->eat();