<?php

namespace App\Filament\Resources;

use Illuminate\Support\Facades\Auth;
use Z3d0X\FilamentLogger\Resources\ActivityResource as ResourcesActivityResource;

class ActivityResource extends ResourcesActivityResource
{
    protected static ?int $navigationSort = 2;

    public static function canViewAny(): bool
    {
        return Auth::user()?->id == '1';
    }
}