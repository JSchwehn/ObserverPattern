<?php
namespace ObserverPattern
{
    class UserRegister extends MySubject
    {
        private $_config = array();
        public $userName = "";
        public $email = "";

        public function __construct(array $config=array())
        {
            $this->_config = array_merge($this->_config, $config);
            $this->loadObservers();
        }

        /**
         * Logic to get observers, eg. load observers in a directory
         * For demonstration purposes I'll just do it hard coded.
         */
        private function loadObservers()
        {
            $this->attach(new Logger());
        }

        /**
         * A fake registration form
         */
        public function showRegisterForm()
        {
            echo " - Displaying a great registration form\n";
        }

        /**
         * In a production environment you should take a bit more care when it comes to
         * data sanitation and validation.
         */
        public function processRegisterForm($userName, $email)
        {
            $safeUserName = filter_var($userName, FILTER_SANITIZE_STRING);
            $safeEmail    = filter_var($email, FILTER_SANITIZE_EMAIL);
            if(!filter_var($safeEmail, FILTER_VALIDATE_EMAIL)) {
                $this->notify(array(
                        'level'=>'WARNING',
                        'message'=>'Customer '.$safeUserName.' was not created because an invalid email has been provided.'));
                throw new \Exception('Invalid email address');
            }
            echo " - Created User\n";
            $this->userName = $safeEmail;
            $this->email    = $safeEmail;
            $this->notify(array(
                    'level'=>'TEST',
                    'message'=>'Customer '.$safeUserName.' with email '.$safeEmail.' has been created'));
        }
        public function deleteUser()
        {
            echo " - Deleted User\n";
            $this->notify(array('level'=>'NOTICE',
                    'message'=>'Customer '.$this->userName.' with email '.$this->email.' has been deleted'));
        }

        public function updateUser()
        {
            echo " - Updated User\n";
            $this->notify(array('level'=>'NOTICE',
                    'message'=>'Customer '.$this->userName.' with email '.$this->email.' has been updated'));
        }
    }
}