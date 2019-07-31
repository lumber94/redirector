<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    /**
     * Class CreateRedirectsTable
     */
    class CreateRedirectsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up(): void
        {
            Schema::create('redirects', function(Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('url_from');
                $table->string('url_to');
                $table->unsignedInteger('status_code')->default(301);
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('position');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down(): void
        {
            Schema::dropIfExists('redirects');
        }
    }
