<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['id', 'company', 'cnpj', 'phone', 'address', 'contact_name', 'email', 'image', 'image_local'];

    public function contracts()
    {
        return $this->hasMany(Contract::class, 'category_id', 'id');
    }
}
