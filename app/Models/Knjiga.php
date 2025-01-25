<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Knjiga extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['naziv', 'autor', 'opis', 'status'];

    protected $searchableFields = ['*'];

    public $timestamps = false;

    public function rezervacija()
    {
        return $this->hasOne(Rezervacija::class);
    }
}
