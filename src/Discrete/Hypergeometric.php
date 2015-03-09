<?php
 
namespace mcordingley\ProbabilityDistribution\Discrete;

/**
 * Hypergeometric class
 * 
 * The hypergeometric distribution is the probability of selecting a certain
 * number of objects of interest from a population with some larger number of
 * objects of interest.
 * 
 * For more information, see: http://en.wikipedia.org/wiki/Hypergeometric_distribution
 */
class Hypergeometric extends AbstractDiscreteProbabilityDistribution
{
    protected $L;
    protected $m;
    protected $n;
    
    /**
     * __construct
     * 
     * @param int $L The population size
     * @param int $m The number of interesting elements in the population
     * @param int $n The number of draws from the population.
     */
    public function __construct($L = 1, $m = 1, $n = 1)
    {
        $this->L = $L;
        $this->m = $m;
        $this->n = $n;
    }
    
    public function getPdf($x)
    {    
        if ($x > $this->L
         || $x > $this->m
         || $x > $this->n
         || $x < 0
         || $this->L < 1
         || $this->m < 0
         || $this->n < 0
        ) return 0;
        
        return (ncr($this->m, $x) * ncr($this->L - $this->m, $this->n - $x)) / ncr($this->L, $this->n);
    }
    
    public function getMean()
    {
        return ($this->n * $this->m) / $this->L;
    }
    
    public function getVariance()
    {
        return $this->n * ($this->m / $this->L) * (($this->L - $this->m) / $this->L) * (($this->L - $this->n) / ($this->L - 1));
    }
    
    public function getSkew()
    {
        return (($this->L - 2 * $this->m) * pow($this->L - 1, .5) * ($this->L - 2 * $this->n)) / (pow($this->n * $this->m * ($this->L - $this->m) * ($this->L - $this->n), .5) * ($this->L - 2));
    }

    public function getKurtosis()
    {
        return (($this->L - 1) * pow($this->L, 2) * ($this->L * ($this->L + 1) - 6 * $this->m * ($this->L - $this->m) - 6 * $this->n * ($this->L - $this->n)) + 6 * $this->m * $this->n * ($this->L - $this->m) * ($this->L - $this->n) * (5 * $this->L - 6)) / ($this->n * $this->m * ($this->L - $this->m) * ($this->L - $this->n) * ($this->L - 2) * ($this->L - 3));
    }
    
    public function generateRandomVariate()
    {
        $L = $this->L;
        $m = $this->m;
        
        $successes = 0;
        
        for ($i = 0; $i < $this->n; $i++) {
            if (static::generateRandomFloat() <= $m / $L) {
                $m--;
                $successes++;
            }
            
            $L--;
        }
        
        return $successes;
    }
}