<?php

declare(strict_types=1);

use Omnitrix\Database\Migrations\Migration;
use Omnitrix\Database\Schema\Blueprint;
use Omnitrix\Database\Schema\Schema;

// Password reset tokens (hashed), one per address (Password::sendResetLink()).
return new class extends Migration {
    public function up(Schema $schema): void
    {
        $schema->create('password_reset_tokens', static function (Blueprint $table): void {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropIfExists('password_reset_tokens');
    }
};
