<?php
 
namespace mcordingley\ProbabilityDistribution\Discrete;

/**
 * Binomial
 * 
 * The Binomial distribution is a distribution that represents the
 * number of successes in a larger number of Bernoulli trials.
 *
 * For more information, see: http://en.wikipedia.org/wiki/Binomial_distribution
 */
class Binomial extends AbstractDiscreteProbabilityDistribution
{
    /**
     * The number of Bernoulli trials in this distribution
     * 
     * @var int
     */
    protected $n;
    
    /**
     * The probability of success for each Bernoulli trial. A float in the range
     * (0, 1).
     * 
     * @var float
     */
    protected $p;
    
    /**
     * __construct
     *
     * @param float $p The probability of success in a single trial
     * @param int $n The number of trials
     */
    public function __construct($p = 0.5, $n = 1)
    {
        $this->p = $p;
        $this->n = $n;
    }
    
    public function getPdf($x)
    {
        return ncr($this->n, $x) * pow($this->p, $x) * pow(1 - $this->p, $this->n - $x);
    }
    
    public function getMean()
    {
        return $this->n * $this->p;
    }
    
    public function getVariance()
    {
        return $this->n * $this->p * (1 - $this->p);
    }
    
    public function getSkew()
    {
        return (1 - 2 * $this->p) / sqrt($this->n * $this->p * (1 - $this->p));
    }
    
    public function getKurtosis()
    {
        return (1 - 6 * $this->p * (1 - $this->p)) / ($this->n * $this->p * (1 - $this->p));
    }

    public function generateRandomVariate()
    {
        $successes = 0;

        for ($i = 0; $i < $this->n; $i++) {
            if (mt_rand() / mt_getrandmax() <= $this->p) {
                $successes++;
            }
        }

        return $successes;
    }
}