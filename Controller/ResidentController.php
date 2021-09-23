<?php
//this is the touristController
session_start();
error_reporting(E_ALL & ~E_NOTICE);

class ResidentController 

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addResident($res)
		{
			$sqlcheckres = "select * from resident where fullname='".$res->getfullname()."' ";
			$result = $this->con->query($sqlcheckres);
			if ($result->num_rows > 0) {
				echo "<script>alert('Adding Resident Failed, Information already Exist!')</script>";
				echo "<meta http-equiv='refresh'content='0;url=addresident.php'>";
			}
			else{
			$sql = "INSERT into resident(fullname, address, brgy_id)
				VALUES('".$res->getfullname()."','".$res->getaddress()."','".$res->getbrgy_id()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Resident Information was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=residentinfo.php'>";
				//$this->con->close();
			}				
		}
	function addResidentBrgy($res)
		{
			$sqlcheckres = "select * from resident where fullname='".$res->getfullname()."' ";
			$result = $this->con->query($sqlcheckres);
			if ($result->num_rows > 0) {
				echo "<script>alert('Adding Resident Failed, Information already Exist!')</script>";
				echo "<meta http-equiv='refresh'content='0;url=addresidentbrgy.php'>";
			}
			else{
			$sql = "INSERT into resident(fullname, address, brgy_id)
				VALUES('".$res->getfullname()."','".$res->getaddress()."','".$res->getbrgy_id()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Resident Information was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=residentinfoBrgy.php'>";
				//$this->con->close();
			}				
		}

	function addResidentChairperson($res)
		{
			$sqlcheckres = "select * from resident where fullname='".$res->getfullname()."' ";
			$result = $this->con->query($sqlcheckres);
			if ($result->num_rows > 0) {
				echo "<script>alert('Adding Chairman Failed, Information already Exist!')</script>";
				echo "<meta http-equiv='refresh'content='0;url=addresidentbrgy.php'>";
			}
			else{
			$sql = "INSERT into resident(fullname, address, brgy_id)
				VALUES('".$res->getfullname()."','".$res->getaddress()."','".$res->getbrgy_id()."')";
				//$this->con->query($sql);
				if ($this->con->query($sql) === TRUE) {
				$res_id = $this->con->insert_id;
				
				$sqlch = "INSERT into brgy_chairman(res_id, brgy_id)
				VALUES('".$res_id."','".$res->getbrgy_id()."')";
				$this->con->query($sqlch);
				
				echo "<script>alert('Chairperson Info was Successfully Registered')</script>";
				echo "<meta http-equiv='refresh'content='0;url=barangaychairmaninfo.php'>";
				//$this->con->close();
				}
			}				
		}			
	function ShowResident()
		{
			$sql = "SELECT `resident`.`res_id`, `resident`.`brgy_id`,`resident`.`address`,`barangay`.`brgy`, `resident`.`date_added`,`resident`.`fullname`,`barangay`.`brgy` 
FROM `barangay`,`resident` 
WHERE `resident`.`brgy_id`=`barangay`.`b_id`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['b_id'][$ctr] = $row['b_id'];
					$data['res_id'][$ctr] = $row['res_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['address'][$ctr] = $row['address'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['date_added'][$ctr] = $row['date_added'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}

	function ShowResidentBrgy($res)
		{
			$sql = "SELECT `resident`.`res_id`, `resident`.`brgy_id`,`resident`.`address`, `resident`.`date_added`,`resident`.`fullname`,`barangay`.`brgy` FROM `barangay`,`resident` WHERE `resident`.`brgy_id`='".$res->getbrgy_id()."' AND `barangay`.`b_id`='".$res->getbrgy_id()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['res_id'][$ctr] = $row['res_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['address'][$ctr] = $row['address'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['brgy_id'][$ctr] = $row['brgy_id'];
					$data['date_added'][$ctr] = $row['date_added'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		function ShowBrgyKagawad($res)
		{
			$sql = "SELECT * FROM `kagawad_list` WHERE b_id='".$res->getbrgy_id()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['res_id'][$ctr] = $row['res_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['b_id'][$ctr] = $row['b_id'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$data['access_level'][$ctr] = $row['access_level'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
	function ShowKagawadBrgy($res)
		{
			$sql = "SELECT * FROM `kagawad_list` WHERE b_id`='".$res->getbrgy_id()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['res_id'][$ctr] = $row['res_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['brgy'][$ctr] = $row['brgy'];
					$data['b_id'][$ctr] = $row['b_id'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$data['access_level'][$ctr] = $row['access_level'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
	function ShowResidentCount()
		{
			$sql = "SELECT COUNT(`resident`.`res_id`) AS rescount FROM `resident`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['rescount'][$ctr] = $row['rescount'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}

	function ShowResidentCountBrgy($res)
		{
			$sql = "SELECT COUNT(`resident`.`res_id`) AS rescount FROM `resident` where brgy_id='".$res->getbrgy_id()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['rescount'][$ctr] = $row['rescount'];
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