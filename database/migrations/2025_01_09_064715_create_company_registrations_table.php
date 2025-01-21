<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('company_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('head_office_address');
            $table->text('company_address');
            $table->string('responsible_person');
            $table->string('business_field');
            $table->decimal('investment_amount', 15, 2);
            $table->enum('investment_status', ['PMA', 'PMDN', 'Swasta Nasional']);
            $table->integer('indonesian_workers');
            $table->integer('foreign_workers');
            $table->string('ktp_copy');
            $table->string('director_npwp_copy');
            $table->string('company_npwp_copy');
            $table->string('establishment_deed_copy');
            $table->string('latest_amendment_deed_copy');
            $table->string('building_approval_copy');
            $table->string('warehouse_registration_copy');
            $table->string('business_registration_number_copy');
            
            // C. Prasarana Fisik
            $table->decimal('land_area', 10, 2);
            $table->decimal('building_area', 10, 2);
            $table->enum('land_status', ['Milik Sendiri', 'Sewa', 'Kontrak', 'Lainnya']);
            $table->string('land_status_other_value')->nullable();
            $table->enum('building_condition', ['Permanen', 'Semi Permanen']);
            
            // D. Kapasitas Gudang
            $table->string('warehouse_item_type');
            $table->string('warehouse_capacity');
            
            // E. Jenis Komoditi dan Omset Penjualan Pertahun
            $table->string('commodity_type');
            $table->decimal('annual_sales', 15, 2);
            
            // F. Data Gudang
            $table->string('item_origin');
            $table->string('storage_duration');
            $table->string('country_of_origin');
            
            // G. Pemasaran
            $table->decimal('domestic_market', 5, 2);
            $table->decimal('export_market', 5, 2);
            $table->string('export_destination');
            $table->decimal('export_value', 15, 2);
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('company_registrations');
    }
}

