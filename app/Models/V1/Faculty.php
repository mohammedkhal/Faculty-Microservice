<?php

namespace App\Models\V1;

use App\Models\Model;

class Faculty extends Model
{
    //Constants
    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faculties_lookup';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'uuid';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Prevent Eloquent from overriding uuid with `lastInsertId`.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'object',
        'initial_date' => 'date',
        'status' => 'string',
    ];

    /**
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
