<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class clientModel extends Model
{
    use HasFactory;

    static function invoice(){
        $rs = DB::table('students')
            ->join('class','students.idClass','=','class.id')
            ->join('total_money','class.idTotalMoney','=','total_money.id')
            ->join('vocation','total_money.idVocation','=','vocation.id')
            ->join('school_year','class.idSchoolYear','=','school_year.id')
            ->select(
                'students.id',
                'vocation.name as vocation',
                'school_year.name as schoolYear',
                'students.name',
                'class.name as className',
                'school_year.stagesPresent',
                'students.totalStages')
            ->orderBy('vocation.name','asc')
            ->orderBy('school_year.name','asc')
            ->orderBy('class.name','asc')
            ->orderBy('students.name','asc')
            ->get();

        return $rs;
    }
}
