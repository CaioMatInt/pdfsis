<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = ['id', 'client_id', 'title', 'area', 'proposal', 'budget', 'version', 'control_proposal'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }


}
