<?php


    interface ILogOut
    {
        /**
         * @param integer $userID
         * @return IAuthorization mixed
         */
        public function LogOut($userID);

    }