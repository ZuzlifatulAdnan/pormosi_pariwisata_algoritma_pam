<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jumlah_pengunjung',
        'asal_pengunjung',
        'activity_id',
        // 'nilai_review',
        'review_pengunjung',
        'cluster'
    ];
    public function activity()
    {
        return $this->belongsTo(activity::class);
    }
}
