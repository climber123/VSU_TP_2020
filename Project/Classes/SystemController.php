<?php


    class SystemController implements ISystem
    {
        private $userId;
        private $CategoryController;
        private $OperationController;
        private $LogOutController;

        /**
         * SystemController constructor.
         * @param integer $userId
         */
        public function __construct($userId) {
            $this->userId = $userId;
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }


        /**
         * @inheritDoc
         */
        public function LogOut()
        {
            // TODO: Implement LogOut() method.
        }

        public function GetCategories()
        {
            // TODO: Implement GetCategories() method.
        }

        public function GetAllOperations()
        {
            // TODO: Implement GetAllOperations() method.
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsByCategory($operationID)
        {
            // TODO: Implement GetOperationsByCategory() method.
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsFromDatetimeInterval($operationID, $endDatetime, $datetimeInterval)
        {
            // TODO: Implement GetOperationsFromDatetimeInterval() method.
        }

        /**
         * @inheritDoc
         */
        public function AddCategory($name)
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

        /**
         * @inheritDoc
         */
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