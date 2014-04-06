<?php
namespace ObserverPattern
{
    use SplObserver;

    abstract class MySubject implements \SplSubject
    {
        /**
         * Keeps record of all registered Observers
         *
         * @var array
         */
        private $_observers = [];

        /**
         * Adds a new observer to the observer list
         *
         * @param SplObserver $observer
         */
        public function attach(SplObserver $observer)
        {
            $this->_observers[spl_object_hash($observer)] = $observer;
        }

        /**
         * Removes a listener from the observer list
         *
         * @param SplObserver $observer
         */
        public function detach(SplObserver $observer)
        {
            $id = spl_object_hash($observer);
            if(isset($this->_observers[$id])) {
                unset($this->_observers[$id]);
            }
        }

        /**
         * Broadcast a event to all observers currently attached to the observer list.
         *
         * @param null|mixed $data
         */
        public function notify($data=null)
        {
            /** @var $observer MyObserver */
            foreach($this->_observers as $observer){
                // with injection $this to the observer, the observer has access to the object which invoked the event.
                $observer->update($this, $data);
            }
        }
    }
}