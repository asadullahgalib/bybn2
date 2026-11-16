<?php

use App\Model\AssignStudent;
use App\Model\AssignSubject;
use App\Model\Exam;
use App\Model\ExamType;
use App\Model\MarksGrade;
use App\Model\StudentMarks;

if(!function_exists('gradeNameByNumber')){
    function gradeNameByNumber($number){
        if($number){
            $grade = MarksGrade::where([['start_marks','<=',(int)$number],['end_marks','>=',(int)$number]])->first();
            return @$grade->grade_name;
        }else{
            return 'Absent';
        }
    }
}

if(!function_exists('markToRequiredPercentage')){
    function markToRequiredPercentage($total_marks=null,$percertage=null){
        if($percertage != null || $percertage != 0){
            return  ((int)$total_marks*$percertage/100);
        }else{
            return 0;
        }
    }
}

if(!function_exists('marksToHundredPercentage')){
    function marksToHundredPercentage($get_marks=null,$full_marks=null){
        if($full_marks != null || $full_marks != 0){
            return  ((int)$get_marks*100/(int)$full_marks);
        }else{
            return 0;
        }
    }
}

if(!function_exists('gradeNameByPoint')){
    function gradeNameByPoint($student_wise_subjects){
        $totalPoint = 0;
        $count = count($student_wise_subjects);
        foreach ($student_wise_subjects as $key => $mark) {
            $totalPoint += $mark['point'];
            if((int)$mark['point'] < 1){
                return 'F';
            }
        }
        return @number_format($totalPoint / @$count, 2);
    }
}

if(!function_exists('gradePointByNumber')){
    function gradePointByNumber($number){
        if($number){
            $grade = MarksGrade::where([['start_marks','<=',(int)$number],['end_marks','>=',(int)$number]])->first();
            return (float)@$grade->grade_point;
        }else{
            return '0';
        }
    }
}

if(!function_exists('GPA')){
    function GPA($student_wise_subjects){
        $totalPoint = 0;
        // dd($student_wise_subjects);
        $count = count($student_wise_subjects);
        foreach ($student_wise_subjects as $key => $mark) {
            if($mark['subject_status'] == 'optional' && $mark['point'] == 1){
                $totalPoint += 0;
            }else{
               $totalPoint += $mark['point'];
            }
            if ((int)$mark['point'] < 1 && $mark['subject_status'] != 'optional') {
                return 'F';
            }
        }
        if($totalPoint !='0'){
            $point = number_format(@$totalPoint / @$count, 2);
        }elseif($totalPoint =='0'){
            $point = '0';
        }
       return getGrade($point);
    }
}
function getGrade($point){
    switch (true) {
        case ($point >= 4 && $point < 5):
            return "A";
        case ($point >= 3.5 && $point < 4):
            return "A-";
        case ($point >= 3 && $point < 3.5):
            return "B";
        case ($point >= 2 && $point < 3):
            return "C";
        case ($point == 1 && $point < 2):
            return "D";
        case ($point == 5):
            return "A+";
        default:
            return "Invalid Grade";
    }
}

if(!function_exists('studentPosition')){
    function studentPosition($request){
        $assign_main_subjects = AssignSubject::where('class_id',@$request['class_id'])->where('group_id',@$request['group_id'])->orderBy('subject_id','asc')->pluck('subject_id');
        $student_wise_subjects = $assign_main_subjects;
        $total_students = AssignStudent::with(['student'])->where('year_id',$request['year_id'])->where('class_id',$request['class_id'])->where('group_id',$request['group_id'])->where('shift_id',$request['shift_id'])->orderBy('student_id','asc')->get();
        if(@$request['exam_type_id']){
            $exam_types = Exam::select('exam_type_id')->with(['exam_type'])->where('exam_type_id',@$request['exam_type_id'])->where('status',1)->groupBy('exam_type_id')->get();
            $student_marks = StudentMarks::where('year_id',@$request['year_id'])->where('class_id',@$request['class_id'])->where('group_id',@$request['group_id'])->where('shift_id',@$request['shift_id'])->where('exam_type_id',@$request['exam_type_id'])->get();
        }else{
            $exam_types = Exam::select('exam_type_id')->with(['exam_type'])->where('status',1)->groupBy('exam_type_id')->get();
            $student_marks = StudentMarks::where('year_id',@$request['year_id'])->where('class_id',@$request['class_id'])->where('group_id',@$request['group_id'])->where('shift_id',@$request['shift_id'])->get();
        }

        foreach ($student_marks as $student_mark_key => $student_mark) {
            $mark_sheet[$student_mark->exam_type_id][$student_mark->student_id][$student_mark->subject_id]['total_mark']     = $student_mark->total_mark;
        }

        foreach ($student_wise_subjects as $student_wise_subject_key => $student_wise_subject) {
            foreach ($exam_types as $exam_type_key => $exam_type) {
                foreach ($total_students as $student_key => $total_student) {
                    @$data['position'][$total_student->student_id]['student_id']   = $total_student->student_id;
                    @$data['position'][$total_student->student_id]['all_total_mark']   += $mark_sheet[$exam_type->exam_type_id][$total_student->student_id][$student_wise_subject]['total_mark'];

                    if(in_array($student_wise_subject, [1,2])){
                        if(in_array($student_wise_subject, [1])){
                            @$data['position'][$total_student->student_id]['gpa_point']   += gradePointByNumber((int)(((int)@$mark_sheet[$exam_type->exam_type_id][$total_student->student_id][1]['total_mark']+(int)@$mark_sheet[$exam_type->exam_type_id][$total_student->student_id][2]['total_mark'])/2));
                            @$data['position'][$total_student->student_id]['subject_count'] += 1;
                        }
                    }else if(in_array($student_wise_subject, [3,4])){
                        if(in_array($student_wise_subject, [3])){
                            @$data['position'][$total_student->student_id]['gpa_point']   += gradePointByNumber((int)(((int)@$mark_sheet[$exam_type->exam_type_id][$total_student->student_id][3]['total_mark']+(int)@$mark_sheet[$exam_type->exam_type_id][$total_student->student_id][4]['total_mark'])/2));
                            @$data['position'][$total_student->student_id]['subject_count'] += 1;
                        }
                    }else{
                        @$data['position'][$total_student->student_id]['gpa_point']   += gradePointByNumber((int)@$mark_sheet[$exam_type->exam_type_id][$total_student->student_id][$student_wise_subject]['total_mark']);
                        @$data['position'][$total_student->student_id]['subject_count'] += 1;
                    }
                }
            }
        }

        array_multisort(
            array_column(@$data['position'], 'gpa_point'), SORT_DESC,
            array_column(@$data['position'], 'all_total_mark'), SORT_DESC,
            $data['position']
        );

        $only_student = array_column(@$data['position'], 'student_id');
        return ((int)array_search("12",$only_student)+1);
    }
}
