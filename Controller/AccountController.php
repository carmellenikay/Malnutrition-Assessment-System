<?php
//this is the person controller
error_reporting(E_ALL & ~E_NOTICE);

class AccountController 

{
    var $con;
    function __construct() //use to initialize variables
    {
		include 'connection.php';
    }

   function Login($act)
		{
			$username = $act->getusername();
			$password = $act->getpassword();

			$sql = "
			SELECT * FROM account,`resident`,`barangay` WHERE  username = '".$username."' AND PASSWORD = '".$password."' and `account`.`res_id`=`resident`.`res_id` AND `resident`.`brgy_id`=`barangay`.`b_id`";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['user_id'][$ctr] = $row['user_id'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$data['access_level'][$ctr] = $row['access_level'];
					$data['status'][$ctr] = $row['status'];
					$data['brgy'][$ctr] = $row['brgy_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$_SESSION['access_level']=$row['access_level'];
					$_SESSION['user_id']=$row['user_id'];
					$_SESSION['brgy_id']=$row['brgy_id'];
					$_SESSION['fullname']=$row['fullname'];
					
					if($data['access_level'][$ctr]=="Apsemo" AND $data['status'][$ctr]=="Active"){
						$_SESSION['access_level']=$row['access_level'];
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['username']=$row['username'];
						echo "<script>alert('Successfully Login')</script>";
						echo "<meta http-equiv='refresh'content='0;url=apsemo_index.php'>";			
					}
					else if($data['access_level'][$ctr]=="Admin" AND $data['status'][$ctr]=="Active"){
						$_SESSION['access_level']=$row['access_level'];
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['username']=$row['username'];
						echo "<script>alert('Successfully Login')</script>";
						echo "<meta http-equiv='refresh'content='0;url=index.php'>";				
					}
					else if($data['access_level'][$ctr]=="Chairman" AND $data['status'][$ctr]=="Active"){
						$_SESSION['access_level']=$row['access_level'];
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['username']=$row['username'];
						$_SESSION['brgy']=$row['brgy'];
						echo "<script>alert('Successfully Login')</script>";
						echo "<meta http-equiv='refresh'content='0;url=chairman_index.php'>";				
					}
					else if($data['access_level'][$ctr]=="Kagawad" AND $data['status'][$ctr]=="Active"){
						$_SESSION['access_level']=$row['access_level'];
						$_SESSION['user_id']=$row['user_id'];
						$_SESSION['username']=$row['username'];
						$_SESSION['brgy']=$row['brgy'];
						echo "<script>alert('Successfully Login')</script>";
						echo "<meta http-equiv='refresh'content='0;url=Kagawad_index.php'>";				
					}
					else{
						echo "<script>alert('Account is not Active!')</script>";
						echo "<meta http-equiv='refresh'content='0;url=admin-home.php'>";
						
					}
					$ctr++;
					
					$data['count'] = $ctr;
				}		
				return $data;
			}
			else
			{
			  echo "<script>alert('Login Failed')</script>";
		
		      echo "<meta http-equiv='refresh'content='0;url=page-login.php'>";	
			}
			
