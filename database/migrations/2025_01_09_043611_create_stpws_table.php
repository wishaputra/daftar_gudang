<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStpwsTable extends Migration
{
    public function up()
    {
        Schema::create('stpws', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->text('company_address');
            $table->string('store_name');
            $table->text('store_address');
            $table->string('trademark');
            $table->string('responsible_person');
            $table->string('business_type');
            $table->decimal('investment_value', 15, 2);
            $table->enum('franchise_type', ['Bukan Waralaba', 'Waralaba']);
            $table->string('nib_copy');
            $table->string('franchise_prospectus_copy');
            $table->string('franchise_agreement_copy');
            $table->string('intellectual_property_copy');
            $table->string('building_approval_copy');
            $table->enum('service_type', ['Harga Pasti', 'Harga Tawar Menawar']);
            $table->enum('building_ownership', ['Milik Sendiri', 'Sewa']);
            $table->text('franchised_goods_composition');
            $table->integer('workforce');
            $table->string('allowed_other_products');
            $table->json('distributors');
            $table->enum('building_facility', ['AC', 'Non AC']);
            $table->integer('ac_unit_count')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stpws');
    }
}

