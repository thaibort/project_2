<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class adminModel extends Model
{
    use HasFactory;
    static function vocation(){
        $rs = DB::table('vocation')->get();
        return $rs;
    }
}
