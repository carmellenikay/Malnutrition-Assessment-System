<?php
//this is the person controller
error_reporting(E_ALL & ~E_NOTICE);

class TyphoonController 

{
    var $con;
    function __construct() //use to initialize variables
    {
		include 'connection.php';
    }


	function addTyphoon($ty)
		{
			
			$sql = "INSERT into typhoon(typhoon_name, t_year)
				VALUES('".$ty->gettname()."','".$ty->gettyear()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Typhoon Was Successfully Added')</script>";
				echo "<meta http-equiv='refresh'content='0;url=typhooninfo.php'>";
				//$this->con->close();	
		}
		
			
	function showTyphoon()
		{
			$sql = "SELECT * FROM typhoon 
					WHERE YEAR(`typhoon`.`date_added`)=YEAR(CURDATE()) 
					ORDER BY  typhoon_name DESC";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_id'][$ctr] = $row['typhoon_id'];
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['t_year'][$ctr] = $row['t_year'];
					$data['date_added'][$ctr] = $row['date_added'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}	
		
	function updAccountInfo($act)
    {
		$a_id=$act -> getAid();
        $sqlUpdSelect = "SELECT * FROM account WHERE a_id ='$a_id'";
        $result = $this->con->query($sqlUpdSelect);

        if($result->num_rows > 0)
        {
            $data = array();
            $ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
                $data['a_id'][$ctr]= $row['a_id'];
                $data['username'][$ctr] = $row['username'];
				$data['password'][$ctr] = $row['password'];
				$data['ac_name'][$ctr] = $row['ac_name'];
				$data['access_level'][$ctr] = $row['access_level'];
				$data['status'][$ctr] = $row['status'];
				$data['company'][$ctr] = $row['company'];
				$data['reg_date'][$ctr] = $row['reg_date'];
				
				$ctr++;	
				$data['count'] = $ctr;

				}	
            return $data;
        }
        //$this->con->close();
    }
		
	function updateAccount($act)
    {
		//$a_id=$act -> getAid();
        $sqlUpd = "UPDATE account SET  ac_name='" . $act->getAcName() . "', company ='" . $act->getCompany() . "'
        ,  username = '" . $act->getUsername() . "',  password = '" . $act->getPassword() . "',  status = '" . $act->getStatus() . "',  access_level = '" . $act->getAccessLevel() . "' WHERE a_id ='" .$act -> getAid(). "' ";
        
		$this->con->query($sqlUpd);
		
		echo "<script>alert('One Record Was Successfully Updated')</script>";
		echo "<meta http-equiv='refresh'content='0;url=Uaccounts.php'>";
        //$this->con->close();
    }
	function deleteAccount($act)
    {
       
        $sqlUpd = "DELETE FROM account WHERE a_id = $did";
        $this->conn->query($sqlUpd);
        $this->conn->close();
    }
	
		
}

?>