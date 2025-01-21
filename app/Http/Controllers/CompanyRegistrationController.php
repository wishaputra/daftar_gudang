<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyRegistration;
use App\Models\KBLI;
use Illuminate\Support\Facades\Storage;

class CompanyRegistrationController extends Controller
{
    public function showForm()
    {
        // Fetch and format the data for the datalist
        $businessFields = KBLI::selectRaw("CONCAT(kode, ' - ', nama) AS field")->distinct()->pluck('field');

        $itemTypes = [
            'Raw Materials',
            'Finished Products',
            'Spare Parts',
            'Consumables',
        ];

        $commodityTypes = [
            'Electronics',
            'Textiles',
            'Food Products',
            'Machinery',
        ];

        return view('company.registration-form', compact('businessFields', 'itemTypes', 'commodityTypes'));
    }


    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'head_office_address' => 'required|string',
            'company_address' => 'required|string',
            'responsible_person' => 'required|string|max:255',
            'business_field' => 'required|string',
            'investment_amount' => 'required|numeric',
            'investment_status' => 'required|in:PMA,PMDN,Swasta Nasional',
            'indonesian_workers' => 'required|integer',
            'foreign_workers' => 'required|integer',
            'ktp_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'director_npwp_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'company_npwp_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'establishment_deed_copy' => 'required|file|mimes:pdf|max:2048',
            'latest_amendment_deed_copy' => 'required|file|mimes:pdf|max:2048',
            'building_approval_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'warehouse_registration_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'business_registration_number_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'land_area' => 'required|numeric',
            'building_area' => 'required|numeric',
            'land_status' => 'required|in:Milik Sendiri,Sewa,Kontrak,Lainnya',
            'land_status_other_value' => 'required_if:land_status,Lainnya',
            'building_condition' => 'required|in:Permanen,Semi Permanen',
            'warehouse_item_type' => 'required',
            'warehouse_capacity' => 'required',
            'commodity_type' => 'required',
            'annual_sales' => 'required|numeric',
            'item_origin' => 'required',
            'storage_duration' => 'required',
            'country_of_origin' => 'required',
            'domestic_market' => 'required|numeric|min:0|max:100',
            'export_market' => 'required|numeric|min:0|max:100',
            'export_destination' => 'required',
            'export_value' => 'required|numeric',
        ]);

        // Handle file uploads
        $fileFields = [
            'ktp_copy', 'director_npwp_copy', 'company_npwp_copy', 'establishment_deed_copy',
            'latest_amendment_deed_copy', 'building_approval_copy', 'warehouse_registration_copy',
            'business_registration_number_copy'
        ];
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $validatedData[$field] = $request->file($field)->store('company_registration_documents', 'public');
            }
        }

        // Create new CompanyRegistration record
        $registration = CompanyRegistration::create($validatedData);

        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}

