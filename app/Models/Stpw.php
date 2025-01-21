<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stpw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'company_address',
        'store_name',
        'store_address',
        'trademark',
        'responsible_person',
        'business_types',
        'investment_value',
        'franchise_type',
        'nib_copy',
        'franchise_prospectus_copy',
        'franchise_agreement_copy',
        'intellectual_property_copy',
        'building_approval_copy',
        'service_type',
        'building_ownership',
        'franchised_goods_composition',
        'workforce',
        'allowed_other_products',
        'distributors',
        'building_facility',
        'ac_unit_count',
        'notes',
    ];

    protected $casts = [
        'investment_value' => 'decimal:2',
        'distributors' => 'array',
        'workforce' => 'integer',
        'ac_unit_count' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}