<?php

namespace Enflow\TwigBladeLoader;

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\Str;

class BladeRenderer
{
    public function render(string $contents, array $context = []): string
    {
        $fileHash = md5($contents);
        $tempFile = sprintf('%s/%s.blade.php', $this->tempDirectory(), $fileHash);

        file_put_contents($tempFile, $contents);

        return view(Str::before($fileHash, '.blade.php'), $context)->render();
    }

    private function tempDirectory(): string
    {
        $directory = sys_get_temp_dir();

        if (! in_array($directory, ViewFacade::getFinder()->getPaths())) {
            ViewFacade::addLocation($directory);
        }

        return $directory;
    }
}
