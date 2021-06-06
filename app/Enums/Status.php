<?php


namespace App\Enums;
use BenSampo\Enum\Enum;


class Status extends Enum
{
 const ACTIVE = 1;
 const DEACTIVE = 0;
 const DELETE = -1;
}
