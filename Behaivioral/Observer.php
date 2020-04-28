<?php

interface Subscriber
{
    public function update($postId);
}

// Publisher
class HealthyMe
{
    private $subscribers = array();
    private $post;

    public function registerSubscriber(Subscriber $subs)
    {
        $this->subscribers[] = $subs;
        echo "Subscriber Added! \n";
    }
    public function notifySubscribers()
    {
        foreach ($this->subscribers as $subscriber) {
            $subscriber->update($this->post);
        }
    }

    public function publishPost($post)
    {
        $this->post = $post;
        $this->notifySubscribers();
    }
}

// Concrete Subscriber
class FoodUpdateSubscribers implements Subscriber
{

    public function update($postId)
    {
        echo "New post with Id $postId published. \n";
    }
}

$publisher = new HealthyMe();
$subscriber = new FoodUpdateSubscribers();

$publisher->registerSubscriber($subscriber);
$publisher->publishPost(12);
