<?php

namespace Timy;

class DurationFormatter implements DurationFormatterInterface
{
    public const SECOND = 1;
    public const MINUTE = 60;
    public const HOUR = 60 * self::MINUTE;
    public const DAY = 24 * self::HOUR;
    public const YEAR = 365 * self::DAY;
    /**
     * Format seconds to human-friendly
     *
     * @param int $seconds
     * @return string
     */
    public function format(int $seconds): string
    {
        if ($seconds < 0) {
            throw new \InvalidArgumentException("Seconds must be a non-negative integer.");
        }

        if ($seconds == 0) {
            return 'now';
        }

        $units = $this->getUnits();
        $parts = $this->getParts($seconds, $units);
        return $this->formatParts($parts);
    }

    /**
     * Get time units
     *
     * @return array
     */
    private function getUnits(): array
    {
        return [
            'year' => self::YEAR,
            'day' => self::DAY,
            'hour' => self::HOUR,
            'minute' => self::MINUTE,
            'second' => self::SECOND,
        ];
    }

    /**
     * Collect time values and labels
     *
     * @param int $seconds
     * @param array $units
     * @return array
     */
    private function getParts(int $seconds, array $units): array
    {
        $parts = [];

        foreach ($units as $name => $unitSeconds) {
            if ($seconds >= $unitSeconds) {
                $value = intdiv($seconds, $unitSeconds);
                $seconds %= $unitSeconds;

                $label = $value === 1 ? $name : $name . 's';
                $parts[] = "$value $label";
            }
        }

        return $parts;
    }

    /**
     * Format parts to readable format.
     *
     * @param array $parts
     * @return string
     */
    private function formatParts(array $parts): string
    {
        $count = count($parts);

        if ($count === 1) {
            return $parts[0];
        }

        $last = array_pop($parts);
        return implode(', ', $parts) . ' and ' . $last;
    }
}