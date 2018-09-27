<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['id', 'company', 'cnpj', 'phone', 'address', 'contact_name', 'email', 'image'];

    public function client()
    {
        return $this->hasMany(Contract::class, 'category_id', 'id');
    }
}
