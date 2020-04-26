<?php


    class LogOutController
    {
        private $userID;

        /**
         * LogOutController constructor.
         * @param integer$userID
         */
        public function __construct($userID) {
            $this->userID = $userID;
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

    }