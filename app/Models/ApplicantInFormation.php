<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantInFormation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'applicant_in_formations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'full_name_of_applicant',
        'applicant_citizenship',
        'email_address',
        'phone_or_mobile_nu',
        'work_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const APPLICANT_CITIZENSHIP_SELECT = [
        'Afghanistan'              => 'Afghanistan',
        'Albania'                  => 'Albania',
        'Algeria'                  => 'Algeria',
        'Andorra'                  => 'Andorra',
        'Angola'                   => 'Angola',
        'Argentina'                => 'Argentina',
        'Armenia'                  => 'Armenia',
        'Australia'                => 'Australia',
        'Austria'                  => 'Austria',
        'Bahamas'                  => 'Bahamas',
        'Bahrain'                  => 'Bahrain',
        'Bangladesh'               => 'Bangladesh',
        'Belgium'                  => 'Belgium',
        'Bhutan'                   => 'Bhutan',
        'Bolivia'                  => 'Bolivia',
        'Bosnia and Herzegovina'   => 'Bosnia and Herzegovina',
        'Brazil'                   => 'Brazil',
        'Brunei'                   => 'Brunei',
        'Bulgaria'                 => 'Bulgaria',
        'Cambodia'                 => 'Cambodia',
        'Canada'                   => 'Canada',
        'Central African Republic' => 'Central African Republic',
        'Chile'                    => 'Chile',
        'China'                    => 'China',
        'Colombia'                 => 'Colombia',
        'Costa Rica'               => 'Costa Rica',
        'Croatia'                  => 'Croatia',
        'Cuba'                     => 'Cuba',
        'Czechia (Czech Republic)' => 'Czechia (Czech Republic)',
        'Denmark'                  => 'Denmark',
        'Dominican Republic'       => 'Dominican Republic',
        'Ecuador'                  => 'Ecuador',
        'Egypt'                    => 'Egypt',
        'El Salvador'              => 'El Salvador',
        'Estonia'                  => 'Estonia',
        'Ethiopia'                 => 'Ethiopia',
        'Fiji'                     => 'Fiji',
        'Finland'                  => 'Finland',
        'France'                   => 'France',
        'Georgia'                  => 'Georgia',
        'Germany'                  => 'Germany',
        'Ghana'                    => 'Ghana',
        'Greece'                   => 'Greece',
        'Guatemala'                => 'Guatemala',
        'Honduras'                 => 'Honduras',
        'Haiti'                    => 'Haiti',
        'Hungary'                  => 'Hungary',
        'Iceland'                  => 'Iceland',
        'India'                    => 'India',
        'Indonesia'                => 'Indonesia',
        'Iran'                     => 'Iran',
        'Ireland'                  => 'Ireland',
        'Italy'                    => 'Italy',
        'Jamaica'                  => 'Jamaica',
        'Japan'                    => 'Japan',
        'Jordan'                   => 'Jordan',
        'Kazakhstan'               => 'Kazakhstan',
        'Kenya'                    => 'Kenya',
        'Kiribati'                 => 'Kiribati',
        'Malaysia'                 => 'Malaysia',
        'Maldives'                 => 'Maldives',
        'Malta'                    => 'Malta',
        'Marshall Islands'         => 'Marshall Islands',
        'Mauritania'               => 'Mauritania',
        'Mexico'                   => 'Mexico',
        'Monaco'                   => 'Monaco',
        'Morocco'                  => 'Morocco',
        'Namibia'                  => 'Namibia',
        'Nauru'                    => 'Nauru',
        'Nepal'                    => 'Nepal',
        'Netherlands'              => 'Netherlands',
        'New Zealand'              => 'New Zealand',
        'Nigeria'                  => 'Nigeria',
        'North Korea'              => 'North Korea',
        'Norway'                   => 'Norway',
        'Pakistan'                 => 'Pakistan',
        'Palau'                    => 'Palau',
        'Panama'                   => 'Panama',
        'Papua New Guinea'         => 'Papua New Guinea',
        'Paraguay'                 => 'Paraguay',
        'Peru'                     => 'Peru',
        'Philippines'              => 'Philippines',
        'Poland'                   => 'Poland',
        'Portugal'                 => 'Portugal',
        'Singapore'                => 'Singapore',
        'Slovakia'                 => 'Slovakia',
        'Solomon Islands'          => 'Solomon Islands',
        'South Africa'             => 'South Africa',
        'South Korea'              => 'South Korea',
        'Spain'                    => 'Spain',
        'Sri Lanka'                => 'Sri Lanka',
        'Sweden'                   => 'Sweden',
        'Switzerland'              => 'Switzerland',
        'Thailand'                 => 'Thailand',
        'Tonga'                    => 'Tonga',
        'Tunisia'                  => 'Tunisia',
        'Turkey'                   => 'Turkey',
        'Tuvalu'                   => 'Tuvalu',
        'Taiwan'                   => 'Taiawan',
        'United States of America' => 'United States of America',
        'Uruguay'                  => 'Uruguay',
        'Vanuatu'                  => 'Vanuatu',
        'Venezuela'                => 'Venezuela',
        'Vietnam'                  => 'Vietnam',
        'Zambia'                   => 'Zambia',
        'Zimbabwe'                 => 'Zimbabwe',
        'United Kingdom'           => 'United Kingdom',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
