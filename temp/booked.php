<?php
include('class/database.class.php');
	
    $date = $_REQUEST['showdate'];
    


public function Insert($query,$params, $types)
    {
      if ($types === null)
        {
            $types = array();
            foreach ($params as $param)
                $types[] = substr(gettype($param), 0, 1);
        }
        $typeString = implode('', $types);
        
        
        $bindParams = array();
        $bindParams[] = $typeString;
      //ini_set('memory_limit', '2G');
        for($index=0; $index<count($params); $index++)
          $bindParams[] = &$params[$index];
        
        $stmt = $this->connection->prepare($query);
        

        call_user_func_array(
            array($stmt, 'bind_param'),
            $bindParams
        );
        $stmt->execute();
        
      $result = $stmt->get_result();
            $stmt->close();


      if($result==false)
        return false;
      else
        return true;
    }
    
if (!$insertRow)
	include('calender.php');

?>