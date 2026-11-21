<?php

declare(strict_types=1);

use Omnitrix\Database\Migrations\Migration;
use Omnitrix\Database\Schema\Blueprint;
use Omnitrix\Database\Schema\Schema;

// API tokens created with $user->createToken() (the token guard in config/auth.php).
return new class extends Migration {
    public function up(Schema $schema): void
    {
        $schema->create('personal_access_tokens', static function (Blueprint $table): void {
            $table->id();
            $table->string('tokenable_type');
            $table->unsignedBigInteger('tokenable_id');
            $table->string('name');
            $table->string('token', 64)->unique(); // SHA-256 of the secret
            $table->json('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->index(['tokenable_type', 'tokenable_id']);
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropIfExists('personal_access_tokens');
    }
};
