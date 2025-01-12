<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Menu extends Model
{
    protected $table = 'menus';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'picture',
        'name',
        'price',
        'min_order',
        'category',
        'description',
        'user_id',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cartUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'carts', 'menu_id', 'user_id')
            ->withPivot('quantity') // Jika ada kolom tambahan di tabel pivot
            ->withTimestamps(); // Jika perlu timestamps
    }
}
