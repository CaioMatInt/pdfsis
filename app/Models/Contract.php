<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = ['id', 'client_id', 'title', 'area', 'object', 'description', 'requiriments', 'exceptions', 'additional',
    'team', 'deadline', 'budget', 'payment_options', 'maintenance', 'infra', 'sustentation', 'expiration', 'image'];

    public function contract()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }


}
