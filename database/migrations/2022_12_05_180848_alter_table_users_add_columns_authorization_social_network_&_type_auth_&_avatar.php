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
        Schema::table('users', function (Blueprint $table){
            $table->string('social_network_id', 20)
                ->default('')
                ->comment('id в соцсети');
            $table->enum('type_auth',['site', 'vk', 'github'])
                ->default('site')
                ->comment('Тип используемой авторизации');
            $table->string('avatar', 250)->default('/storage/avatars/default.jpg')->comment('Ссылка на аватар');
            $table->index('social_network_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['social_network_id', 'type_auth', 'avatar']);
        });
    }
};
