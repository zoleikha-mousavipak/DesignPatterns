<?php

// The product interface declares the operations for all concrete product
interface Transport
{
    public function ready(): void;
    public function dispatch(): void;
    public function deliver(): void;
}

// Concrete product providing implementations of product interface
class PlainTransport implements Transport
{
    public function ready(): void
    {
        // TODO: implement ready() method.
        echo "Courier ready to be sent to the plane. \n";
    }

    public function dispatch(): void
    {
        // TODO: implement dispatch method.
        echo "Courier is on your way to the plane. \n";
    }

    public function deliver(): void
    {
        // TODO implement deliver method.
        echo "Courier from the plane is delivered to you. \n";
    }
}

// Concrete product providing implementations of product interface
class TrunckTransport implements Transport
{
    public function ready(): void
    {
        // TODO: implement ready() method.
        echo "Courier ready to be sent to the trunck. \n";
    }

    public function dispatch(): void
    {
        // TODO: implement dispatch method.
        echo "Courier is on your way to the trunck. \n";
    }

    public function deliver(): void
    {
        // TODO implement deliver method.
        echo "Courier from the trunck is delivered to you. \n";
    }
}

// The creator class declares the factory method
abstract class Courier
{
    // Factory method
    abstract function getCourierTransport(): Transport;

    public function sendCourier()
    {
        $tranport = $this->getCourierTransport();
        $tranport->ready();
        $tranport->dispatch();
        $tranport->deliver();
    }
}

// The concrete creator override the factory method and change the type of object created
class AirCourier extends Courier
{
    function getCourierTransport(): Transport
    {
        return new PlainTransport();
    }
}

// The concrete creator override the factory method and change the type of object created
class GroundCourier extends Courier
{
    function getCourierTransport(): Transport
    {
        return new TrunckTransport();
    }
}

// The client code works with an instance of concrete creator or subclass
function deliverCourier(Courier $courier)
{
    $courier->sendCourier();
}


// Call
echo "Test Courier \n";
deliverCourier(new GroundCourier);
deliverCourier(new AirCourier);
