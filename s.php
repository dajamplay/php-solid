<?php

//Принцип единственной ответственности
//Single Responsibility Principle
//Одна ось изменений, меняться по одной причине

// не правильно, класс Product не должен выполнять логирование
// логирование нужно вынести в отдельный класс
//class Product {
//
//    public function setPrice($price)
//    {
//        try {
//            // save price in db
//        } catch (\Exception $e) {
//            $this->logError($e->getMessage());
//        }
//    }
//
//    public function logError($error) {
//        // save error message
//    }
//
//}

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

$product = new Product($product);

$product->setPrice(100);

