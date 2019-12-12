<?php namespace App\Controllers;
use CodeIgniter\I18n\Time;
class Attendance extends BaseController
{

	public function index($page = 'home')
	{
      // if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
      // {
      //     // Whoops, we don't have a page for that!
      //     throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      // }

      // $data['title'] = ucfirst($page); // Capitalize the first letter
      // $data['controller'] = 'pages';
      // $data['page'] = $page;

      // echo view('templates/header', $data);
      // echo view('pages/'.$page, $data);
      // echo view('templates/footer', $data);
	}

  public function list_dates() {
    $model = new \App\Models\AttendanceModel();
    $blocksModel = new \App\Models\BlocksModel();

    $dates = $model->groupBy('date_attendance','asc')->findAll();
    $blocks = $blocksModel->findAll();
    $data['dates'] = $dates;
    $data['blocks'] = $blocks;


    echo view('templates/header', $data);
    echo view('attendance/datelists', $data);
    echo view('templates/footer', $data);

  }

  public function present($block,$date) {
      $model = new \App\Models\AttendanceModel();
      $studentModel = new \App\Models\StudentsModel();
      $data['title'] = "present";
      // $attendees = $model->where('date_attendance',$date)->columnname('student_id')->findAll();

     $attendees = $model->where('date_attendance',$date)->where('status','present')->findColumn('student_id');
     if(isset($attendees)) {
        $students = $studentModel->where('block',$block)->find($attendees);
        $data['students'] = $students; 
      }
      echo view('templates/header', $data);
      echo view('attendance/present', $data);
      echo view('templates/footer', $data);
  }

  public function absent($block,$date) {
      $data['title'] = "absent";
      $model = new \App\Models\AttendanceModel();
      $studentModel = new \App\Models\StudentsModel();
      
      $attendees = $model->where('date_attendance',$date)->where('status','absent')->findColumn('student_id');
      if(isset($attendees)) {
        $students = $studentModel->where('block',$block)->find($attendees);
        $data['students'] = $students; 
      }
      echo view('templates/header', $data);
      echo view('attendance/absent', $data);
      echo view('templates/footer', $data);

  }


  public function take_attendance($student_id = 0) {
    $attendanceModel = new \App\Models\AttendanceModel();
    $studentModel = new \App\Models\StudentsModel();


    helper('date');
    $datestring = 'Y-m-d';

    date_default_timezone_set('Etc/GMT-8');
    $time = time();
    $today =  date($datestring, $time);
    // echo $myTime;
    
    $attendanceModel->save([
      'student_id' => (int)$student_id,
      'status' =>'present',
      'date_attendance' => $today,
    ]);

    $student = $studentModel->find($student_id);
    
    $success_message = $student['firstname'] . ' ' . $student['lastname'] . ' with student id num '  . $student['student_num'] .' attendance taken';
   

    return redirect()->to(base_url() . 'attendance/public/students/block/' . $student['block'])->with('success_message', $success_message);
    
  }

  public function take_absence($student_id = 0) {
    $attendanceModel = new \App\Models\AttendanceModel();
    $studentModel = new \App\Models\StudentsModel();


    helper('date');
    $datestring = 'Y-m-d';

    date_default_timezone_set('Etc/GMT-8');
    $time = time();
    $today =  date($datestring, $time);
    // echo $myTime;
    
    $attendanceModel->save([
      'student_id' => (int)$student_id,
      'status' =>'absent',
      'date_attendance' => $today,
    ]);

    $student = $studentModel->find($student_id);
    
    $success_message = $student['firstname'] . ' ' . $student['lastname'] . ' with student id num '  . $student['student_num'] .' attendance taken';
   

    return redirect()->to(base_url() . 'attendance/public/students/block/' . $student['block'])->with('success_message', $success_message);
    
  }

	//--------------------------------------------------------------------

}
