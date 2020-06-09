<?php


    interface IStatistics
    {
        /**
         * @param $userID
         * @return mixed
         */
        //public function GetCategories($userID);

        public function GetCategories($user_id, $startDateTime, $endDatetime);

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
        public function GetOperationsFromDatetimeIntervalByCategory($categoryID, $endDatetime, $datetimeInterval);

        public function GetOperationsFromDatetimeInterval($user_id,$endDatetime, $datetimeInterval);


        /**
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetAmountExpenses($user_id,$endDatetime, $datetimeInterval);

        /**
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         * @return mixed
         */
        public function GetAverageExpense($user_id,$endDatetime, $datetimeInterval);

    }