<?php

namespace mcordingley\ProbabilityDistribution\Continuous;

use mcordingley\ProbabilityDistribution\ProbabilityDistributionInterface;

/**
 * Uniform
 * 
 * Represents the continuous uniform distribution, a distribution that 
 * represents equiprobable outcomes on a continuous space.
 *
 * For more information, see: http://en.wikipedia.org/wiki/Uniform_distribution_%28continuous%29
 */
class Uniform implements ProbabilityDistributionInterface
{
	protected $minimum;
	protected $maximum;
	
    /**
     * __construct
     *
     * @param float $minimum The minimum value that the distribution can take on
     * @param float $maximum The maximum value that the distribution can take on
     */
    public function __construct($minimum = 0.0, $maximum = 1.0)
    {
        $this->minimum = $minimum;
        $this->maximum = $maximum;
    }
    
	public function getPdf($x)
    {
		if ($x >= $this->minimum && $x <= $this->maximum) {
            return 1.0 / ($this->maximum - $this->minimum);
        } else {
            return 0.0;
        }
	}
	
	public function getCdf($x)
    {
		if ($x >= $this->minimum && $x <= $this->maximum) {
            return ($x - $this->minimum) / ($this->maximum - $this->minimum);
        } elseif ($x > $this->maximum) {
            return 1.0;
        } else {
            return 0.0;
        }
	}
	
	public function getSf($x)
    {
		return 1.0 - $this->getCdf($x);
	}
	
	public function getPpf($x)
    {
		return $this->minimum + $x * ($this->maximum - $this->minimum);
	}
	
	public function getIsf($x)
    {
		return $this->getPpf(1.0 - $x);
	}
    
    public function getMean()
    {
		return 0.5 * ($this->maximum + $this->minimum);
    }
    
    public function getVariance()
    {
		return (1.0 / 12) * pow(($this->maximum - $this->minimum), 2);
    }
    
    public function getSkew()
    {
		return 0;
    }
	
	public function getKurtosis()
    {
		return -1.2;
	}
	
	public function generateRandomVariate()
    {
		return (mt_rand() / mt_getrandmax()) * ($this->maximum - $this->minimum) + $this->minimum;
	}
}
