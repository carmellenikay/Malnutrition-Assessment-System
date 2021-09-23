<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class AdminController

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addadmin($dr)
		{
			$sql = "INSERT into admin(username, password) 
				VALUES('".$ad->getusername()."','".$ad->getpassword()."')'";
				$this->con->query($sql);
				
				echo "<script>alert('Tourist Account Was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=tourist.php'>";
				//$this->con->close();	
		}
	function Showadmin()
		{
			$sql = "SELECT * FROM admin";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		// show specific tourist info
		
	function updateResident($res)
    {
		//$a_id=$tour -> getAid();
        $sqlUpd = "UPDATE tourist SET  t_name='" . $tour->gettName() . "', t_bday ='" . $tour->gettBday() . "'
        ,  t_contact_no = '" . $tour->gettcontactNo() . "',  t_email = '" . $tour->gettEmail() . "',  t_address = '" . $tour->gettAddress() . "' WHERE tourist_id ='" .$tour -> gettouristId(). "' ";
        
		$this->con->query($sqlUpd);
		
		echo "<script>alert('Tourist Record Was Successfully Updated')</script>";
		echo "<meta http-equiv='refresh'content='0;url=Uaccounts.php'>";
        //$this->con->close();
    }
	function deleteREsident($res)
    {
       
        $sqlUpd = "DELETE FROM tourist WHERE tourist_id = $tourist_id";
        $this->conn->query($sqlUpd);
        $this->conn->close();
    }
	
}

?>