<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected  $fillable =  [
        'value',
        'addressee',
    ];

    protected $table= 'transaction';
    
    public function user(){
        return $this->hasOne(User::class);
    }
}
