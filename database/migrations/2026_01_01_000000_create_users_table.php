<?php

declare(strict_types=1);

use Omnitrix\Database\Migrations\Migration;
use Omnitrix\Database\Schema\Blueprint;
use Omnitrix\Database\Schema\Schema;

return new class extends Migration {
    public function up(Schema $schema): void
    {
        $schema->create('users', static function (Blueprint $table): void {
            $table->id();
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropIfExists('users');
    }
};
