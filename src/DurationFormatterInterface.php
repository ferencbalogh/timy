<?php 

namespace Timy;

interface DurationFormatterInterface
{
    public function format(int $seconds): string;
}