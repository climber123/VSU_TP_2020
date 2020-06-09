<?php

    require_once("../Scripts/query.php");
    require_once("DAO.php");

    class CategoryDAO extends DAO
    {
        public function __construct($tableName, $atributeNames=null){
            parent::__construct($tableName, $atributeNames);
        }

        public function Insert($data){
            $category_name = $data["category_name"];
            $user_id = $data["user_id"];

            $valid_query = "SELECT COUNT(*) FROM `$this->tableName` WHERE `user_id` = '$user_id'";
            $count_of_categories = exec_select_query($valid_query);
            if ($count_of_categories[0][0] <= 19){
                $query = "INSERT INTO `$this->tableName` (`category_name`, `user_id`) VALUES ('$category_name', '$user_id')";
                exec_query($query);
                global $mysqli;
                return mysqli_insert_id($mysqli);
            }
            else{
                return -1;
            }
        }

        public function Update($data){
            $category_id = $data["category_id"];
            $new_name = $data["new_name"];

            $query = "UPDATE `$this->tableName` SET `category_name` = '$new_name' WHERE `category_id` = '$category_id'";
            return exec_query($query);
        }

        public function Delete($data){
            $category_id = $data;
            $query = "DELETE FROM `$this->tableName` WHERE `category`.`category_id` = '$category_id'";
            return exec_query($query);
        }

        /*public function GetCategories($data){
            $user_id = $data;

            $query = "SELECT * FROM `$this->tableName` WHERE `user_id` = '$user_id' ORDER BY `category_id`";
            $categories = exec_select_query($query);
            return $categories;
        }*/

        public function GetCategories($user_id, $startDateTime, $endDatetime)
        {
            //$startDateTime = date("Y-m-d H:m:s", strtotime($startDateTime));
            //$endDatetime = date("Y-m-d H:m:s", strtotime($endDatetime));
            if ($startDateTime == $endDatetime)
            {
                $query = "SELECT cat.category_id, cat.category_name, SUM(op.operation_value) AS sum_of_category FROM $this->tableName AS cat LEFT JOIN operation AS op ON cat.category_id = op.category_id WHERE user_id = $user_id GROUP BY cat.category_id";
            }
            else
            {
                $query = "SELECT cat.category_id, cat.category_name, SUM(op.operation_value) AS sum_of_category, op.operation_datetime FROM $this->tableName AS cat LEFT JOIN operation AS op ON (cat.category_id = op.category_id AND op.operation_datetime BETWEEN DATE_FORMAT('$startDateTime', '%Y-%m-%d %H:%m:%s') AND DATE_FORMAT('$endDatetime', '%Y-%m-%d %H:%m:%s')) WHERE user_id = $user_id GROUP BY cat.category_id, op.operation_datetime";
                //$query = "SELECT cat.category_id, cat.category_name FROM $this->tableName AS cat LEFT JOIN operation AS op ON cat.category_id = op.category_id WHERE user_id = $user_id AND op.operation_datetime BETWEEN DATE_FORMAT('$startDateTime', '%Y-%m-%d %H:%m:%s') AND DATE_FORMAT('$endDatetime', '%Y-%m-%d %H:%m:%s') GROUP BY cat.category_id";
            }
            $categories = exec_select_query($query);


            for($i = 0; $i < count($categories); $i++)
            {
                if ($categories[$i]["sum_of_category"] == null)
                {
                    $categories[$i]["sum_of_category"] = 0;   
                }
            }
            //$newCats=array();
            //$counter=0;
            //$testarr=array();

            $newCats=array();
            while (count($categories)>0){
                $category=array_shift($categories);
                while (count($categories)>0){
                    $tcat=array_shift($categories);
                    /*array_push($testarr,$category['1']);
                    array_push($testarr,$tcat['1']);*/

                    if($category['1']==$tcat['1']){
                        $category['2']=$category['2']+$tcat['2'];
                    }
                    else{
                        //array_push($newCats,$category);
                        array_unshift($categories,$tcat);
                        break;
                    }
                }
                array_push($newCats,$category);
            }


            
            return $newCats;
        }
    }
?>