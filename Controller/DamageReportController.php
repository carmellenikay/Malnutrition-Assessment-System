<?php
//this is the touristController
error_reporting(E_ALL & ~E_NOTICE);

class DamageReportController 

{
    var $con;
    function __construct() //use to initialize variables
    {
        include 'connection.php';
    }

    	// register Barangay	
	function addDamageReport($dr)
		{
			echo $dtype=$dr->getdamage_type();
			echo $ecost=$dr->getestimated_cost();
			echo $brgyid=$dr->getbrgy_id();
			echo $resid=$dr->getres_id();
			echo $caldate=$dr->getcalamity_date();
			
			$sql = "INSERT into damage_report(damage_type, estimated_cost, brgy_id, res_id, date_calamity)
				VALUES('".$dtype."','".$ecost."','".$resid."','".$caldate."')";
				$this->con->query($sql);
				
				echo "<script>alert('Damage Report was Successfully Added')</script>";
				echo "<meta http-equiv='refresh'content='0;url=damagereportinfo.php'>";
				//$this->con->close();	
		}
	function addDamageReportBrgy($dr)
		{
			echo $dtype=$dr->getdamage_type();
			echo $ecost=$dr->getestimated_cost();
			echo $brgyid=$dr->getbrgy_id();
			echo $tpname=$dr->gettpname();
			echo $resid=$dr->getres_id();
			echo $caldate=$dr->getcalamity_date();
			
			$sql = "INSERT into damage_report(damage_type, estimated_cost, brgy_id,  res_id, date_calamity, typhoon_name)
				VALUES('".$dtype."','".$ecost."','".$brgyid."','".$resid."','".$caldate."','".$tpname."')";
				$this->con->query($sql);
				
				echo "<script>alert('Damage Report was Successfully Added')</script>";
				echo "<meta http-equiv='refresh'content='0;url=damagereportinfobrgy.php'>";
				//$this->con->close();	
		}
		
