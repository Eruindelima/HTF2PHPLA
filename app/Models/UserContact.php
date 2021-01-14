<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $table = 'user_contact';

    protected $fillable = [
        'user_id',
        'cpf',
        'address',
        'neighborhood',
        'cep',
        'city',
        'state',
        'phone'
    ];
}
