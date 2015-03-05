<?php

namespace mcordingley\ProbabilityDistribution;

interface ProbabilityDistributionInterface
{
    public function getPdf($x);

    public function getCdf($x);
    
    public function getSf($x);
    
    public function getPpf($x);
    
    public function getIsf($x);
    
    public function getMean();
    
    public function getVariance();
    
    public function getSkew();
    
    public function getKurtosis();
    
    public function generateRandomVariate();
}