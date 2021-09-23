<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class BarangayChairmanController

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    		
	function addbarangay_chairman($ch)
		{
			echo $brgyid=$ch->getbrgy_id();
			echo $cname=$ch->getcname();
			
			$sql = "INSERT into brgy_chairman(fullname, brgy_id,res_id)
				VALUES('".$ch->getcname()."','".$ch->getbrgy_id()."','".$ch->getres_id()."')";
				$this->con->query($sql);
								
				echo "<script>alert('Chaiperson Information Was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=brgychairmaninfo.php'>";
				//$this->con->close();	
		}
	function Showbarangay_chairman()
		{
			$sql = "SELECT * FROM `brgy_chairman_list`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['brgyc_id'][$ctr] = $row['brgyc_id'];
					$data['position'][$ctr] = $row['position'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['date_added'][$ctr] = $row['date_added'];
					$data['res_id'] [$ctr] = $row['res_id'];
					
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
	function Showbarangay_chairmanAccounts()
		{
			$sql = "SELECT * FROM `brgy_chairman_accounts` where access_level='chairman'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['brgyc_id'][$ctr] = $row['brgyc_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['username'][$ctr] = $row['username'];
					$data['date_added'][$ctr] = $row['date_added'];
					$data['access_level'] [$ctr] = $row['access_level'];
					
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}		
		function Showbarangaychairmancount()
		{
			$sql = "SELECT * FROM admin";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['bry_id'][$ctr] = $row['bry_id'];
					$data['position'][$ctr] = $row['position'];
					$data['res_id'] [$ctr] = $row['res_id'];
					$data['user_id'] [$ctr] = $row['user_id']; 
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
/*		
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
	*/
}

?>