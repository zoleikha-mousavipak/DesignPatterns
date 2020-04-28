<?php

// Base Component
interface Pizza
{
    public function getDesc(): String;
}

// Concrete Component
class Margarita implements Pizza
{
    public function getDesc(): String
    {
        return "Margarita ";
    }
}

class VeggieParadise implements Pizza
{
    public function getDesc(): String
    {
        return "Veggie Paradise ";
    }
}

// Base Decorator
class PizzaToppings implements Pizza
{
    protected $pizza;
    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }

    public function getDesc(): String
    {
        return $this->pizza->getDesc();
    }
}

// Concrete Decorators
class ExtraCheese extends PizzaToppings {
    public function getDesc(): String
    {
        return Parent::getDesc() . "Extra Cheese ";
    }
}

class Jalapeno extends PizzaToppings {
    public function getDesc(): String
    {
        return Parent::getDesc() . "Jalapeno ";
    }
}

// Client code
function makePizza(Pizza $pizza){
    echo "Your order: " . $pizza->getDesc();
}

// Business Logic to create a pizza
$pizza = new Margarita();
$pizza = new ExtraCheese($pizza);
$pizza = new Jalapeno($pizza);

makePizza($pizza);