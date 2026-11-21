<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Omnitrix\Auth\Authenticatable;
use Omnitrix\Auth\HasApiTokens;
use Omnitrix\Contracts\Authenticatable as AuthenticatableContract;
use Omnitrix\Database\Collection;
use Omnitrix\Database\Model;
use Omnitrix\Database\Relations\HasMany;

/**
 * @property int                    $id
 * @property string                 $name
 * @property string                 $email
 * @property string                 $password
 * @property DateTimeImmutable|null $email_verified_at
 * @property DateTimeImmutable|null $created_at
 * @property DateTimeImmutable|null $updated_at
 * @property-read Collection<Post>  $posts
 */
final class User extends Model implements AuthenticatableContract
{
    use Authenticatable;
    use HasApiTokens;

    /** @var list<string> */
    protected static array $fillable = ['name', 'email', 'password'];

    /** @var list<string> */
    protected static array $hidden = ['password', 'remember_token'];

    /** @var array<string, string> */
    protected static array $casts = ['password' => 'hashed', 'email_verified_at' => 'datetime'];

    /** @return HasMany<Post> */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
