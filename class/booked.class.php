<?php
    class Booked
    {
        private $db=null;
        private static $settingsList = null;
		function __construct()
        {
			$this->db = Database::GetDatabaseConnection();
		}
        
        function GetList()
        {
            $query = "SELECT dates from booked";
            return $this->db->GetRow($query);
        }
        
        
        
        function GetBookedDays($year,$month)
        {
            $sql = "SELECT dates FROM booked WHERE YEAR(dates)=? AND MONTH(dates) = ?";
            $parameter = array($year,$month);
            $types = array("s","s");
            return $this->db->GetRowList($sql, $parameter, $types);
        }
    }
?>