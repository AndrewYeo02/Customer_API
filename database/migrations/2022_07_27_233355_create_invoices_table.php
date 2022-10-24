<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create invoice shcema data type
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id'); //foreign key
            $table->integer('amount'); 
            $table->string('status');// Billed, Paid, Void
            $table->dateTime('billed_date');
            $table->dateTime('paid_date')-> nullable(); // because the paydate might not be paid so we say nullable
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
