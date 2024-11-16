<?php

namespace App\Enums;

enum SupervisorDegree: string
{
    case Degree1 = 'استاذ دكتور';
    case Degree2 ='استاذ مشارك دكتور';
    case Degree3 = 'أستاذ مساعد دكتور';
    case Degree4 = 'مدرس مساعد )ماجستير(';
}
