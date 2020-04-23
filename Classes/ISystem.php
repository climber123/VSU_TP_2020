<?php


    interface ISystem extends ILogOut
    {
        public function __destruct();
        public function GetCategories();
        public function GetAllOperations();

        /**
         * @param integer $operationID
         * @return mixed
         */
        public function GetOperationsByCategory($operationID);

        /**
         * @param integer $operationID
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetOperationsFromDatetimeInterval($operationID, $endDatetime, $datetimeInterval);

        /**
         * @param string $name
         * @return mixed
         */
        public function AddCategory($name);

        /**
         * @param integer $operationID
         * @param string $newName
         * @return mixed
         */
        public function ChangeCategory($operationID, $newName);

        /**
         * @param integer $operationID
         * @return mixed
         */
        public function RemoveCategory($operationID);

        /**
         * @param integer $value
         * @param integer $categoryID
         * @return mixed
         */
        public function AddExpense($value, $categoryID);

        /**
         * @param integer $operationID
         * @param integer $newValue
         * @return mixed
         */
        public function ChangeOperation($operationID, $newValue);

        /**
         * @param integer $operationID
         * @return mixed
         */
        public function DeleteOperation($operationID);

        /**
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetAmountExpenses($endDatetime, $datetimeInterval);

        /**
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetAverageExpense($endDatetime, $datetimeInterval);

    }