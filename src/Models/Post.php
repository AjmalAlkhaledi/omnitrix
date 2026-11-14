<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Omnitrix\Database\Model;
use Omnitrix\Database\Relations\BelongsTo;

/**
 * @property int                    $id
 * @property int                    $user_id
 * @property string                 $title
 * @property string|null            $body
 * @property bool                   $published
 * @property DateTimeImmutable|null $created_at
 * @property DateTimeImmutable|null $updated_at
 * @property-read User|null         $user
 */
final class Post extends Model
{
    /** @var list<string> */
    protected static array $fillable = ['title', 'body', 'published'];

    /** @var array<string, string> */
    protected static array $casts = ['published' => 'bool'];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
