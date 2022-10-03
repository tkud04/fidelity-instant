<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Receivers extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tnum',
        'name',
        'phone',
        'address'
    ];
}