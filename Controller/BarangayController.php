<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class BarangayController 

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addBarangay($bar)
		{
			$sql = "INSERT into tourist(t_name, t_bday, t_address, t_contact_no, t_email)
				VALUES('".$tour->gettName()."','".$tour->gettBday()."','".$tour->gettAddress()."', '".$tour->gettcontactNo()."', '".$tour->gettEmail()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Tourist Account Was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=tourist.php'>";
				//$this->con->close();	
		}
	function ShowBarangay()
		{
			$sql = "SELECT * FROM barangay";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['b_id'][$ctr] = $row['b_id'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['municipality'][$ctr] = $row['municipality'];
					$data['br_id'][$ctr] = $row['br_id'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		function ShowBarangaycount()
		{
			$sql = "SELECT COUNT(`bar_list`.`bar_id`) AS brgycount FROM `bar_list`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['brgycount'][$ctr] = $row['brgycount'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
	/*	
	function updateBarangay($tour)
    {
		//$a_id=$tour -> getAid();
        $sqlUpd = "UPDATE tourist SET  t_name='" . $tour->gettName() . "', t_bday ='" . $tour->gettBday() . "'
        ,  t_contact_no = '" . $tour->gettcontactNo() . "',  t_email = '" . $tour->gettEmail() . "',  t_address = '" . $tour->gettAddress() . "' WHERE tourist_id ='" .$tour -> gettouristId(). "' ";
        
		$this->con->query($sqlUpd);
		
		echo "<script>alert('Tourist Record Was Successfully Updated')</script>";
		echo "<meta http-equiv='refresh'content='0;url=Uaccounts.php'>";
        //$this->con->close();
    }
	function deleteBarangay($tour)
    {
       
        $sqlUpd = "DELETE FROM tourist WHERE tourist_id = $tourist_id";
        $this->conn->query($sqlUpd);
        $this->conn->close();
    }
	*/
}

?>