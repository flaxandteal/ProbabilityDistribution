Probability Distribution
========================

[![Build Status](https://api.travis-ci.org/repositories/mcordingley/ProbabilityDistribution.svg)](https://travis-ci.org/mcordingley/ProbabilityDistribution)

In-progress split of the probability distributions from PHPStats into their own
project.

## Help This Project!

The biggest blocker to getting good statistical software working in PHP is the
lack of the special mathematical functions in PHP. We need things like `gamma`,
`digamma`, `beta`, et al to be able to implement a number of the distributions
here. Commonly-used distributions, like the F distribution and Student's t
distribution absolutely require these functions to be able to work.

The old PHPStats library does have implementations of these, but I cannot
account for their accuracy. What this project needs to succeed are new
implementations in a separate PHP package that are of high quality. Making this
happen is beyond my ability.

Ideally, they would be implemented in the global namespace ---as if PHP had them
natively--- and their definitions bracketed by `if (!function_exists('foo')) {`
guard clauses, so the library is effectively a shim for functions that we wish
PHP had. It'd also be nice to have an RFC submitted to PHP internals to make the
functions eventually _be_ native.