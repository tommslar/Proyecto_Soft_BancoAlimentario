<?php
	
	function validate_email($email){	           
	           return filter_var($mail, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $mail);		    
    }
	
   function validate_url($url){     
	      return  filter_var($url, FILTER_VALIDATE_URL); 
	}	

    function validate_numero($num){
	return filter_var($num,FILTER_VALIDATE_INT) && preg_match('/^[0-9]*$/', $num);
	}
    
	function sanitize_cadena($str){
	        return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
    }
	
	function sanitize_numero($num){
	return filter_var($num,FILTER_SANITIZE_NUMBER_INT);
	}
	
	function sanitize_email($email){
	      return filter_var($email, FILTER_SANITIZE_EMAIL);
	}
	
	function sanitize_url($url){
	      return filter_var($url, FILTER_SANITIZE_URL);;
	}
?>