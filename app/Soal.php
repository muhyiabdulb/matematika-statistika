<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'tb_soal';
    protected $fillable = [
        'kode_soal', 'soal', 'pilihan_a', 'pilihan_b',
        'pilihan_c', 'pilihan_d', 'pilihan_e', 'jawaban_benar'
    ];
}
