<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Omnitrix\Database\Collection;
use Omnitrix\Database\Model;
use Omnitrix\Database\Relations\HasMany;

/**
 * @property int                    $id
 * @property string                 $name
 * @property string                 $email
 * @property DateTimeImmutable|null $created_at
 * @property DateTimeImmutable|null $updated_at
 * @property-read Collection<Post>  $posts
 */
final class User extends Model
{
    /** @var list<string> */
    protected static array $fillable = ['name', 'email'];

    /** @return HasMany<Post> */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
