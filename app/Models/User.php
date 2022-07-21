<?php

namespace App\Models;

use App\Models\ExternalOrder;
use App\Models\FasyankesClass;
use App\Models\FasyankesCategory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fasyankes_name',
        'type',
        'province',
        'city',
        'pic',
        'pic_phone',
        'address',
        'phone',
        'email',
        'password',
        'fasyankes_category_id',
        'fasyankes_class_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function externalOrder(){
        return $this->hasMany(ExternalOrder::class);
    }

    public function fasyankes_category(){
        return $this->belongsTo(FasyankesCategory::class);
    }

    public function fasyankes_class(){
        return $this->belongsTo(FasyankesClass::class);
    }
}
