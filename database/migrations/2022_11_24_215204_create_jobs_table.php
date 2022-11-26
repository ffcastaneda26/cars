<?php

use App\Models\Company;
use App\Models\Position;
use App\Models\SalaryType;
use App\Models\TimesHire;
use App\Models\TimeType;
use App\Models\User;
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->comment('Empresa');
            $table->string('name')->comment('Nombre de la vacante');
            $table->foreignIdFor(Position::class)->comment('Puesto');
            $table->foreignIdFor(SalaryType::class)->comment('Tipo de Salario');
            $table->foreignIdFor(TimeType::class)->comment('Tipo de horario');
            $table->enum('show_salary_by',['range','initial','maximum','exactly'])->nullable()->default('exactly')->comment('Mostrar salario x');
            $table->float('min_salary',9,2)->nullable()->default(0)->comment('Salario Mínimo según tipo de salario');
            $table->float('max_salary',9,2)->nullable()->default(0)->comment('Salario Máximo según tipo de salario');
            $table->float('amount_salary',9,2)->nullable()->default(0)->comment('Salario Exacto');
            $table->string('salary_periodicity')->nullable()->default('hour')->comment('Periodicidad');
            $table->string('address',100)->nullable()->default(null)->comment('Dirección');
            $table->unsignedInteger('zipcode')->nullable()->comment('Zona postal');
            $table->decimal('longitude', 11, 8)->nullable()->comment('Longitud');
            $table->decimal('latitude', 11,8)->nullable()->comment('Latitud');
            $table->string('shift')->nullable()->default('morning')->comment('Turno');
            $table->json('complete_address')->nullable()->default(null)->comment('Dirección completa');
            $table->tinyInteger('years_experience')->nullable()->default(0)->comment('Años de experiencia');
            $table->boolean('mandatory_experience')->nullable()->default(0)->comment('Experiencia obligatoria?');
            $table->foreignIdFor(TimesHire::class)->comment('Tiempo para contratar');
            $table->tinyInteger('quantity_jobs')->nullable()->default(1)->comment('Cantidad de vacantes');
            $table->boolean('remote')->nullable()->default(0)->coment('¿Remoto?');
            $table->boolean('show_address')->nullable()->default(1)->coment('¿Incluir dirección en publicación?');
            $table->boolean('applicants_send_cv')->nullable()->default(0)->comment('Candidatos pueden enviar CV?');
            $table->boolean('notify_daily_applications')->nullable()->default(0)->comment('¿Enviar correo diario de postulaciones?');
            $table->boolean('notify_each_application')->nullable()->default(0)->comment('Notificar cada postulación x correo?');
            $table->boolean('mandatory_english')->nullable()->default(0)->comment('¿Inglés obligatorio?');
            $table->boolean('complies_legal_requirements')->nullable()->default(1)->coment('¿Cumple con los requerimientos legales?');
            $table->mediumText('description')->nullable()->default(null)->comment('Descripción');
            $table->mediumText('benefits')->nullable()->default(null)->comment('Beneficios');
            $table->mediumText('covid_precautions')->nullable()->default(null)->comment('Precauciones para el Covid');
            $table->foreignId('created_by_id')->constrained('users')->onDelete('cascade')->comment('Creada por el usuario');
            $table->timestamp('posted_on')->nullable()->derault(null)->comment('Publicado el');
            $table->string('file_path',191)->nullable()->default(null)->comment('Image');

            $table->boolean('active')->nullable()->default(1)->coment('Activa?');

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
        Schema::dropIfExists('jobs');
    }
};
