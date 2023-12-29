<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penyewaan extends Pivot
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penyewaan';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_penyewaan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tgl_penyewaan',
        'tgl_pengembalian',
        'plat_nomor',
        'merek_motor',
        'tipe_motor',
        'sewa_perhari',
        'id_pemilik',
        'id_penyewa'
    ];

    public $timestamps = false;

    public function motor(): BelongsTo
    {
        return $this->belongsTo(Motor::class, 'plat_nomor', 'plat_nomor');
    }
    public function penyewa(): BelongsTo
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa', 'username');
    }

    //satu penyewaan memiliki satu pengembalian
    public function pengembalian(): HasOne
    {
        return $this->hasOne(Pengembalian::class);
    }
}
