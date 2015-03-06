<?php
 
namespace mcordingley\ProbabilityDistribution\Discrete;

use mcordingley\ProbabilityDistribution\AbstractProbabilityDistribution;

abstract class AbstractDiscreteProbabilityDistribution extends AbstractProbabilityDistribution
{
	public function getCdf($x)
    {
		$sum = 0;
        
		for ($count = 0; $count <= $x; $count++) {
			$sum += $this->getPdf($count);
		}
        
		return $sum;
	}
    
    public function getPpf($x)
    {
        if ($x >= 1) return INF; //Prevents infinite loops.
    
        $i = 0;
        $cdf = 0;
        
        while ($cdf < $x) {
            $cdf += $this->getPdf($i);
            $i++;
        }
        
        return $i - 1;
    }
}