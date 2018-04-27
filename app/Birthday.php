<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Birthday extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'date', 'user_id'
    ];

    /**
     * The attributes that are used to generate Accessor
     * https://laravel.com/docs/5.5/eloquent-mutators#date-mutators
     *
     * @var array
     */
    protected $dates = [
        'date', 'created_at', 'updated_at'
    ];

    /**
     * A birthday record belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Defining An Accessor to GET (Mutator will be to 'SET') Date in another format.
     *
     * $birthday->date_formatted;
     *
     *      or just use:
     * $birthday->date->format('d.m.Y H:i:s');
     *
     * @return   mixed
     * @internal param $value
     */
    public function getDateFormattedAttribute() // ($value)
    {
        if ($this->date->format('Y') == '0000') {
            return $this->date->format('d/m');
        }
        return $this->date->format('d/m/Y');
    }
}
