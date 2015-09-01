<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DCS extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dcs';
    protected $guarded = [];

    /**
     * Returns Virtual Personnel File
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function VPF()
    {
        return $this->belongsTo('App\VPF','vpf_id','id');
    }
}
