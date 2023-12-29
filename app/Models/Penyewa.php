<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penyewa extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penyewa';

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

    //penyewa menyewa motor dari beberapa pemilik
    public function pemiliks(): BelongsToMany
    {
        return $this->belongsToMany(Pemilik::class)->using(Penyewaan::class);
    }

    public function penyewaans(): HasMany
    {
        return $this->hasMany(Penyewaan::class, 'id_penyewa', 'username');
    }
}