	function ShowDamageReport()
		{
			$sql = "SELECT `damage_report`.`damrep_id`,`damage_report`.`typhoon_name`,`damage_report`.`damage_type`, `damage_report`.`estimated_cost`, `barangay`.`brgy`,`barangay`.`b_id`,
		`resident`.`fullname`, `resident`.`res_id`,`damage_report`.`calamity`, YEAR(`damage_report`.`date_calamity`) AS caldate
		FROM `damage_report`,`resident`,`barangay`
		WHERE `resident`.`brgy_id`=`barangay`.`b_id` 
		AND `damage_report`.`res_id`=`resident`.`res_id`
		AND YEAR(`damage_report`.`date_added`)=YEAR(CURDATE())";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['damage_type'][$ctr] = $row['damage_type'];
					$data['estimated_cost'][$ctr] = $row['estimated_cost'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$data['fullname'] [$ctr] = $row['fullname'];
					$data['caldate'] [$ctr] = $row['caldate'];
					$data['calamity'] [$ctr] = $row['calamity'];
					$data['res_id'] [$ctr] = $row['res_id'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
			function damagereportpertyphoon()
		{
			$sql = "SELECT * FROM `damage_cost_per_typhoon` WHERE `damage_cost_per_typhoon`.`yearcalamity` = YEAR(CURDATE())";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damagecost'][$ctr] = $row['damagecost'];
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['yearcalamity`'] [$ctr] = $row['yearcalamity`'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		function ShowDamageReportBrgy($dr)
		{
			$sql = "SELECT `damage_report`.`damrep_id`,`damage_report`.`damage_type`, `damage_report`.`estimated_cost`, `damage_report`.`typhoon_name`,  `barangay`.`brgy`,`barangay`.`b_id`, `resident`.`fullname`, `resident`.`res_id`,`damage_report`.`calamity`, YEAR(`damage_report`.`date_calamity`) as `date_calamity`   
			FROM `damage_report`,`resident`,`barangay`
			WHERE `damage_report`.`brgy_id`='".$dr->getbrgy_id()."' AND `damage_report`.`res_id`=`resident`.`res_id` AND `barangay`.`b_id`='".$dr->getbrgy_id()."'	AND YEAR(`damage_report`.`date_added`)=YEAR(CURDATE())
			";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damage_type'][$ctr] = $row['damage_type'];
					$data['estimated_cost'][$ctr] = $row['estimated_cost'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$data['fullname'] [$ctr] = $row['fullname'];
					$data['date_calamity'] [$ctr] = $row['date_calamity'];
					$data['calamity'] [$ctr] = $row['calamity'];
					$data['typhoon_name'] [$ctr] = $row['typhoon_name'];
					$data['res_id'] [$ctr] = $row['res_id'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		
		function DamageReportBrgy()
		{
			$sql = "SELECT * FROM `damage_cost_per_barangay`
					WHERE `damage_cost_per_barangay`.year_calamity=YEAR(CURDATE())  
					ORDER BY `damage_cost_per_barangay`.`typhoon_name`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damage_cost'][$ctr] = $row['damage_cost'];
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['year_calamity'] [$ctr] = $row['year_calamity'];
					$data['br_id'] [$ctr] = $row['br_id'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		function DamageReportBrgy_specific()
		{
			$sql = "SELECT * FROM `damage_per_category`
					WHERE `damage_per_category`.caldate=YEAR(CURDATE()) 
					ORDER BY `damage_per_category`.`caldate`,`damage_per_category`.`typhoon_name` ASC";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['damagecost'] [$ctr] = $row['damagecost'];
					$data['caldate'] [$ctr] = $row['caldate'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$data['bcode'] [$ctr] = $row['bcode'];
					$data['damage_type'] [$ctr] = $row['damage_type'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		
		function DamageReportDT($dr)
		{
			$sql = "SELECT * FROM `damage_per_category` 
			where `damage_per_category`.`typhoon_name`='".$dr->gettpname()."'
			GROUP BY `damage_per_category`.`brgy`
			ORDER BY `damage_per_category`.`caldate`,`damage_per_category`.`typhoon_name` ASC
			
			";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['damagecost'] [$ctr] = $row['damagecost'];
					$data['caldate'] [$ctr] = $row['caldate'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$data['bcode'] [$ctr] = $row['bcode'];
					$data['damage_type'] [$ctr] = $row['damage_type'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}


		function showTyphoon()
		{
			$sql = "SELECT  DISTINCT(`typhoon`.`typhoon_name`) FROM `typhoon` 
			WHERE YEAR(`typhoon`.`date_added`)=YEAR(CURDATE())
			ORDER BY `typhoon`.`typhoon_name` DESC";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		function showTyphoonYear()
		{
			$sql = "SELECT  DISTINCT(YEAR(`damage_report`.`date_calamity`)) AS tpyear 
FROM `damage_report` 
ORDER BY `damage_report`.`typhoon_name` DESC";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['tpyear'][$ctr] = $row['tpyear'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		function showSTyphoon($dr)
		{
		$sql = "SELECT  DISTINCT(`damage_report`.`typhoon_name`) 
				FROM `damage_report` 
				WHERE `damage_report`.`typhoon_name`='".$dr->gettpname()."'
				AND YEAR(`typhoon`.`date_added`)=YEAR(CURDATE())
				ORDER BY `damage_report`.`typhoon_name` DESC";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}

		
		function DamageReportBrgyTyphoon($dr)
		{
			$sql = "SELECT * FROM `damage_cost_per_barangay` 
WHERE `damage_cost_per_barangay`.`typhoon_name`='".$dr->getbrgy()."'
ORDER BY `damage_cost_per_barangay`.`typhoon_name`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damage_cost'][$ctr] = $row['damage_cost'];
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['year_calamity'] [$ctr] = $row['year_calamity'];
					$data['br_id'] [$ctr] = $row['br_id'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}

		function DamageReportG($dr)
		{
			$sql = "SELECT *  FROM `damage_per_category` 
					WHERE `damage_per_category`.`brgy`='".$dr->getbrgy()."'
					AND `damage_per_category`.caldate=YEAR(CURDATE())
					GROUP BY `damage_per_category`.`damage_type`,`damage_per_category`.`typhoon_name`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damage_type'][$ctr] = $row['damage_type'];
					$data['damagecost'][$ctr] = $row['damagecost'];
					$data['typhoon_name'][$ctr] = $row['typhoon_name'];
					$data['caldate'] [$ctr] = $row['caldate'];
					$data['brgy'] [$ctr] = $row['brgy'];
					$ctr++;
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
		
			function ShowDamageReportcount()
		{
			$sql = "SELECT COUNT(`damage_report`.`damrep_id`) AS damagecount 
			FROM `damage_report`
			WHERE YEAR(`damage_report`.`date_added`)=YEAR(CURDATE()) ";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damagecount'][$ctr] = $row['damagecount'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		
			function ShowDamageReportcountBrgy($dr)
		{
			$sql = "SELECT COUNT(`damage_report`.`damrep_id`) AS damagecount FROM `damage_report` where brgy_id='".$dr->getbrgy_id()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['damagecount'][$ctr] = $row['damagecount'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}		
		
		
		// show specific tourist info
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