<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = true;


    protected $fillable = [
        'user_id',
        'payment_id',
        'total_amount',
        'status',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Relasi ke OrderDetails
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
