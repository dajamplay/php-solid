<?php

// Принцип разделения интерфейса
// interface segregation principle
// много интерфейсов, специально предназначенных для клиентов,
// лучше, чем один интерфейс общего назначения
// большие итерфейсы нужно разбивать на маленькие

// Разбиваем интерфейс на 3
interface  ISuperTransformer {
    public function toCar();
    public function toPlane();
    public function toShip();
}

interface  ICarTransformer {
    public function toCar();
}

interface  IPlaneTransformer {
    public function toShip();
}

interface  IShipTransformer {
    public function toShip();
}

class SuperTransformer implements
    ICarTransformer,
    IPlaneTransformer,
    IShipTransformer {

    public function toCar()
    {
        echo 'transform to car';
    }

    public function toPlane()
    {
        echo 'transform to plane';
    }

    public function toShip()
    {
        echo 'transform to ship';
    }
}

class CarTransformer implements ICarTransformer {

    public function toCar()
    {
        echo 'transform to car';
    }

}