<?php

    require_once("../Scripts/query.php");
    require_once("DAO.php");

    class OperationDAO extends DAO
    {
        public function __construct($tableName, $atributeNames=null){
            parent::__construct($tableName, $atributeNames);
        }

        public function Insert($data){
            $operation_value = $data["operation_value"];
            $operation_datetime = $data["operation_datetime"];
            $category_id = $data["category_id"];

            $query = "INSERT INTO `$this->tableName` (`operation_value`, `operation_datetime`, `category_id`) VALUES ('$operation_value', '$operation_datetime', '$category_id')";
            exec_query($query);
            global $mysqli;
            return mysqli_insert_id($mysqli);
        }

        public function Update($data){
            $operation_id = $data["operation_id"];
            $new_operation_value = $data["new_operation_value"];

            $query = "UPDATE `$this->tableName` SET `operation_value` = '$new_operation_value' WHERE `operation_id` = '$operation_id'";
            return exec_query($query);
        }

        public function Delete($data){
            $operation_id = $data;
            
            $query = "DELETE FROM `$this->tableName` WHERE `operation`.`operation_id` = '$operation_id'";
            return exec_query($query);
        }

        public function GetAllOperations($data){
            $user_id = $data;

            $query = "SELECT op.operation_id, op.operation_value, op.operation_datetime, cat.category_id, cat.category_name FROM $this->tableName AS op JOIN category AS cat ON op.category_id = cat.category_id WHERE cat.user_id = $user_id";
            /*$query_to_categories = "SELECT `category_id` FROM `category` WHERE `user_id` = '$user_id' ORDER BY `category_id`";
            $categories = exec_select_query($query_to_categories);
            $operations = array();
            if (is_array($categories)){
                foreach($categories as $item){
                    $category_id = $item["category_id"];
                    $query = "SELECT * FROM `$this->tableName` WHERE `category_id` = '$category_id' ORDER BY `operation_id`";
                    $operations_by_current_category = exec_select_query($query);
                    if (count($operations_by_current_category))
                        $operations[] = $operations_by_current_category;
                }
            }*/
            $operations = exec_select_query($query);
            return $operations;
        }

        public function GetOperationsByCategory($data){
            $category_id = $data;

            $query = "SELECT `*` FROM `operation` WHERE `category_id` = '$category_id' ORDER BY `operation_id`";
            $categories = exec_select_query($query);

            return $categories;
        }

        public function GetOperationsFromTimeIntervalByCategory($data){
            $category_id = $data["category_id"];
            $end_date_time = $data["end_date_time"];
            $start_date_time = $data["start_date_time"];

            $operations = array();
            if ($category_id == null){
                $query = "SELECT * FROM `operation` WHERE `operation_datetime` BETWEEN '$start_date_time' AND '$end_date_time' ORDER BY `operation_id`";

                $operations = exec_select_query($query);
            }
            else{
                $query = "SELECT * FROM `operation` WHERE `category_id` = '$category_id' AND `operation_datetime` BETWEEN DATE_FORMAT('$start_date_time', '%Y-%m-%d %H:%m:%s') AND DATE_FORMAT('$end_date_time', '%Y-%m-%d %H:%m:%s') ORDER BY `operation_id`";
                $operations = exec_select_query($query);
            }
            return $operations;
        }

        public function GetOperationsFromTimeInterval($input_data)
        {
            $end_date_time = $input_data["end_date_time"];
            $start_date_time = $input_data["start_date_time"];
            $user_id=$input_data["user_id"];
            if($start_date_time!=$end_date_time)
                $query = "SELECT op.operation_id, op.operation_value, cat.category_name, op.operation_datetime FROM operation AS op JOIN category AS cat ON op.category_id = cat.category_id WHERE op.operation_datetime BETWEEN DATE_FORMAT('$start_date_time', '%Y-%m-%d %H:%m:%s') AND DATE_FORMAT('$end_date_time', '%Y-%m-%d %H:%m:%s') AND cat.user_id='$user_id' ORDER BY op.operation_datetime ";
            else
                $query = "SELECT op.operation_id, op.operation_value, cat.category_name, op.operation_datetime FROM operation AS op JOIN category AS cat ON op.category_id = cat.category_id AND cat.user_id='$user_id' ORDER BY op.operation_datetime";
            $operations = exec_select_query($query);
            return $operations;
        }
    }
?>