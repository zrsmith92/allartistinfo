<?php defined('SYSPATH') or die('No direct script access.');

class Str
{
	public static function diff($a, $b)
	{
		$d = array();
		$m = strlen($a);
		$n = strlen($b);
	
		$a = str_split(strtolower($a));
		$b = str_split(strtolower($b));
	
		for ( $i = 0; $i < $m; $i++ )
		{
			$d[$i] = array();
			$d[$i][0] = $i;
		}
	
		for ( $j = 0; $j < $n; $j++ )
		{
			$d[0][$j] = $j;
		}
	
		for ( $j = 1; $j < $n; $j++ )
		{
			for ( $i = 1; $i < $m; $i++ )
			{
				if ( $a[$i] == $b[$j] )
				{
					$d[$i][$j] = $d[$i - 1][$j - 1];
				}
				else
				{
					$d[$i][$j] = min( 	$d[$i - 1][$j] + 1,
										$d[$i][$j - 1] + 1,
										$d[$i - 1][$j - 1] + 1
									);
				}
			}
		}
	
		return $d[$m - 1][$n - 1] ? $d[$m - 1][$n - 1] : 0;
	}
	
    static function nl2p($string, $class = '') { 
        $class_attr = ($class != '') ? ' class="' . $class . '"' : ''; 
        return 
              '<p' . $class_attr . '>' 
            . preg_replace('#(<br\s*?/?>\s*?){2,}#', '</p>'."\n".'<p' . $class_attr . '>', nl2br($string, true)) 
            . '</p>'; 
    } 
		
}