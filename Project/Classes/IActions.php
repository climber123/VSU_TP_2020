<?php


    interface IActions
    {
        public function AddCategory($user, $name);

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
        public function AddExpense($value, $categoryID, $date_time);

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

    }