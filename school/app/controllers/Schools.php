<?php

/**
 * schools controller
 */
class Schools extends Controller
{
	
	public function index()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$school = new School();
 
		$data = $school->findAll();

		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];

		if(Auth::access('super_admin')){
			$this->view('schools',[
				'crumbs'=>$crumbs,
				'rows'=>$data
			]);
		}else{
			$this->view('error');
		}
	}

	public function add()
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$errors = array();
		if(count($_POST) > 0 && Auth::access('super_admin'))
 		{

			$school = new School();
			if($school->validate($_POST))
 			{
 				
 				$_POST['date'] = date("Y-m-d H:i:s");

 				$school->insert($_POST);
 				$this->redirect('schools');
 			}else
 			{
 				//errors
 				$errors = $school->errors;
 			}
 		}

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Add','schools/add'];
		if(Auth::access('super_admin')){// only super admins can view the add,edit,delete options
			$this->view('addSchools',[
				'errors'=>$errors,
				'crumbs'=>$crumbs,
				
			]);
		}else{
			$this->view('error');
		}


	}

	public function edit($id = null)
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$school = new School();

		$errors = array();
		if(count($_POST) > 0 && Auth::access('super_admin'))  //only super admins can edit
 		{

			if($school->validate($_POST))
 			{
 				
 				$school->update($id,$_POST);
 				$this->redirect('schools');
 			}else
 			{
 				//errors
 				$errors = $school->errors;
 			}
 		}

 		$row = $school->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Edit','schools/edit'];

		if(Auth::access('super_admin')){

			$this->view('editSchools',[
				'row'=>$row,
				'errors'=>$errors,
				'crumbs'=>$crumbs,
			]);
		}else{
			$this->view('error');
		}


	}

	public function delete($id = null)
	{
		// code...
		if(!Auth::logged_in())
		{
			$this->redirect('login');
		}

		$school = new School();

		$errors = array();

		if(count($_POST) > 0 && Auth::access('super_admin'))
 		{
 
 			$school->delete($id);
 			$this->redirect('schools');
 		 
 		}

 		$row = $school->where('id',$id);

 		$crumbs[] = ['Dashboard',''];
		$crumbs[] = ['Schools','schools'];
		$crumbs[] = ['Delete','schools/delete'];
		if(Auth::access('super_admin')){
			$this->view('deleteSchools',[
				'row'=>$row,
	 			'crumbs'=>$crumbs,
			]);
		}else{
			$this->view('error');
		}


	}
	
}
