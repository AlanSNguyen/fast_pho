<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserGenderEnum extends Enum
{
    const MALE = 0;
    const FEMALE = 1;

    public static function arrayView()
    {
        return [
            'Nam' => self::MALE,
            'Nữ' => self::FEMALE,
        ];
    }
}
