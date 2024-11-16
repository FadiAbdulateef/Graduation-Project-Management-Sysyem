<?php

namespace App\Enums;

use ReflectionClass;

enum ProjectState: string
{
    case Proposition = 'مقترح';
    case Approving = 'في إنتظار الأعتماد';
    case Rejected = 'مرفوض';
    case Stopped = 'متوقف';
    case Incomplete = 'قيد التطوير';
//    case Evaluating = 'قيد التقييم';
    case Complete = 'مكتمل';

//    public static function getRandomValue()
//    {
//        $oClass = new ReflectionClass(__CLASS__);
//        $constants = $oClass->getConstants();
//        return array_rand($constants);
//    }
    public static function getRandomValue()
    {
        $oClass = new ReflectionClass(__CLASS__);
        $constants = $oClass->getConstants();
        return array_values($constants)[array_rand($constants)];
    }


//    public static function getRandomValue()
//    {
//        $oClass = new ReflectionClass(__CLASS__);
//        $constants = $oClass->getConstants();
//        return $constants[array_rand($constants)];
//    }
}
