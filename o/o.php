<?php

// Принцип открытости/закрытости
// open–closed principle
// Классы должны быть открыты для расширения
// и закрыты для изменения

class Product {

    private ILogger $logger;

    public function __construct(ILogger $logger)
    {
        $this->logger = $logger;
    }

    public function setPrice($price)
    {
        try {
            // save price in db
        } catch (\Exception $e) {
            $this->logger->log($e->getMessage());
        }
    }

}

class FileLogger implements ILogger {

    private function saveToFile($message) {
        //...
    }

    public function log($message) {
        $this->saveToFile($message);
    }

}

class DBLogger implements ILogger {

    private function saveToDB($message) {
        //...
    }

    public function log($message) {
        $this->saveToDB($message);
    }

}

interface ILogger {
    public function log($message);
}

$logger = new DBLogger();

$product = new Product($logger);

$product->setPrice(100);
