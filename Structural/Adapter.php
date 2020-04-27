<?php

// Target/Client
interface Share
{

    // Request
    public function shareData();
}

// Adapter/Service
class WhatsAppShare
{

    // Special Request
    public function waShare(String $string)
    {
        echo "Share data via WhatsApp: '$string' \n";
    }
}

// Adapter 
class WhatsAppShareAdapter implements Share
{

    private $whatsapp;
    private $data;

    public function __construct(WhatsAppShare $whatsapp, String $data)
    {
        $this->whatsapp = $whatsapp;
        $this->data = $data;
    }

    public function shareData()
    {
        $this->whatsapp->waShare($this->data);
    }
}

function clientCode(Share $share)
{
    $share->shareData();
}

// Business logic to use client code
$wa = new WhatsAppShare();
$waShare = new WhatsAppShareAdapter($wa, "Hello WhatsApp");
clientCode($waShare);
