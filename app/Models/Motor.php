<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    //motor dimiliki pemilik
    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(Pemilik::class);
    }
}
