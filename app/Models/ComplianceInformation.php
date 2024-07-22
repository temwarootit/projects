<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplianceInformation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'compliance_informations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const AWARE_OF_INTERNATIONAL_LAW_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    public const FISHERIES_RELATED_OFFENCES_SELECT = [
        'Yes' => 'Yes',
        'No'  => 'No',
    ];

    protected $fillable = [
        'aware_of_international_law',
        'fisheries_related_offences',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
