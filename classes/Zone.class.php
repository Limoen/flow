<?php

class Zone {
	private $m_sName;
	private $m_sImage;
	private $m_iZoneID;
	private $m_iUserID;

	public function __set($p_sProperty, $p_vValue) {
		switch ($p_sProperty) {
			case 'Name' :
				$this -> m_sName = $p_vValue;
				break;

			case 'Image' :
				$this -> m_sName = $p_vValue;
				break;
			default :
				echo "SETTING " . $p_sProperty . " FAILED";
				break;
		}

	}

	public function __get($p_sProperty) {
		switch ($p_sProperty) {
			case 'Name' :
				return $this -> m_sName;
				break;

			case 'Image' :
				return $this -> m_sName;
				break;

			default :
				echo "GETTING " . $p_sProperty . " FAILED";
				break;
		}
	}

	public function getAllZones() {
		include ("Connection.php");

		$sSql = "SELECT * from tblZones";
		$rResult = $link -> query($sSql);
		if (!$rResult) {
			throw new Exception("Sorry, could't find the zones.");

		} else {
			return $rResult;
		}
		mysqli_close($link);
	}

	public function getUserZones($p_iId) {
		include ("Connection.php");

		$sSql = "SELECT * FROM tblZones WHERE zone_id 
				IN (SELECT zone_id FROM tblUserZones WHERE fk_user_id =" . $p_iId . ")";
		$rResult = mysqli_query($link, $sSql);
		if (!$rResult) {
			throw new Exception("Could not get your zones.");
		} else {
			return $rResult;
		}
		mysqli_close($link);
	}

	public function addZone($p_iId, $p_iZoneID) {
		include ("Connection.php");
		$sSql = "SELECT * FROM tblUserZones
				WHERE fk_user_id = " . $p_iId . " AND zone_id = " . $p_iZoneID;

		$rResult = mysqli_query($link, $sSql);
		if (!$rResult) {
			throw new Exception("Sorry, we couldn't add the zone.");
		} else if ($rResult -> num_rows > 0) {
			throw new Exception("Zone already in database.");
		} else {
			$sSql = "INSERT INTO tblUserZones (zone_id, fk_user_id)
					VALUES	(" . $p_iZoneID . ", " . $p_iId . ");";
			$rResult = mysqli_query($link, $sSql);
			if (!$rResult) {
				throw new Exception("Sorry, we couldn't add the zone2.");
			}
		}
		mysqli_close($link);
	}

	public function deleteZone($p_iId, $p_iZoneID) {
		include ("Connection.php");
		$sSql = "DELETE FROM tblUserZones
				WHERE fk_user_id = " . $p_iId . " AND zone_id = " . $p_iZoneID;

		$rResult = mysqli_query($link, $sSql);
		if (!$rResult) {
			throw new Exception("Sorry, couldn't delete zone.");

		} else {
			return $rResult;
		}
		mysqli_close($link);
	}

}
?>
