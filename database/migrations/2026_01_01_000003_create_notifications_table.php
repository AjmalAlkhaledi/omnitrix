<?php

declare(strict_types=1);

use Omnitrix\Database\Migrations\Migration;
use Omnitrix\Database\Schema\Blueprint;
use Omnitrix\Database\Schema\Schema;

// Notifications stored by the 'database' channel ($user->notifications()).
return new class extends Migration {
    public function up(Schema $schema): void
    {
        $schema->create('notifications', static function (Blueprint $table): void {
            $table->string('id', 40)->primary();
            $table->string('type');
            $table->string('notifiable_type');
            $table->unsignedBigInteger('notifiable_id');
            $table->json('data');
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            $table->index(['notifiable_type', 'notifiable_id']);
        });
    }

    public function down(Schema $schema): void
    {
        $schema->dropIfExists('notifications');
    }
};
