<?php 

	/* Assumptions and notes
	 * 
	 * 1. Input will be a string but will only get 0-9
	 * 2. Will output all the combinations 
	 * 3. Actual word are not filtered using any Dicionary file
	 * 4. getPossibleWordsProgressive function is additionaly implemented 
	 * 
	 * */
	
	class T9Dictionary{
		
		protected $t9 = array(			
				2 => array('a','b','c'),
				3 => array('d','e','f'),
				4 => array('g','h','i'),
				5 => array('j','k','l'),
				6 => array('m','n','o'),
				7 => array('p','q','r','s'),
				8 => array('t','u','v'),
				9 => array('w','x','y','z')
		);
		
		/*	@param string $input - numbers 0-9, pressed by user
		*	@return array - list of possible words
		*	function gets Possible Words ($input) 
		*/	
		function getPossibleWords($string)
		{		
			//convert the input string to an array
			$string_array = str_split($string);
			
			//define the output 
			$results = array();
			
			//going through each item of input
			foreach($string_array as $string)
			{			
				//skip for 0 and 1
				if($string =="0" || $string =="1"){
					continue;
				}
				//get the releven character set for $string from $t9 array				
				$input_t9_macth = $this->t9[$string];
				$new_results = array();
				//going through each character of selected t9 element
				foreach($input_t9_macth as $val)
				{
					if(!empty($results))
					{	
						//keep concatanating to the each element of result
						foreach($results as $res)
						{
							$new_results[] = $res.$val;
						}			
					}
					else
					{
						//initially no concatanating required
						$new_results[] = $val;
					}
				}
				$results = $new_results;
			}
			
			return $results;//TODO: this results can be filterd using dictionary
				
		}
		
		/* I create this function additionaly
		 * 	if the last selected characters will send with the request(most likely scenario)
		 * 	then the new key entry has to match with previous results 
		*/
		
		public function getPossibleWordsProgressive($prv_res = "",$t9_key)
		{ 
			//skip for 0 and 1
			if($t9_key =="0" || $t9_key =="1"){
				return;
			}
			
			$t9_val = $this->t9[$t9_key]; 
			
			$results = array();
				foreach($t9_val as $letter)
				{ 
					$results[] = $prv_res.$letter; //TODO: this words can be filterd using dictionary 
				} 
				return $results;		
		}
	
	}
	
	/* 
	 * since input is mentioned @param string $input - numbers 0-9, pressed by user
	 * did not check for is_int($input)
	*/
	$t9Obj = new T9Dictionary();
	$res = $t9Obj->getPossibleWords("710366");
	echo "<pre>";print_r($res);echo "</pre>";
	
	//$res2 = $t9Obj->getPossibleWordsProgressive("ca","8");
	//echo "<pre>";print_r($res2);echo "</pre>";
?>