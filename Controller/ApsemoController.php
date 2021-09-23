<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class ApsemoController 

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addApsemo($ap)
		{
			echo $fullname=$ap->getfullname();
			echo $position=$ap->getposition();
			echo $bdate=$ap->getbirthdate();
			
			$sql = "INSERT into apsemo(fullname, position, birthdate)
				VALUES('".$ap->getfullname()."','".$ap->getposition()."','".$ap->getbirthdate()."')";
				$this->con->query($sql);
				
				echo "<script>alert('APSEMO Account Was Successfully Registered')</script>";
				//echo "<meta http-equiv='refresh'content='0;url=apsemoinfo.php'>";
				//$this->con->close();	
		}
	function ShowApsemo()
		{
			$sql = "SELECT * FROM apsemo";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['fullname'][$ctr] = $row['fullname'];
					$data['position'][$ctr] = $row['position'];
					$data['birthdate'] [$ctr] = $row['birthdate'];
					$data['status'] [$ctr] = $row['status'];
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