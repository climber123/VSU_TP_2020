<?php


    interface IStatistics
    {
        /**
         * @param $userID
         * @return mixed
         */
        public function GetCategories($userID);

        /**
         * @param $userID
         * @return mixed
         */
        public function GetAllOperations($userID);

        /**
         * @param $categoryID
         * @return mixed
         */
        public function GetOperationsByCategory($categoryID);

        /**
         * @param $categoryID
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetOperationsFromDatetimeInterval($categoryID, $endDatetime, $datetimeInterval);

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