<?php

namespace Katanox;

class Version
{
    public const MAJOR = 0;
    public const MINOR = 0;
    public const PATCH = 1;

    public static function get()
    {
        return sprintf('%d.%d.%d', self::MAJOR, self::MINOR, self::PATCH);
    }
}
