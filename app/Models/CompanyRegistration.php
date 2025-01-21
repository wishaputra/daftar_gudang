<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'head_office_address',
        'company_address',
        'responsible_person',
        'business_field',
        'investment_amount',
        'investment_status',
        'indonesian_workers',
        'foreign_workers',
        'ktp_copy',
        'director_npwp_copy',
        'company_npwp_copy',
        'establishment_deed_copy',
        'latest_amendment_deed_copy',
        'building_approval_copy',
        'warehouse_registration_copy',
        'business_registration_number_copy',
        'land_area',
        'building_area',
        'land_status',
        'land_status_other_value',
        'building_condition',
        'warehouse_item_type',
        'warehouse_capacity',
        'commodity_type',
        'annual_sales',
        'item_origin',
        'storage_duration',
        'country_of_origin',
        'domestic_market',
        'export_market',
        'export_destination',
        'export_value',
    ];

    protected $casts = [
        'investment_amount' => 'decimal:2',
        'land_area' => 'decimal:2',
        'building_area' => 'decimal:2',
        'annual_sales' => 'decimal:2',
        'domestic_market' => 'decimal:2',
        'export_market' => 'decimal:2',
        'export_value' => 'decimal:2',
    ];
}

