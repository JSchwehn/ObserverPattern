<?php

namespace ObserverPattern
{
    use SplSubject;

    abstract class MyObserver implements \SplObserver
    {
        public function update(SplSubject $subject, $data=null)
        {
            print_r($subject);
        }
    }
}