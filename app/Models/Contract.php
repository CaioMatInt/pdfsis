<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    protected $fillable = ['id', 'client_id', 'title', 'area', 'proposal', 'image', 'budget', 'version', 'control_proposal'];

    public function contract()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }


}
