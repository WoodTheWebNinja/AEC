<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Villes extends Model
{
    use HasFactory;
    public function selectVille($order = 'ASC') {
        return $this::select()
            ->orderBy('nom', $order)
            ->get();
    }
}
