<?php
class User {

	private $m_sUserName;
	private $m_sUserEmail;
	private $m_sUserAvatar;
	public function __set($p_sProperty, $p_vValue) {
		switch($p_sProperty) {
			case "Username" :
				$this -> m_sUserName = $p_vValue;
				break;

			case "Email" :
				$this -> m_sUserEmail = $p_vValue;
				break;
			case "Avatar" :
				$this -> m_sAvatar = $p_vValue;
				break;
		}

	}

	public function __get($p_sProperty) {
		$vResult = null;
		switch($p_sProperty) {
			case "Username" :
				$vResult = $this -> m_sUserName;
				break;

			case "Email" :
				$vResult = $this -> m_sUserEmail;
				break;

			case "Avatar" :
				$vResult = $this -> m_sUserAvatar;
				break;
		}
		return $vResult;
	}

	public function UsernameAvailable() {
		include ("Connection.php");
		//open connection to Dbase

		$sSql = "SELECT user_id FROM tblUsers WHERE user_name 
				= '" . $link -> real_escape_string($this -> m_sUserName) . "';";

		$vResult = $link -> query($sSql);
		if ($vResult -> num_rows > 0) {
			return false;
		} else {
			return true;
		}

		$link -> close();
		//mysqli_close($link); //close connection with Dbase
	}

	public function CreateUsername() {
		include ("Connection.php");
		if (isset($_POST['inp_password_name']) && isset($_POST['inp_email_name'])) {
			//0 - velden uitlezen
			$password = md5($link -> real_escape_string($_POST['inp_password_name']));
			$email = $link -> real_escape_string($_POST['inp_email_name']);
		}

		$sSql = "INSERT INTO tblUsers (user_name,user_password,user_email) VALUES ('" . mysqli_real_escape_string($link, $this -> m_sUserName) . "','$password','$email');";

		if ($rResult = mysqli_query($link, $sSql)) {
			//query went OK
		} else {
			echo $sSql;
			// er zijn geen query resultaten, dus query is gefaald
			throw new Exception('Couldn\'t create your account!');
		}
		mysqli_close($link);
	}

	public function getUserInfo($p_sUserId) {
		include ("Connection.php");
		$sSql = "SELECT user_id, user_name, user_email, user_avatar FROM tblUsers
				WHERE user_id = " . $p_sUserId;
		$rResult = mysqli_query($link, $sSql);
		if (!$rResult) {
			throw new Exception("Could not get profile info");
		} else {
			return $rResult;
		}
		mysqli_close($link);
	}

}
?>