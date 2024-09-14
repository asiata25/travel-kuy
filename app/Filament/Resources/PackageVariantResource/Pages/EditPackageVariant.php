<?php

namespace App\Filament\Resources\PackageVariantResource\Pages;

use App\Filament\Resources\PackageVariantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPackageVariant extends EditRecord
{
    protected static string $resource = PackageVariantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
