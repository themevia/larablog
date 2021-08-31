<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    public function lastWeak()
    {
        return $this->where('created_at','>=',Carbon::now()->subDays(7))->get()->toArray();
    }

    public function lastMont()
    {
        return $this->where('created_at','>=',Carbon::now()->subMonth())->get()->toArray();
    }

    public function lastYear()
    {
        return $this->where('created_at','>=',Carbon::now()->subYear())->get()->toArray();
    }


}
