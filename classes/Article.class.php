<?php

class Article {
	private $m_sTitle;
	private $m_sText;
	private $m_sImage;
	private $m_sSource;
	private $m_sDate;
	private $m_iUserID;

	public function __set($p_sProperty, $p_vValue) {
		switch ($p_sProperty) {
			case 'Title' :
				$this -> m_sTitle = $p_vValue;
				break;

			case 'Text' :
				$this -> m_sText = $p_vValue;
				break;
			case 'Image' :
				$this -> m_sImage = $p_vValue;
				break;
			case 'Source' :
				$this -> m_sSource = $p_vValue;
				break;
			case 'Date' :
				$this -> m_sDate = $p_vValue;
				break;
			default :
				echo "SETTING " . $p_sProperty . " FAILED";
				break;
		}

	}

	public function __get($p_sProperty) {
		switch ($p_sProperty) {
			case 'Title' :
				return $this -> m_sTitle;
				break;

			case 'Text' :
				return $this -> m_sText;
				break;

			case 'Image' :
				return $this -> m_sImage;
				break;

			case 'Source' :
				return $this -> m_sSource;
				break;

			case 'Date' :
				return $this -> m_sDate;
				break;

			default :
				echo "GETTING " . $p_sProperty . " FAILED";
				break;
		}
	}

	public function getUserArticles($p_iId) {
		include ("Connection.php");

		$sSql = "SELECT * FROM tblSaved WHERE fk_user_id = " . $p_iId;
		$rResult = mysqli_query($link, $sSql);
		if (!$rResult) {
			throw new Exception("Could not get your articles.");
		} else {
			return $rResult;
		}
		mysqli_close($link);
	}

}
?>
