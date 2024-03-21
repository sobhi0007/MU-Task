<?php

namespace App\Enums;

class SocialNetworksEnum
{
    const FACEBOOK = 'facebook';
    const GOOGLE = 'google';

    public static function isExist($social): bool
    {
     return in_array($social , [self::FACEBOOK, self::GOOGLE]);
    }
}
