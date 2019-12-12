<?php namespace App\Controllers;

      use CodeIgniter\I18n\Time;	
class Students extends BaseController
{

	public function index($page = 'block',$block = "I")
	{ 

      if ( ! is_file(APPPATH.'/Views/students/'.$page.'.php'))
      {
          // Whoops, we don't have a page for that!
          throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
      }

      $studentsModel = new \App\Models\StudentsModel();
      $attendanceModel = new \App\Models\AttendanceModel();
      $blocksModel = new \App\Models\BlocksModel();
      $students = $studentsModel->where('block',$block)->findAll();
      $blocks = $blocksModel->findAll();
      $data['blocks'] = $blocks;
      $data['title'] = ucfirst($page); // Capitalize the first letter
      
      $data['page'] = $page;
      $data['students'] = $students;


      $names = $studentsModel->findColumn('lastname');
      $data['names'] = $names;
      $session = session();
      if($session->getFlashdata('success_message')){
        $data['success_message'] = $session->getFlashdata('success_message');
      }

      helper('date');
      $datestring = 'Y-m-d';

	  date_default_timezone_set('Etc/GMT-8');
	  $time = time();
	  $data['today'] =  date($datestring, $time);

	  $attendees = $attendanceModel->where('date_attendance',(string)$data['today'])->findColumn('student_id');
	  $data['attendees'] = $attendees;
	  // echo $myTime;
      echo view('templates/header', $data);
      echo view('students/'.$page, $data);
      echo view('templates/footer', $data);
  }

  public function add() {
  	helper('form');

  	$model = new \App\Models\StudentsModel();
  	$blocksModel = new \App\Models\BlocksModel();
  	$req_method = \Config\Services::request()->getMethod();

  	$blocks = $blocksModel->findAll();
    $data['blocks'] = $blocks;

   if($req_method == 'post' && $this->validate([
   	'lastname' => 'required',
   	'firstname' => 'required',
   	'block' => 'required',
   	'student_num' => 'required',
   ])) {

   	$model->save([
   		'lastname' => $this->request->getVar('lastname'),
   		'firstname' => $this->request->getVar('firstname'),
   		'block' => $this->request->getVar('block'),
   		'student_num' => $this->request->getVar('student_num')
   	]);

	 $data['success_message'] = $this->request->getVar('firstname')." is successfully added";   	

   }


    $data['title'] = 'Add Student';
    $data['method'] = 'add';
    $data['page'] = 'add';
    echo view('templates/header', $data);
    echo view('students/add', $data);
    echo view('templates/footer', $data);
  }


    
    // helper('form');
    // $model = new \App\Models\BooksModel();
    // $request_method =  \Config\Services::request()->getMethod();

   
    // if( $request_method == 'post' && $this->validate([
    //     'isbn'  => 'required',
    //     'title' => 'required|min_length[3]|max_length[255]',
    //     'short_description' => 'required',
    //     'publication_date'  => 'required',
    //     'price'  => 'required'    
    //   ]) ) {
       
      
    //   $pdf_file = $this->request->getFile('pdf_file');
    //   $pdf_file_name = $pdf_file->getRandomName();
    //   if ($pdf_file->isValid() && ! $pdf_file->hasMoved()){
    //       $pdf_file->move(ROOTPATH.'public/uploads', $pdf_file_name);
    //   }

    //   $cover_photo = $this->request->getFile('cover_photo');
    //   $cover_photo_file_name = $cover_photo->getRandomName();
    //   if ($cover_photo->isValid() && ! $cover_photo->hasMoved()){
    //       $cover_photo->move(ROOTPATH.'public/uploads', $cover_photo_file_name);
    //   }

    //   $model->save([
    //     'isbn' => $this->request->getVar('isbn'),
    //     'title'  => $this->request->getVar('title'),
    //     'short_description'  => $this->request->getVar('short_description'),
    //     'publication_date'  => $this->request->getVar('publication_date'),
    //     'price'  =>  (int)$this->request->getVar('price'),
    //     'pdf_file' => $pdf_file_name,
    //     'cover_photo' => $cover_photo_file_name
    //   ]);


    //   $data['success_message'] = $this->request->getVar('title')." is created successfully";
    // }

    //   $data['title'] = 'Create New Book';
    //   $data['controller'] = 'books';
    //   $data['page'] = 'create';

    //   echo view('templates/header', $data);
    //   echo view('books/create', $data);
    //   echo view('templates/footer', $data);
}
