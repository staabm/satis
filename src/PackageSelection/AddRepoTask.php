<?php

/*
 * This file is part of composer/satis.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\Satis\PackageSelection;

use Amp\Parallel\Worker\Environment;
use Amp\Parallel\Worker\Task;

class AddRepoTask implements Task {
    private $repo, $pool;

    public function __construct($pool, $repo) {
        $this->pool = $pool;
        $this->repo = $repo;
    }

    /**
     * {@inheritdoc}
     */
    public function run(Environment $environment) {
        $this->pool->addRepository($this->repo);
        return $this->pool;
    }
}
