<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CompanyDetail extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'company_details';

    protected $appends = [
        'business_license',
        'business_plan',
        'details_of_fisher',
    ];

    protected $dates = [
        'date_of_establishment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const HAVE_YOU_PREVIOUSLY_EXPORTED_SEA_CUCUMBER_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const ARE_YOU_RENEWING_YOUR_SEA_CUCUMBER_EXPORT_LICENSE_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $fillable = [
        'local_business_registration_name',
        'type_of_company',
        'date_of_establishment',
        'registered_address',
        'business_activities',
        'foreign_investment_license',
        'are_you_renewing_your_sea_cucumber_export_license',
        'have_you_previously_exported_sea_cucumber',
        'how_long_have_been_involved_in_this_business',
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

    public function getDateOfEstablishmentAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfEstablishmentAttribute($value)
    {
        $this->attributes['date_of_establishment'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBusinessLicenseAttribute()
    {
        return $this->getMedia('business_license')->last();
    }

    public function getBusinessPlanAttribute()
    {
        return $this->getMedia('business_plan')->last();
    }

    public function getDetailsOfFisherAttribute()
    {
        return $this->getMedia('details_of_fisher');
    }
}
