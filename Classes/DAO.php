<?php


    class DAO
    {
        protected $tableName;
        protected $atributeNames;

        protected function ConnectDataBase(){}

        /**
         * DAO constructor.
         * @param string $tableName
         * @param array $atributeNames
         */
        public function __construct($tableName, $atributeNames) {
            $this->tableName = $tableName;
            $this->atributeNames = $atributeNames;
        }
        public function __destruct()
        {
            // TODO: Implement __destruct() method.
        }

        /**
         * @param $data
         */
        public function Insert($data){}

        /**
         * @param $data
         */
        public function Update($data){}

        /**
         * @param $data
         */
        public function Delete($data){}

    }