<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    protected $table = 'brand';
    use HasFactory;
    public function getBrand()
    {
        $brand =  DB::table('brand')
            ->orderBy('id')
            ->paginate(1);
        return $brand;
    }
    public function models()
    {
        return $this->hasMany(Models::class, 'brand_id');
    }
    public function cars()
    {
        return $this->hasMany(Cars::class, 'brand_id');
    }
}
