<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rezervacija extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'rezervisana_od',
        'rezervisana_do',
        'user_id',
        'knjiga_id',
    ];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    protected $casts = [
        'rezervisana_od' => 'date',
        'rezervisana_do' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function knjiga()
    {
        return $this->belongsTo(Knjiga::class);
    }
}
