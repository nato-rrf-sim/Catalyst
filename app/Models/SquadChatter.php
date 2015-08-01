<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SquadChatter extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'squad_chatter';

    /**
     * Returns Virtual Personnel File of Announcement Creator
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\VPF','vpf_id');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

}
