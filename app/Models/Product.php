<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use HasApiTokens;
use Notifiable;

class Product extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    protected $primaryKey='product_id';
    protected $table='products';
    protected $fillable = [

        'name',
        'category',
        'description',
        'date_at_time',
    ];
    
}
