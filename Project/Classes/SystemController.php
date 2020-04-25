<?php


    class SystemController implements ISystem
    {
        private $CategoryController;
        private $OperationController;
        private $LogOutController;


        /**
         * SystemController constructor.
         */
        public function __construct() {

        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }


        public function AddCategory($user, $name)
        {
            // TODO: Implement AddCategory() method.
        }

        /**
         * @inheritDoc
         */
        public function ChangeCategory($operationID, $newName)
        {
            // TODO: Implement ChangeCategory() method.
        }

        /**
         * @inheritDoc
         */
        public function RemoveCategory($operationID)
        {
            // TODO: Implement RemoveCategory() method.
        }

        public function AddExpense($value, $categoryID)
        {
            // TODO: Implement AddExpense() method.
        }

        /**
         * @inheritDoc
         */
        public function ChangeOperation($operationID, $newValue)
        {
            // TODO: Implement ChangeOperation() method.
        }

        /**
         * @inheritDoc
         */
        public function DeleteOperation($operationID)
        {
            // TODO: Implement DeleteOperation() method.
        }

        /**
         * @inheritDoc
         */
        public function LogOut($userID)
        {
            // TODO: Implement LogOut() method.
        }

        /**
         * @inheritDoc
         */
        public function GetCategories($userID)
        {
            // TODO: Implement GetCategories() method.
        }

        /**
         * @inheritDoc
         */
        public function GetAllOperations($userID)
        {
            // TODO: Implement GetAllOperations() method.
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsByCategory($categoryID)
        {
            // TODO: Implement GetOperationsByCategory() method.
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsFromDatetimeInterval($categoryID, $endDatetime, $datetimeInterval)
        {
            // TODO: Implement GetOperationsFromDatetimeInterval() method.
        }

        /**
         * @inheritDoc
         */
        public function GetAmountExpenses($endDatetime, $datetimeInterval)
        {
            // TODO: Implement GetAmountExpenses() method.
        }

        /**
         * @inheritDoc
         */
        public function GetAverageExpense($endDatetime, $datetimeInterval)
        {
            // TODO: Implement GetAverageExpense() method.
        }
    }