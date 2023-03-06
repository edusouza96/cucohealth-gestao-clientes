<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Client extends Model
{
    use SoftDeletes;
    protected $table = "clients";
    protected $fillable = ['name', 'cpf', 'birth_date', 'phone'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates = ['birth_date'];

    public function birthDate(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('d/m/Y'),
            set: fn ($value) => Carbon::createFromFormat('Y-m-d', $value)->startOfDay()
        );
    }

    public function cpf(): Attribute
    {
        return new Attribute(
            get: fn ($value) => vsprintf("%s%s%s.%s%s%s.%s%s%s-%s%s", str_split($value)),
            set: fn ($value) => preg_replace("/[^0-9]/", "", $value)
        );
    }

    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => $value,
            set: fn ($value) => strtoupper($value)
        );
    }

    public function phone(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value ? vsprintf("(%s%s)%s%s%s%s%s-%s%s%s%s", str_split($value)) : null),
            set: fn ($value) => ($value ? preg_replace("/[^0-9]/", "", $value) : null)
        );
    }

}
