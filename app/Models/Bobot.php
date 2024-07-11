<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Bobot extends Model
{
    use HasFactory;

    protected $table = 'pembobotan';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menonaktifkan timestamps otomatis

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Ambil semua kolom kecuali id_penilaian
        $columns = Schema::getColumnListing($this->table);
        $this->fillable = array_diff($columns, [$this->primaryKey]);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id'); // Sesuaikan dengan nama kolom yang Anda gunakan untuk foreign key
    }
}
