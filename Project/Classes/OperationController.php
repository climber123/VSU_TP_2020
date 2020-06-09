<?php

    require_once('OperationDAO.php');

    class OperationController
    {
        private $operationDAO;
        


        public function __construct() {
            $this->operationDAO = new OperationDAO("operation");
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
        public function AddOperation($value, $categoryID, $datetime){
            $input_data = array("operation_value" => $value, "operation_datetime" => $datetime, "category_id" => $categoryID);
            //return json_encode($input_data);
            $operation_id = $this->operationDAO->Insert($input_data);
            $res = array("status" => true, "operation_id" => $operation_id);
            http_response_code(201);
            return json_encode($res);
        }

        /**
         * @param integer $operationID
         * @param integer $newValue
         */
        public function ChangeOperation($operationID, $newValue){
            $input_data = array("operation_id" => $operationID, "new_operation_value" => $newValue);
            $count_of_affected_rows = $this->operationDAO->Update($input_data);
            $res = array();
            if ($count_of_affected_rows){
                $res["status"] = true;
                $res["message"] = "operation is updated";
                http_response_code(200);
            }
            else{
                $res["status"] = false;
                $res["message"] = "operation is not updated";
                http_response_code(400);
            }
            return json_encode($res);
        }

        /**
         * @param integer $operationID
         */
        public function DeleteOperation($operationID){
            $count_of_affected_rows = $this->operationDAO->Delete($operationID);
            if ($count_of_affected_rows){
                $res["status"] = true;
                $res["message"] = "operation is deleted";
                http_response_code(200);
            }
            else{
                $res["status"] = false;
                $res["message"] = "operation is not deleted";
                http_response_code(400);
            }
            return json_encode($res);
        }

        /**
         * @param integer $userID
         */
        public function GetOperations($userID){
            $operations = $this->operationDAO->GetAllOperations($userID);
            if (count($operations))
                return json_encode($operations);
            else{
                return json_encode(array());
            }
        }

        /**
         * @param integer $categoryID
         */
        public function GetOperationsByCategory($categoryID){
            $operations = $this->operationDAO->GetOperationsByCategory($categoryID);
            if (count($operations))
                return json_encode($operations);
            else{
                return json_encode(array());
            }
        }

        /**
         * @param datetime $categoryID
         * @param datetime $endDatetime
         * @param datetime $datetimeInterval
         */
        public function GetOperationFromDatetimeIntervalByCategory($categoryID, $startDateTime, $endDatetime){
            $input_data = array("category_id" => $categoryID, "end_date_time" => $endDatetime, "start_date_time" => $startDateTime);
            $operations = $this->operationDAO->GetOperationsFromTimeIntervalByCategory($input_data);
            if (count($operations))
                return json_encode($operations);
            else{
                return json_encode(array());
            }
        }

        public function GetOperationFromDatetimeInterval($user_id,$startDateTime, $endDatetime)
        {
            $input_data = array('user_id'=>$user_id, "end_date_time" => $endDatetime, "start_date_time" => $startDateTime);
            $operations = $this->operationDAO->GetOperationsFromTimeInterval($input_data);
            if (count($operations))
                return json_encode($operations);
            else{
                return json_encode(array());
            }
        }
    }
?>