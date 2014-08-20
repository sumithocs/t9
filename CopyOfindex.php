<?php 
class T9Dictionary{
	
	
	/*	@param string $input - numbers 0-9, pressed by user
	*	@return array - list of possible words
	*	function gets Possible Words ($input) 
	*/	
	function getPossibleWords($string)
	{
		$t9 = array(			
			2 => array('a','b','c'),
			3 => array('d','e','f'),
			4 => array('g','h','i'),
			5 => array('j','k','l'),
			6 => array('m','n','o'),
			7 => array('p','q','r','s'),
			8 => array('t','u','v'),
			9 => array('w','x','y','z')
		);
		
		//convert the input string to an array
		$string_array = str_split($string);
		
		//define the output 
		$results = array();
		
		//going through each item of input
		foreach($string_array as $string)
		{	
			//get the releven character set for $string from $t9 array				
			$input_t9_macth = $t9[$string];
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


	
	/* I create this for additionaly 
	if the last selected characters will send with the request(actual scenario)
	then the new key entry has to match with previous results */
	
	public function getPossibleWordsProgressive($prev_word='',$t9_key)
	{ 
		$t9 = array(
			2 => array('a','b','c'),
			3 => array('d','e','f'),
			4 => array('g','h','i'),
			5 => array('j','k','l'),
			6 => array('m','n','o'),
			7 => array('p','q','r','s'),
			8 => array('t','u','v'),
			9 => array('w','x','y','z')
		);
		
		$t9_val = $t9[$t9_key]; 
		$results = array(); 
			foreach($t9_val as $letter)
			{ 
				$results[] = $prev_word.$letter; //TODO: this words can be filterd using dictionary 
			} 
			return $results;		
	}

}

$t9Obj = new T9Dictionary();
$res = $t9Obj->getPossibleWords("70136");
$res2 = $t9Obj->getPossibleWordsProgressive("ca","2");
echo "<pre>";print_r($res);echo "</pre>";
echo "<pre>";print_r($res2);echo "</pre>";
?>