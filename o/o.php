<?php

// Принцип открытости/закрытости
// open–closed principle
// Классы должны быть открыты для расширения
// и закрыты для изменения

class Product {

    private Logger $logger;

    public function __construct(Logger $logger)
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

class Logger {

    public function log($message) {
        //...
        $this->saveToFile($message);
    }

    private function saveToFile($message) {
        echo $message;
    }

}
$logger = new Logger();

$product = new Product($logger);

$product->setPrice(100);
