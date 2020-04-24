<?php


    class CategoryController
    {
        private $userID;
        private $categoryDAO;

        /**
         * CategoryController constructor.
         * @param integer $userID
         */
        public function __construct($userID) {
            $this->userID = $userID;
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }
        public function GetCategories(){}

        /**
         * @param string $name
         */
        public function AddCategory($name){}

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