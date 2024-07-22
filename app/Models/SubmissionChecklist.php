<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SubmissionChecklist extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia, HasFactory;

    public $table = 'submission_checklists';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'applicant_identification_card_passport_copy',
        'police_clearance',
        'business_registration_certificate',
        'foreign_investment_license_certificate',
        'business_local_license_certificate',
        'financial_background',
        'list_of_fishers_suppliers',
        'listfishers',
        'photo',
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

    public function getApplicantIdentificationCardPassportCopyAttribute()
    {
        return $this->getMedia('applicant_identification_card_passport_copy');
    }

    public function getPoliceClearanceAttribute()
    {
        return $this->getMedia('police_clearance');
    }

    public function getBusinessRegistrationCertificateAttribute()
    {
        return $this->getMedia('business_registration_certificate');
    }

    public function getForeignInvestmentLicenseCertificateAttribute()
    {
        return $this->getMedia('foreign_investment_license_certificate');
    }

    public function getBusinessLocalLicenseCertificateAttribute()
    {
        return $this->getMedia('business_local_license_certificate');
    }

    public function getFinancialBackgroundAttribute()
    {
        return $this->getMedia('financial_background');
    }

    public function getListOfFishersSuppliersAttribute()
    {
        return $this->getMedia('list_of_fishers_suppliers');
    }

    public function getListfishersAttribute()
    {
        return $this->getMedia('listfishers')->last();
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
}
