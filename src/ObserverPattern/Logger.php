<?php
namespace ObserverPattern {
    class Logger extends MyObserver
    {
        public function __construct(array $config=array())
        {
            // do something
        }

        public function update(\SplSubject $subject, $data=null)
        {
            $level = 'NOTICE';
            if(isset($data['message'])) {
                if(isset($data['level'])) {
                    $level = $data['level'];
                }
                $today = new \DateTime();
                echo "[".$today->format('Y-d-m H:i:s')."] (".$level.") ".$data['message']."\n";
                if('TEST' === $level) {
                    parent::update($subject,$data);
                }
            }
        }
    }
}