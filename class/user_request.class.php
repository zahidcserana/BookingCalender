<?php
    class UserRequest
    {
        private $db=null;
        function __construct()
        {
            $this->db = Database::GetDatabaseConnection();
        }
        function Insert($name, $firstName, $lastName, $reason, $question, $dateValue)
        {
            $query = "INSERT INTO user_request (name,first_name,last_name,reason,question,dates)
                VALUES (?, ?, ?, ?, ?, ?)";
            $parameters = array($name, $firstName, $lastName, $reason, $question, $dateValue);
            $types = array("s","s","s","s","s","s");
            return $this->db->Insert($query, $parameters, $types);
        }

        function Delete($user_id)
        {
            $query = "delete from booked where user_id = ?";
            $parameter = array($user_id);
            return $this->db->Delete($query, $parameter);
        }

        function Update($userName, $firstName, $lastName, $reason, $email, $dates, $user_id)
        {
            $query = "update booked set user_name = ?, first_name = ?, last_name = ?, reason = ?, email = ?, dates = ? where user_id = ? ";
            $parameters = array($userName, $firstName, $lastName, $reason, $email, $dates, $user_id);
            return $this->db->Delete($query, $parameters);
        }

        function GetList()
        {
            $query = "SELECT dates from booked";
            return $this->db->GetRowList($query);
        }
    
    function GetBookedDays($year, $month)
    {
      $query = "select dates from booked where YEAR(dates)=? and MONTH(dates)=?";
      $parameters = array($year, $month);
      return $this->db->GetRowList($query,$parameters);
    }

        function CheckDate($selectedDate)
        {
            //$query = "SELECT * from booking_rqst where email = ?";
            //$query->bindParam(1, $selectedDate);
            //$this->db->GetOneRow($query);
        }
    }
?>




