<?php
 
namespace mcordingley\ProbabilityDistribution\Continuous;

/**
 * Exponential class
 * 
 * Represents the exponential distribution, which is the distribution of arrival
 * times from a Poisson process.
 *
 * For more information, see: http://en.wikipedia.org/wiki/Exponential_distribution
 */
class Exponential extends AbstractContinuousProbabilityDistribution
{
    /**
     * The average arrival time of the Poisson process
     * 
     * @var float
     */
    protected $lambda;

    /**
     * __contruct
     *
     * @param float $lambda
     */
    public function __construct($lambda = 1.0)
    {
        $this->lambda = $lambda;
    }
    
    public function getPdf($x)
    {
        return $this->lambda * exp(-$this->lambda * $x);
    }
    
    public function getCdf($x)
    {
        return 1.0 - exp(-$this->lambda * $x);
    }
    
    public function getPpf($x)
    {
        return log(1 - $x) / -$this->lambda;
    }
    
    public function getMean()
    {
        return 1.0 / $this->lambda;
    }
    
    public function getVariance()
    {
        return pow($this->lambda, -2);
    }
    
    public function getSkew()
    {
        return 2;
    }
    
    public function getKurtosis()
    {
        return 6;
    }
    
    public function generateRandomVariate()
    {
        return -log(mt_rand() / mt_getrandmax()) / $this->lambda;
    }
}