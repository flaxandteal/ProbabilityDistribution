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
}