<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StaffTravelForm extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'staff_travel_forms';

    public const STAFF_GENDER_RADIO = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    public const TRAVEL_DESTINATION_RADIO = [
        'Domestic'      => 'Domestic',
        'International' => 'International',
    ];

    protected $dates = [
        'date_of_departure',
        'return_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'full_name_of_staff',
        'staff_designation',
        'staff_gender',
        'name_of_division',
        'purpose_of_travel',
        'source_of_fund',
        'date_of_departure',
        'number_of_absent_in_days',
        'return_date',
        'travel_destination',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const NAME_OF_DIVISION_SELECT = [
        'Corporate Service Division'      => 'Corporate Service Division',
        'Coastal Fisheries Division'      => 'Coastal Fisheries Division',
        'Geo-Science Division'            => 'Geo-Science Division',
        'Oceanic Fisheries Division'      => 'Oceanic Fisheries Division',
        'Planning & Development Division' => 'Planning & Development Division',
        'Seafood Verification Division'   => 'Seafood Verification Division',
        'Others'                          => 'Others',
    ];

    public const SOURCE_OF_FUND_SELECT = [
        'Recurrent (GoK)'                                    => 'Recurrent (GoK)',
        'Institutional & Fisheries Commitment Support (PDF)' => 'Institutional & Fisheries Commitment Support (PDF)',
        'CBFM'                                               => 'CBFM',
        'Blue Lagoon Marina'                                 => 'Blue Lagoon Marina',
        'Development Fund Project'                           => 'Development Fund Project',
        'EU'                                                 => 'EU',
        'FAO'                                                => 'FAO',
        'Observer Fund'                                      => 'Observer Fund',
        'Phoenix Island & Marine Spatial Planning (MSP)'     => 'Phoenix Island & Marine Spatial Planning (MSP)',
        'PROP'                                               => 'PROP',
        'R2R'                                                => 'R2R',
        'Support to Fisheries'                               => 'Support to Fisheries',
        'Tobwaan Waara Project (TWP)'                        => 'Tobwaan Waara Project (TWP)',
        'Others'                                             => 'Others',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateOfDepartureAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfDepartureAttribute($value)
    {
        $this->attributes['date_of_departure'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReturnDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
