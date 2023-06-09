<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'note',
        'order_date',
        'total_price',
        'delivery_date',
        'user_id',
        'status_ship',
        'status_pay',
        'status',
        'updated_at',
    ];
    use HasFactory;
}
