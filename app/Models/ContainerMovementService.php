<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContainerMovementService extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'container_movement_services';

    public const VESSEL_SELECT = [
        'CORAL ISLANDER'  => 'CORAL ISLANDER',
        'NEW GUINE CHIEF' => 'NEW GUINE CHIEF',
        'PAPUAN CHIEF'    => 'PAPUAN CHIEF',
    ];

    protected $dates = [
        'dchf',
        'devan',
        'sntc',
        'snts',
        'rcve',
        'rcvf',
        'lode',
        'lodf',
        'sntb',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const MOV_CODE_SELECT = [
        'SNTB' => 'SNTB',
        'DCHF' => 'DCHF',
        'SNTC' => 'SNTC',
        'RCVE' => 'RCVE',
        'SNTS' => 'SNTS',
        'RCVF' => 'RCVF',
        'LODE' => 'LODE',
        'LODF' => 'LODF',
    ];

    protected $fillable = [
        'container_no',
        'type',
        'service',
        'lease_lessor',
        'vessel',
        'mov_code',
        'consignee',
        'dchf',
        'devan',
        'sntc',
        'snts',
        'rcve',
        'rcvf',
        'lode',
        'lodf',
        'sntb',
        'location',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const LOCATION_SELECT = [
        'Betio'       => 'Betio',
        'Bairiki'     => 'Bairiki',
        'Nanikai'     => 'Nanikai',
        'Teaoraereke' => 'Teaoraereke',
        'Antemai'     => 'Antemai',
        'Antebuka'    => 'Antebuka',
        'Banraeaba'   => 'Banraeaba',
        'Ambo'        => 'Ambo',
        'Taborio'     => 'Taborio',
        'Eita'        => 'Eita',
        'Bikenibeu'   => 'Bikenibeu',
        'Bonriki'     => 'Bonriki',
        'Tanaea'      => 'Tanaea',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDchfAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDchfAttribute($value)
    {
        $this->attributes['dchf'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDevanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDevanAttribute($value)
    {
        $this->attributes['devan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSntcAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSntcAttribute($value)
    {
        $this->attributes['sntc'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSntsAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSntsAttribute($value)
    {
        $this->attributes['snts'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRcveAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRcveAttribute($value)
    {
        $this->attributes['rcve'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getRcvfAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setRcvfAttribute($value)
    {
        $this->attributes['rcvf'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLodeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLodeAttribute($value)
    {
        $this->attributes['lode'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getLodfAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setLodfAttribute($value)
    {
        $this->attributes['lodf'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getSntbAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setSntbAttribute($value)
    {
        $this->attributes['sntb'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
