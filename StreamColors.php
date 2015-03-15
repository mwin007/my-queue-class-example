<?php
require 'ColorQueue.php';
/**
* 
*/
class StreamColors 
{
	public function colorStream()
	{
		ob_clean();
		$count = 0;
		$runColorQueue = new ColorQueue;
		for ($i=0; $i<2; $i++) {
			$randColor = $runColorQueue->randomColor();
			$runColorQueue->putInQueue($randColor);	
		}
		while (1) {
			$randColor = $runColorQueue->randomColor();
			echo $randColor."\n";
			$runColorQueue->putInQueue($randColor);
			$firstOut = $runColorQueue->getItem2Process();
			$firstOutArray = array($firstOut);
			$firstOutJsonEn = json_encode($firstOutArray);
			$fp = fopen('result.json', 'w') or die("Unable to open file!");
			fwrite($fp, $firstOut);
			fclose($fp);
			$runColorQueue->firstInProcessed();
			echo $count;
			if ($count > 100000) {
				break;
			}
			$count++;
			usleep(2000000);
		}
		ob_clean();
	}

}


$run = new StreamColors;
$run->colorStream();

