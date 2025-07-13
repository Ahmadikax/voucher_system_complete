<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image_url',
        'is_archived'
    ];

    /**
     * Get the product codes for the product.
     */
    public function productCodes()
    {
        return $this->hasMany(ProductCode::class);
    }

    /**
     * Get the count of available codes for this product.
     */
    public function availableCodesCount()
    {
        return $this->productCodes()->where('status', 'available')->count();
    }

    /**
     * Get the count of sold codes for this product.
     */
    public function soldCodesCount()
    {
        return $this->productCodes()->where('status', 'sold')->count();
    }

    /**
     * Get the count of reserved codes for this product.
     */
    public function reservedCodesCount()
    {
        return $this->productCodes()->where('status', 'reserved')->count();
    }
}