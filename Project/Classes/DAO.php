<?php
    abstract class DAO
    {
        protected $tableName;
        protected $atributeNames;

        protected function ConnectDataBase(){

        }

        /**
         * DAO constructor.
         * @param string $tableName
         * @param array $atributeNames
         */
        public function __construct($tableName, $atributeNames = null) {
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
        abstract public function Insert($data);

        /**
         * @param $data
         */
        abstract public function Update($data);

        /**
         * @param $data
         */
        abstract public function Delete($data);

    }
?>