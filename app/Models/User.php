<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'role',
        'password',
        'avatar',
        'nama_toko',
        'area_antar',
        'no_handphone',
        'no_whatsapp',
        'deskripsi_toko',
        'alamat_toko',
        'link_google_map_embed',
        'kisaran_harga',
        'name'
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

    public function menus(): HasMany {
        return $this->hasMany(Menu::class, 'user_id', 'id');
    }

    public function cartMenus(): BelongsToMany
    {
        return $this->belongsToMany(Menu::class, 'carts', 'user_id', 'menu_id')
            ->withPivot('quantity') // Jika ada kolom tambahan di tabel pivot
            ->withTimestamps(); // Jika perlu timestamps
    }

}
