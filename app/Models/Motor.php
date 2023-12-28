<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Motor extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'motor';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'plat_nomor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['plat_nomor', 'merek', 'tipe', 'sewa_perhari', 'id_pemilik'];
    public $incrementing = false;

    public function penyewaan(): HasMany
    {
        return $this->hasMany(Penyewaan::class, 'plat_nomor', 'plat_nomor');
    }

    public function isNotAvailableForRent(): bool
    {
        //jika motor ada di tabel penyewaan tapi tgl_pengembalian nya null
        return $this->penyewaan()->whereNull('tgl_pengembalian')->exists();
    }

    //motor dimiliki pemilik
    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'username');
    }
}
