<?php

namespace LyneTechnologies\Larablog\Commands;

use Illuminate\Console\Command;

class LarablogCommand extends Command
{
    public $signature = 'larablog';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
