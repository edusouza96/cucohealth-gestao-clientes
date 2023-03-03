<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = "clients";
    protected $fillable = ['name', 'cpf', 'birth_date', 'phone'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates = ['birth_date'];

}
