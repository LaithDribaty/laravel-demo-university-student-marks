<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Subject;
use App\Models\Marks_Dates;

class MarksController extends Controller
{
    public function main() {
        $table = Mark::all();
        return view('main')->with('table' , $table);
    }

    public function subjects() {
        $table = Subject::all();
        return view('subjects_specify')->with('subjects' , $table);
    }

    public function marksFilter(Request $requset) {
        $subjects = array();
        foreach($requset as $subj) 
            array_push($subjects , $subj);
        
        $subjectsReal = array("id" , "name");
        foreach($subjects[1] as $key => $subj) 
            array_push($subjectsReal , $key);
        
        $table = Mark::all($subjectsReal);
        return view('main')->with('table' , $table);
    }

    public function compare1() {
        return view('compare');
    }

    public function compare2($id1 , $id2) {
        if($id1 == $id2) {
            return view('compare')->with('err' , 'you entered the same student\'s id');
        }
        $row1 = Mark::find($id1);
        $row2 = Mark::find($id2);
        if(empty($row1) || empty($row2)) {
            return view('compare')->with('err' , 'you entered wrong id number');
        }
        $subjects = Subject::all();
        return view('compare')->with('row1' , $row1)->with('row2' , $row2)->with('subjects' , $subjects);
    }
    public function findMe($id) {
        $row = Mark::find($id);
        if(empty($row)) {
            return view('findMe')->with('err' , 'you entered wrong id number');
        }
        $subjects = Subject::all();
        $rowDates = Marks_Dates::find($id);
        return view('individual')->with('row' , $row)->with('subjects' , $subjects)->with('rowDates' , $rowDates);
    }

}
