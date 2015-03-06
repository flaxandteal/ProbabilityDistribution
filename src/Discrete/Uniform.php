<?php

namespace mcordingley\ProbabilityDistribution\Discrete;

use mcordingley\ProbabilityDistribution\ProbabilityDistributionInterface;

/**
 * Uniform
 * 
 * Represents the discrete uniform distribution, which is a range of equiprobable
 * outcomes, such as rolling a single die.
 *
 * For more information, see: http://en.wikipedia.org/wiki/Uniform_distribution_%28discrete%29
 */
class Uniform implements ProbabilityDistributionInterface
{
    /**
     * The minimum value for this distribution
     * 
     * @var int
     */
	protected $minimum;
    
    /**
     * The maximum value for this distribution
     * 
     * @var int
     */
	protected $maximum;
	
	/**
	 * __construct 
	 *
	 * @param int $minimum The minimum value the distribution can take on
	 * @param int $maximum The maximum value the distribution can take on
	 */
	public function __construct($minimum = 0, $maximum = 1)
    {
		$this->minimum = $minimum;
		$this->maximum = $maximum;
	}
	
	public function getPdf($x)
    {
		if ($x >= $this->minimum && $x <= $this->maximum) {
            return 1.0 / ($this->maximum - $this->minimum + 1);
        } else {
            return 0.0;
        }
	}
	
	public function getCdf($x)
    {
		if ($x >= $this->minimum && $x <= $this->maximum) {
            return ($x - $this->minimum + 1) / ($this->maximum - $this->minimum + 1);
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
		return ceil($x * ($this->maximum - $this->minimum + 1));
	}
	
	public function getIsf($x)
    {
		return $this->getPpf(1.0 - $x) + 1;
	}
    
    public function getMean()
    {
		return 0.5 * ($this->maximum + $this->minimum);
    }
    
    public function getVariance()
    {
		return (1.0 / 12) * pow(($this->maximum - $this->minimum + 1), 2);
    }
	
    public function getSkew()
    {
		return 0;
    }
	
	public function getKurtosis()
    {
		return -(6.0 * (pow(($this->maximum - $this->minimum + 1), 2) + 1)) / (5.0 * (pow(($this->maximum - $this->minimum + 1), 2) - 1));
	}

	public function generateRandomVariate()
    {
		return mt_rand($this->minimum, $this->maximum);
	}
}