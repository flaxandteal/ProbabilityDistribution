<?php
 
namespace mcordingley\ProbabilityDistribution\Continuous;

/**
 * Pareto
 * 
 * Also known as the Bradford distribution, this is a power-law distribution.
 * It is frequently used to model the distribution of wealth, popularity,
 * population, etc.
 * 
 * For more information, see: http://en.wikipedia.org/wiki/Pareto_distribution
 */
class Pareto extends AbstractContinuousProbabilityDistribution
{
    protected $minimum;
    protected $alpha;
    
    /**
     * __construct
     * 
     * @param float $minimum The minimum value that the distribution can take on
     * @param float $alpha The shape parameter
     */
    public function __construct($minimum = 1.0, $alpha = 1.0)
    {
        $this->minimum = $minimum;
        $this->alpha = $alpha;
    }
    
    public function getPdf($x)
    {
        if ($x >= $this->minimum) {
            return $this->alpha * pow($this->minimum, $this->alpha) / pow($x, $this->alpha + 1);
        } else {
            return 0.0;
        }
    }
    
    public function getCdf($x)
    {
        if ($x >= $this->minimum) {
            return 1 - pow($this->minimum / $x, $this->alpha);
        } else {
            return 0.0;
        }
    }
    
    public function getPpf($x)
    {
        return $this->minimum / pow(1 - $x, 1 / $this->alpha);
    }
    
    public function getMean()
    {
        if ($this->alpha > 1) {
            return ($this->alpha * $this->minimum) / ($this->alpha - 1);
        } else {
            return NAN;
        }
    }
    
    public function getVariance()
    {
        if ($this->alpha > 2) {
            return (pow($this->minimum, 2) * $this->alpha) / (pow($this->alpha - 1, 2) * ($this->alpha - 2));
        } else {
            return NAN;
        }
    }
    
    public function getSkew()
    {
        if ($this->alpha > 3) {
            return ((2 + 2 * $this->alpha) / ($this->alpha - 3)) * sqrt(($this->alpha - 2) / $this->alpha);
        } else {
            return NAN;
        }
    }

    public function getKurtosis()
    {
        if ($this->alpha > 4) {
            return (6 * (pow($this->alpha, 3) + pow($this->alpha, 2) - 6 * $this->alpha - 2)) / ($this->alpha * ($this->alpha - 3) * ($this->alpha - 4));
        } else {
            return NAN;
        }
    }
    
    public function generateRandomVariate()
    {
        return $this->minimum / pow(static::generateRandomFloat(), 1 / $this->alpha);
    }
}