<?php

    require_once('ILogout.php');
    require_once('IStatistics.php');
    require_once('IActions.php');
    require_once('ISystem.php');

    require_once('CategoryController.php');
    require_once('OperationController.php');
    require_once('LogoutController.php');



    class SystemController implements ISystem
    {
        private $categoryController;
        private $operationController;
        //private $logOutController;


        /**
         * SystemController constructor.
         */
        public function __construct() {
            $this->categoryController = new CategoryController();
            $this->operationController = new OperationController();
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }


        public function AddCategory($user, $name)
        {
            // TODO: Implement AddCategory() method.
            return $this->categoryController->AddCategory($user, $name);
        }

        public function AddStandartCategories($userID){
            return $this->categoryController->AddStandartCategories($userID);
        }

        /**
         * @inheritDoc
         */
        public function ChangeCategory($categoryID, $newName)
        {
            // TODO: Implement ChangeCategory() method.
            return $this->categoryController->ChangeCategory($categoryID, $newName);
        }

        /**
         * @inheritDoc
         */
        public function RemoveCategory($categoryID)
        {
            // TODO: Implement RemoveCategory() method.
            return $this->categoryController->RemoveCategory($categoryID);
        }

        public function AddExpense($value, $categoryID, $date_time)
        {
            // TODO: Implement AddExpense() method.
            return $this->operationController->AddOperation($value, $categoryID, $date_time);
        }

        /**
         * @inheritDoc
         */
        public function ChangeOperation($operationID, $newValue)
        {
            // TODO: Implement ChangeOperation() method.
            return $this->operationController->ChangeOperation($operationID, $newValue);
        }

        /**
         * @inheritDoc
         */
        public function DeleteOperation($operationID)
        {
            // TODO: Implement DeleteOperation() method.
            return $this->operationController->DeleteOperation($operationID);
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
        /*public function GetCategories($userID)
        {
            // TODO: Implement GetCategories() method.
            return $this->categoryController->GetCategories($userID);
        }*/

        public function GetCategories($user_id, $startDateTime, $endDatetime)
        {
            return $this->categoryController->GetCategories($user_id, $startDateTime, $endDatetime);
        }

        /**
         * @inheritDoc
         */
        public function GetAllOperations($userID)
        {
            // TODO: Implement GetAllOperations() method.
            return $this->operationController->GetOperations($userID);
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsByCategory($categoryID)
        {
            // TODO: Implement GetOperationsByCategory() method.
            return $this->operationController->GetOperationsByCategory($categoryID);
        }

        /**
         * @inheritDoc
         */
        public function GetOperationsFromDatetimeIntervalByCategory($categoryID, $startDateTime, $endDatetime)
        {
            // TODO: Implement GetOperationsFromDatetimeInterval() method.
            return $this->operationController->GetOperationFromDatetimeIntervalByCategory($categoryID, $startDateTime, $endDatetime);
        }

        public function GetOperationsFromDateTimeInterval($user_id,$startDateTime, $endDatetime)
        {
            return $this->operationController->GetOperationFromDatetimeInterval($user_id,$startDateTime, $endDatetime);
        }
        /**
         * @inheritDoc
         */
        public function GetAmountExpenses($user_id,$startDateTime, $endDatetime)
        {
            // TODO: Implement GetAmountExpenses() method.
            $sum = 0;
            $all_expenses = json_decode($this->operationController->GetOperationFromDatetimeInterval($user_id,$startDateTime, $endDatetime), true);
            if (is_array($all_expenses)){
                foreach($all_expenses as $expense){
                    $sum += $expense["operation_value"];
                }
            }
            return json_encode($sum);
        }

        /**
         * @inheritDoc
         */
        public function GetAverageExpense($user_id,$startDateTime, $endDatetime)
        {
            // TODO: Implement GetAverageExpense() method.
            $sum = 0;
            $all_expenses = json_decode($this->operationController->GetOperationFromDatetimeInterval($user_id, $endDatetime, $endDatetime), true);
            if (is_array($all_expenses)){
                
                for($i=0;$i<count($all_expenses);$i++) {
                    $sum += $all_expenses[$i]["operation_value"];
                }
                $stDate=strtotime($all_expenses[0]["operation_datetime"]);
                $endDate=strtotime($all_expenses[count($all_expenses)-1]["operation_datetime"]);
                $resdate=getdate(abs($endDate-$stDate));
                $resDiff=$resdate[mday];
                if($resDiff<1)
                    $resDiff=1;
                if (count($all_expenses) != 0){
                    $sum /= $resDiff;
                }
            }
            return json_encode(floor($sum));
        }
    }