			$this->con->close();
		}
	function addAccount($ac)
		{
			$ac_level="Chairman";
			$uname = $ac->getusername();
			$upass = $ac->getpassword();
			
			$sql = "INSERT into account(username, password, access_level, user_id, res_id)
				VALUES('".$ac->getusername()."','".$ac->getpassword()."','Chairman','".$ac->getuser_id()."','".$ac->getres_id()."')";
				$this->con->query($sql);
				
				echo "<script>alert('One Record Was Successfully Added')</script>";
				echo "<meta http-equiv='refresh'content='0;url=accountinfo.php'>";
				//$this->con->close();	
		}
		
	function addKagawadAccount($ac)
		{
			$sqlcheckid = "select * from account where res_id='".$ac->getres_id()."' ";
			$result = $this->con->query($sqlcheckid);
			if ($result->num_rows > 0) {
				echo "<script>alert('Creating Account Failed, ID already Exist!')</script>";
				echo "<meta http-equiv='refresh'content='0;url=addkagawadBrgy.php'>";
			}
			else{
				echo $ac_level="Kagawad";
			echo $uname = $ac->getusername();
			echo $upass = $ac->getpassword();
			$sql = "INSERT into account(username, password, access_level,  res_id)
				VALUES('".$ac->getusername()."','".$ac->getpassword()."','Kagawad','".$ac->getres_id()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Kagawad Account Successfully Created')</script>";
				echo "<meta http-equiv='refresh'content='0;url=kagawadBrgy.php'>";
				//$this->con->close();
			}
		}	
		function addChairmanAccount($ac)
		{
			$sqlcheckid = "select * from account where res_id='".$ac->getres_id()."' ";
			$result = $this->con->query($sqlcheckid);
			if ($result->num_rows > 0) {
				echo "<script>alert('Creating Account Failed, ID already Exist!')</script>";
				echo "<meta http-equiv='refresh'content='0;url=addAccountchairman.php'>";
			}
			else{
				echo $ac_level="Chairman";
			echo $uname = $ac->getusername();
			echo $upass = $ac->getpassword();
			$sql = "INSERT into account(username, password, access_level,  res_id)
				VALUES('".$ac->getusername()."','".$ac->getpassword()."','Chairman','".$ac->getres_id()."')";
				$this->con->query($sql);
				
				echo "<script>alert('Chairperson Account Successfully Created')</script>";
				echo "<meta http-equiv='refresh'content='0;url=brgyChairmanAccount.php'>";
				//$this->con->close();
			}
		}		
	function addCompany($act)
		{
			
			$sql = "INSERT into account(company,access_level, ro_id)
				VALUES('".$act->getCompany()."', '".$act->getAccessLevel()."', '".$act->getroId()."' )";
				$this->con->query($sql);
				
				echo "<script>alert('One Record Was Successfully Added')</script>";
				echo "<meta http-equiv='refresh'content='0;url=Uaccounts.php'>";
				$this->con->close();	
		}
		
	function showAccount()
		{
			$sql = "SELECT * FROM account";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['account_id'][$ctr] = $row['account_id'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$data['access_level'][$ctr] = $row['access_level'];
					$data['status'][$ctr] = $row['status'];
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}	
	
	function showApsemoAccount()
		{
			$sql = "SELECT * FROM apsemo_account";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['ap_id'][$ctr] = $row['ap_id'];
					$data['fullname'][$ctr] = $row['fullname'];
					$data['position'][$ctr] = $row['password'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
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
	function TotalAccount()
		{
			$sql = "SELECT COUNT(`account`.`a_id`) AS totalAccount FROM `account` WHERE `account`.`access_level`='Client'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$dataAcc = array();
				$ctrAcc = 0;
				
				while($row = $result->fetch_assoc())
				{
					$dataAcc['totalAccount'][$ctrAcc] = $row['totalAccount'];
				

					$ctrAcc++;
					
					$dataAcc['count'] = $ctrAcc;
				}
				
				return $dataAcc;
			}
			
			//$this->con->close();
		}
		
		function TotalRoAccount($act)
		{
			$sql = "SELECT COUNT(`account`.`a_id`) AS totalroAccount FROM `account` WHERE `account`.`access_level`='Client' AND ro_id='".$act->getroId()."'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$dataroAcc = array();
				$ctrroAcc = 0;
				
				while($row = $result->fetch_assoc())
				{
					$dataroAcc['totalroAccount'][$ctrroAcc] = $row['totalroAccount'];
				

					$ctrroAcc++;
					
					$dataroAcc['count'] = $ctrroAcc;
				}
				
				return $dataroAcc;
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
	
	function ClientInfo()
		{
			$sql = "SELECT * FROM account where access_level='Client'";
			
			$result = $this->con->query($sql);
			
			if($result->num_rows > 0)
			{
				$data = array();
				$ctr = 0;
				
				while($row = $result->fetch_assoc())
				{
					$data['a_id'][$ctr] = $row['a_id'];
					$data['username'][$ctr] = $row['username'];
					$data['password'][$ctr] = $row['password'];
					$data['ac_name'][$ctr] = $row['ac_name'];
					$data['access_level'][$ctr] = $row['access_level'];
					$data['status'][$ctr] = $row['status'];
					$data['company'][$ctr] = $row['company'];
					
					$ctr++;
					
					$data['count'] = $ctr;
				}
				
				return $data;
			}
			
			//$this->con->close();
		}
		function ValidateUser($act){
			
			$sql = "SELECT * FROM account where username='".$act->getUsername()."'";
			$result = $this->con->query($sql);
			
		}
		
		
		
		
}

?>