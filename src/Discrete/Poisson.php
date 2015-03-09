<?php
 
namespace mcordingley\ProbabilityDistribution\Discrete;

/**
 * Poisson class
 * 
 * Represents the number of independent, exponentially-distributed events that
 * occur in a fixed interval.  
 *
 * For more information, see: http://en.wikipedia.org/wiki/Poisson_distribution
 */
class Poisson extends AbstractDiscreteProbabilityDistribution
{
    /**
     * The average number of arrivals
     * 
     * @var float
     */
    protected $lambda;

    /**
     * __construct
     * 
     * @param float $lambda The average number of arrivals
     */
    public function __construct($lambda)
    {
        $this->lambda = $lambda;
    }
    
    public function getPdf($x)
    {
        return exp(-$this->lambda) * pow($this->lambda, $x) / fact($x);
    }
    
    public function getMean()
    {
        return $this->lambda;
    }
    
    public function getVariance()
    {
        return $this->lambda;
    }
    
    public function getSkew()
    {
        return pow($this->lambda, -0.5);
    }

    public function getKurtosis()
    {
        return 1.0 / $this->lambda;
    }
    
    public function generateRandomVariate()
    {
        $l = exp(-$this->lambda);
        $k = 0;
        $p = 1;

        do {
            $k++;
            $u = static::generateRandomFloat();
            $p *= $u;
        } while ($p > $l);

        return $k - 1;
    }
}
