<?php

namespace Katanox;

class Version
{
    public const MAJOR = 3;
    public const MINOR = 2;
    public const PATCH = 4;

    public static function get()
    {
        return sprintf('%d.%d.%d', self::MAJOR, self::MINOR, self::PATCH);
    }
}
