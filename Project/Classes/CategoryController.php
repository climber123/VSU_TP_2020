<?php


    class CategoryController
    {
        private $categoryDAO;


        /**
         * CategoryController constructor.
         */
        public function __construct() {

        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        /**
         * @param $userID
         */
        public function GetCategories($userID){}

        /**
         * @param integer $userID
         * @param string $name
         */
        public function AddCategory($userID, $name){}

        /**
         * @param integer t$categoryID
         * @param string $newName
         */
        public function ChangeCategory($categoryID, $newName){}

        /**
         * @param integer $categoryID
         */
        public function RemoveCategory($categoryID){}
    }