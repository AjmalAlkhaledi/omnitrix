<?php

declare(strict_types=1);

namespace App\Models;

use DateTimeImmutable;
use Omnitrix\Auth\Access\Authorizable;
use Omnitrix\Auth\Authenticatable;
use Omnitrix\Auth\HasApiTokens;
use Omnitrix\Auth\Verification\MustVerifyEmail;
use Omnitrix\Contracts\Authenticatable as AuthenticatableContract;
use Omnitrix\Contracts\MustVerifyEmail as MustVerifyEmailContract;
use Omnitrix\Database\Collection;
use Omnitrix\Database\Factories\HasFactory;
use Omnitrix\Database\Model;
use Omnitrix\Database\Relations\HasMany;
use Omnitrix\Notifications\Notifiable;

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
final class User extends Model implements AuthenticatableContract, MustVerifyEmailContract
{
    use Authenticatable;
    use Authorizable;
    use HasApiTokens;
    use HasFactory;
    use MustVerifyEmail;
    use Notifiable;

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
