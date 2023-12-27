<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pemilik extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pemilik';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'username';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'nik', 'nama', 'no_hp', 'password'];

    public $timestamps = false;

    //pemilik punya beberapa motor
    public function motors(): HasMany
    {
        return $this->hasMany(Motor::class);
    }

    //pemilik menyewakan motornya ke beberapa penyewa
    public function penyewas(): BelongsToMany
    {
        return $this->belongsToMany(Penyewa::class)->using(Penyewaan::class);
    }
}
