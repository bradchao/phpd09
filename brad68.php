<?php
    abstract class Product {
        protected $name;
        protected $price;

        public function __construct($name, $price){
            $this->name = $name;
            $this->price = $price;
        }

        public function getName(){return $this->name;}
        public function getPrice(){return $this->price;}
        abstract public function getDetails();
    }

    class Book extends Product {
        private $author;

        public function __construct($name, $price, $author){
            $this->name = $name;
            $this->price = $price;
            $this->author = $author;
        }

        public function getAuthor(){return $this->author;}

        public function getDetails(){
            return "Name:{$this->name};Price:{$this->price};Author:{$this->author}";}
    }


?>