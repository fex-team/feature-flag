<?php


class UaFeature extends Feature{

	private $type = "ua";

	public function getFlag(){
		if(isset($this->value)){
			$ua = $_SERVER['HTTP_USER_AGENT'];
			$regex = $this->value;
			if(preg_match($regex, $ua, $matches)){
			    return true;
			}else{
			    return false;
			}
		}else{
			return false;
		}
	}
}
?>