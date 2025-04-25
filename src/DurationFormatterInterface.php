<?php

namespace FerencBalogh\Timy;

interface DurationFormatterInterface
{
    public function format(int $seconds): string;
}