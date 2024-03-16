<?php

namespace App\Enums;

enum Role: int
{
    case Admin = 1;
    case Store = 2;
    case Customer = 3;
}
