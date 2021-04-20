<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Myencrypt extends CI_Model{
		function xorcript($string, $tipe) {

			// Let's define our key here
			$key = ('vidya');

			// Our plaintext/ciphertext
			$text = $string;

			// Our output text
			$outText = '';
			if($tipe=="dec"){
				$text = base64_decode($text);
				for($i=0; $i<strlen($text); )
				{
					for($j=0; ($j<strlen($key) && $i<strlen($text)); $j++,$i++)
					{
						//echo $text{$i};
						//echo $key{$j};
						$outText .= $text{$i}^$key{$j};
						//echo 'i=' . $i . ', ' . 'j=' . $j . ', ' . $outText{$i} . '<br />'; // For debugging
					}
				}
				//need base64_decode($)
			} else{
			// Iterate through each character
				for($i=0; $i<strlen($text); )
				{
					for($j=0; ($j<strlen($key) && $i<strlen($text)); $j++,$i++)
					{
						//echo $text{$i};
						//echo $key{$j};
						$outText .= $text{$i}^$key{$j};
						//echo 'i=' . $i . ', ' . 'j=' . $j . ', ' . base64_encode($outText{$i}) . '<br />'; // For debugging
					}
				}
				$outText = base64_encode($outText);
			}
			
			return $outText;
		}
	}