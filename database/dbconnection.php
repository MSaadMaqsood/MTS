<?php

    class DBConnection
    {
        public function connection()
        {
            try {
                $connect = mysqli_connect("localhost","root","","mts");
                return $connect;
            } catch (\Throwable $th) {
                
            }
        }
    }
    

?>