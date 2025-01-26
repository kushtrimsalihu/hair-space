<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Service;


class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'barber_id', 'service_id', 'date', 'time', 'status', 'price'
    ];

    public function client()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barber()
    {
        return $this->belongsTo(User::class, 'barber_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function getPriceAttribute()
    {
        return $this->service->price;
    }
}
