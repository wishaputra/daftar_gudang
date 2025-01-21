<?php

namespace App\Http\Controllers;

use App\Models\Stpw;
use App\Models\KBLI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class StpwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stpwList = Stpw::all();
        return view('stpw.index', compact('stpwList'));
    }

    public function show($id)
    {
        $stpw = Stpw::findOrFail($id);
        $pdf = PDF::loadView('stpw.pdf', compact('stpw'));
        return $pdf->stream('stpw_details.pdf');
    }

    public function edit($id)
    {
        $stpw = Stpw::findOrFail($id);
        $this->authorize('update', $stpw);
        $businessTypes = KBLI::selectRaw("CONCAT(kode, ' - ', nama) AS field")->distinct()->pluck('field');
        return view('stpw.edit', compact('stpw', 'businessTypes'));
    }

    public function update(Request $request, $id)
    {
        $stpw = Stpw::findOrFail($id);
        $this->authorize('update', $stpw);
        
        $validatedData = $this->validateStpwData($request);

        $stpw->update($validatedData);

        return redirect()->route('stpw.index')->with('success', 'STPW updated successfully!');
    }

    public function destroy($id)
    {
        $stpw = Stpw::findOrFail($id);
        $this->authorize('delete', $stpw);
        $stpw->delete();

        return redirect()->route('stpw.index')->with('success', 'STPW deleted successfully!');
    }

    public function showForm()
    {
        $businessTypes = KBLI::selectRaw("CONCAT(kode, ' - ', nama) AS field")->distinct()->pluck('field');
        return view('company.stpw', compact('businessTypes'));
    }

    public function submitForm(Request $request)
    {
        try {
            $validatedData = $this->validateStpwData($request);

            // Handle file uploads
            $fileFields = ['nib_copy', 'franchise_prospectus_copy', 'franchise_agreement_copy', 'intellectual_property_copy', 'building_approval_copy'];
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $path = $request->file($field)->store('stpw_documents', 'public');
                    $validatedData[$field] = $path;
                }
            }

            // Convert distributors array to JSON
            $validatedData['distributors'] = json_encode($request->input('distributors', []));

            // Set the user_id
            $validatedData['user_id'] = Auth::id();

            // Create new STPW record
            $stpw = Stpw::create($validatedData);

            return redirect()->route('stpw.index')->with('success', 'STPW form submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Error submitting STPW form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while submitting the form. Please try again.')->withInput();
        }
    }

    private function validateStpwData(Request $request)
    {
        return $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string',
            'store_name' => 'required|string|max:255',
            'store_address' => 'required|string',
            'trademark' => 'required|string|max:255',
            'responsible_person' => 'required|string|max:255',
            'business_types' => 'required|string',
            'investment_value' => 'required|numeric',
            'franchise_type' => 'required|in:Bukan Waralaba,Waralaba',
            'nib_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'franchise_prospectus_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'franchise_agreement_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'intellectual_property_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'building_approval_copy' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'service_type' => 'required|in:Harga Pasti,Harga Tawar Menawar',
            'building_ownership' => 'required|in:Milik Sendiri,Sewa',
            'franchised_goods_composition' => 'required|string',
            'workforce' => 'required|integer',
            'allowed_other_products' => 'required|string',
            'distributors' => 'required|array',
            'distributors.*' => 'required|string',
            'building_facility' => 'required|in:AC,Non AC',
            'ac_unit_count' => 'required_if:building_facility,AC|nullable|integer',
            'notes' => 'nullable|string',
        ]);
    }
}