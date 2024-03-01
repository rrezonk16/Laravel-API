<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'business_info'; // Specify the table name
    protected $primaryKey = 'NUI'; // Specify the primary key column

    protected $fillable = [
        'name',
        'nui',
        'owner_id',
        'phone_number',
        'email',
        'status',
    ];
    

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
