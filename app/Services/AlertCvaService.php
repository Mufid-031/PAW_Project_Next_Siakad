<?php

namespace App\Services;

use FeatureNinja\Cva\ClassVarianceAuthority;

class AlertCvaService
{
    public static function new(): ClassVarianceAuthority
    {
        return ClassVarianceAuthority::new(
            [
                'relative w-full rounded-lg border px-4 py-3 text-sm [&>svg+div]:translate-y-[-3px] [&>svg]:absolute [&>svg]:left-4 [&>svg]:top-4 [&>svg]:text-foreground [&>svg~*]:pl-7',
            ],
            [
                'variants' => [
                    'variant' => [
                        'default' => 'bg-background text-foreground',
                        'destructive' => 'border-destructive/50 text-destructive dark:border-destructive [&>svg]:text-destructive',
                        'success' => 'border-green-500 text-green-500 dark:border-green-700 [&>svg]:text-green-500',
                    ],
                ],
                'defaultVariants' => [
                    'variant' => 'default',
                ],
            ],
        );
    }
}
