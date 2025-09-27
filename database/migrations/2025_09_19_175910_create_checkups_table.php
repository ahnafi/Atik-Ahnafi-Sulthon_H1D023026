<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("children_id")->constrained()->cascadeOnDelete();
            $table->date("checkup_date")->default(\Illuminate\Support\Carbon::now());
            $table->integer("age_in_months")->nullable();
            $table->decimal("height", 5, 2)->default(0);
            $table->decimal("weight", 5, 2)->default(0);
            $table->decimal("fuzzy_score", 5, 2)->nullable()->default(0);
            $table->enum("nutrition", ["normal", "stunting", "severely_stunting", "overweight", "obesitas"]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkups');
    }
};
