<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ExportDetail extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'export_details';

    protected $appends = [
        'local_harvesters',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const ISLAND_COUNCIL_CONCERNED_SELECT = [
        'YES' => 'YES',
        'NO'  => 'NO',
    ];

    protected $fillable = [
        'name_island_to_harvest_for_sea_cucumber',
        'island_council_concerned',
        'are_you_going_to_export_sea_cucumber',
        'target_species_exported',
        'quota_requested_to_be_exported',
        'fishing_method',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getLocalHarvestersAttribute()
    {
        return $this->getMedia('local_harvesters')->last();
    }
}
