<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'code',
        'description',
        'status',
        'expires_at',
        'sold_at',
        'last_modified_at',
        'assigned_user_id',
        'code_image_path'
    ];

    protected $casts = [
        'expires_at' => 'date',
        'sold_at' => 'datetime',
        'last_modified_at' => 'datetime',
    ];

    /**
     * Get the product that owns the code.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the logs for the product code.
     */
    public function codeLogs()
    {
        return $this->hasMany(CodeLog::class);
    }

    /**
     * Create a log entry for this code.
     */
    public function log($action, $note = null)
    {
        return CodeLog::create([
            'product_code_id' => $this->id,
            'action' => $action,
            'note' => $note,
            'logged_at' => now()
        ]);
    }

    /**
     * Mark code as sold.
     */
    public function markAsSold($userId = null)
    {
        $this->status = 'sold';
        $this->sold_at = now();
        $this->last_modified_at = now();
        $this->assigned_user_id = $userId;
        $this->save();

        $this->log('sold', 'Code marked as sold');
        
        return $this;
    }

    /**
     * Mark code as reserved.
     */
    public function markAsReserved($userId = null)
    {
        $this->status = 'reserved';
        $this->last_modified_at = now();
        $this->assigned_user_id = $userId;
        $this->save();

        $this->log('reserved', 'Code marked as reserved');
        
        return $this;
    }

    /**
     * Reset code to available.
     */
    public function resetStatus()
    {
        $previousStatus = $this->status;
        
        $this->status = 'available';
        $this->sold_at = null;
        $this->last_modified_at = now();
        $this->assigned_user_id = null;
        $this->save();

        $this->log('reset', "Code reset from {$previousStatus} to available");
        
        return $this;
    }

    /**
     * Get masked code for display.
     */
    public function getMaskedCode()
    {
        $length = strlen($this->code);
        
        if ($length <= 6) {
            return str_repeat('*', $length);
        }
        
        $visibleChars = 3;
        $prefix = substr($this->code, 0, $visibleChars);
        $suffix = substr($this->code, -$visibleChars);
        $maskedPortion = str_repeat('*', $length - ($visibleChars * 2));
        
        return $prefix . $maskedPortion . $suffix;
    }
}