<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, InteractsWithMedia, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'facebook_id',
        'google_id',
        'github_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Register media collections for the user.
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
    }

    /**
     * Register media conversions for the user.
     */
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10)
            ->performOnCollections('avatar');

        $this->addMediaConversion('small')
            ->width(50)
            ->height(50)
            ->sharpen(10)
            ->performOnCollections('avatar');
    }

    /**
     * Get the user's avatar URL.
     */
    public function getAvatarUrl(?string $conversion = null): string
    {
        // Check for uploaded avatar first
        $media = $this->getFirstMedia('avatar');

        if ($media) {
            return $conversion ? $media->getUrl($conversion) : $media->getUrl();
        }

        // Check for social provider avatar
        if ($this->avatar) {
            return $this->avatar;
        }

        // Fallback to default avatar
        return $this->getDefaultAvatarUrl();
    }

    /**
     * Get the default avatar URL (generated from initials).
     */
    public function getDefaultAvatarUrl(): string
    {
        $initials = collect(explode(' ', $this->name))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->take(2)
            ->join('');

        return "https://ui-avatars.com/api/?name={$initials}&background=random&color=fff&size=150";
    }

    /**
     * Check if user has an avatar.
     */
    public function hasAvatar(): bool
    {
        return $this->hasMedia('avatar') || !empty($this->avatar);
    }
}
