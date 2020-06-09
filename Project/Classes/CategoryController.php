<?php

    require_once('CategoryDAO.php');

    class CategoryController
    {
        private $categoryDAO;
        private $standart_categories = array();



        /**
         * CategoryController constructor.
         */
        public function __construct() {
            $this->categoryDAO = new CategoryDAO("category");
            $this->standart_categories = ["Продукты", "Кафе", "Транспорт", "Досуг", "Здоровье", "Подарки", "Семья", "Покупки"];
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        /**
         * @param $userID
         */
        /*public function GetCategories($userID){
            $categories = $this->categoryDAO->GetCategories($userID);
            if (count($categories))
                return json_encode($categories);
            else{
                return json_encode(array());
            }
        }*/

        public function GetCategories($user_id, $startDateTime, $endDatetime)
        {
            $categories = $this->categoryDAO->GetCategories($user_id, $startDateTime, $endDatetime);
            if (count($categories))
                return json_encode($categories);
            else
                return json_encode(array());
        }

        /**
         * @param integer $userID
         * @param string $name
         */
        public function AddCategory($userID, $name){
            $input_data = array("user_id" => $userID, "category_name" => $name);
            $category_id = $this->categoryDAO->Insert($input_data);
            if ($category_id == -1){
                $res = array("status" => false, "message" => "count of categories cannot be more than 20");
                http_response_code(400);
                return json_encode($res);
            }
            else{
                $res = array("status" => true, "category_id" => $category_id);
                http_response_code(201);
                return json_encode($res);
            }
        }

        public function AddStandartCategories($userID){
            $categories_id = array();
            if (is_array($this->standart_categories)){
                foreach($this->standart_categories as $category){
                    $categories_id[] = json_decode($this->AddCategory($userID, $category));
                }
            }
            return json_encode($categories_id);
        }

        /**
         * @param integer t$categoryID
         * @param string $newName
         */
        public function ChangeCategory($categoryID, $newName){
            $input_data = array("category_id" => $categoryID, "new_name" => $newName);
            $count_of_affected_rows = $this->categoryDAO->Update($input_data);
            $res = array();
            if ($count_of_affected_rows){
                $res["status"] = true;
                $res["message"] = "category is updated";
                http_response_code(200);
            }
            else{
                $res["status"] = false;
                $res["message"] = "category is not updated";
                http_response_code(400);
            }
            return json_encode($res);
        }

        /**
         * @param integer $categoryID
         */
        public function RemoveCategory($categoryID){
            $count_of_affected_rows = $this->categoryDAO->Delete($categoryID);
            //echo $count_of_affected_rows;
            $res = array();
            if ($count_of_affected_rows){
                $res["status"] = true;
                $res["message"] = "category is deleted";
                //$res = array("status" => true, "message" => "category is deleted");
                http_response_code(200);
            }
            else{
                $res["status"] = false;
                $res["message"] = "category is not deleted";
                http_response_code(400);
            }
            return json_encode($res);
        }
    }