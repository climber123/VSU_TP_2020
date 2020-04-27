<?php


    class OperationController
    {
        private $operationDAO;


        public function __construct() {

        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        /**
         * @param integer $value
         * @param integer $categoryID
         * @param datetime $datetime
         */
        public function AddOperation($value, $categoryID, $datetime){}

        /**
         * @param integer $operationID
         * @param integer $newValue
         */
        public function ChangeOperation($operationID, $newValue){}

        /**
         * @param integer $operationID
         */
        public function DeleteOperation($operationID){}

        /**
         * @param integer $userID
         */
        public function GetOperations($userID){}

        /**
         * @param integer $categoryID
         */
        public function GetOperationsByCategory($categoryID){}

        /**
         * @param datetime $categoryID
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         */
        public function GetOperationFromDatetimeInterval($categoryID, $endDatetime, $datetimeInterval){}



    }