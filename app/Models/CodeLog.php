<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_code_id',
        'action',
        'note',
        'logged_at'
    ];

    protected $casts = [
        'logged_at' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the product code that owns the log.
     */
    public function productCode()
    {
        return $this->belongsTo(ProductCode::class);
    }
}