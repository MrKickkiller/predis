<?php

/*
 * This file is part of the Predis package.
 *
 * (c) 2009-2020 Daniele Alessandri
 * (c) 2021-2023 Till Krüss
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Command\Redis\TDigest;

use Predis\Command\Command as RedisCommand;

/**
 * @see https://redis.io/commands/tdigest.trimmed_mean/
 *
 * Returns an estimation of the mean value from the sketch,
 * excluding observation values outside the low and high cutoff quantiles.
 */
class TDIGESTTRIMMED_MEAN extends RedisCommand
{
    public function getId()
    {
        return 'TDIGEST.TRIMMED_MEAN';
    }

    /**
     * {@inheritdoc}
     */
    public function parseResponse($data)
    {
        // convert Relay (RESP3) constants to strings
        switch ($data) {
            case INF: return 'inf';
            case -INF: return '-inf';
            case is_nan($data): return 'nan';
            default: return $data;
        }
    }
}
