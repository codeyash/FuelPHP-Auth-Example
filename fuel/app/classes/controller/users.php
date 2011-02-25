<?php
class Controller_Users extends Controller_Common {
	public function before()
    {
        parent::before();
    }
	public function action_index()
	{
		$data['users'] = Model_Users::find('all');
		$this->template->title = "Users";
		$this->template->content = View::factory('users/index', $data);
	}
	public function action_login()
    {
        if(Auth::check())
        {
            Output::redirect('/'); // user already logged in
        }

        $val = Validation::factory('users');
        $val->add_field('username', 'Your username', 'required|min_length[3]|max_length[20]');
        $val->add_field('password', 'Your password', 'required|min_mength[3]|max_length[20]');
        if($val->run())
        {
            $auth = Auth::instance();
            if($auth->login($val->validated('username'), $val->validated('password')))
            {
                Session::set_flash('notice', 'FLASH: logged in');
                Output::redirect('users');
            }
            else
            {
                $data['username'] = $val->validated('username');
                $data['login_error'] = 'Wrong username/password. Try again';
            }
        }
        else
        {
            if($_POST)
            {
                $data['username'] = $val->validated('username');
                $data['login_error'] = 'Wrong username/password combo. Try again';
            }
            else
            {
                $data['login_error'] = false;
            }
        }
        $this->template->title = 'Login';
        $this->template->login_error = @$data['login_error'];
        $this->template->content = View::factory('users/login', $data);
    }
	public function action_view($id = null)
	{
		$data['users'] = Model_Users::find($id);
		
		$this->template->title = "Users";
		$this->template->content = View::factory('users/view', $data);
	}
	
	public function action_create($id = null)
	{
		if ($_POST)
		{
			$users = Model_Users::factory(array(
				'username' => Input::post('username'),
				'password' => Input::post('password'),
				'email' => Input::post('email'),
				'profile_fields' => Input::post('profile_fields'),
				'group' => Input::post('group'),
				'last_login' => Input::post('last_login'),
				'login_hash' => Input::post('login_hash'),
			));

			if ($users and $users->save())
			{
				Session::set_flash('notice', 'Added ' . $users . ' #' . $users->id . '.');

				Output::redirect('users');
			}

			else
			{
				Session::set_flash('notice', 'Could not save users.');
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::factory('users/create');
	}
	
	public function action_edit($id = null)
	{
		$users = Model_Users::find($id);

		if ($_POST)
		{
			$users->username = Input::post('username');
			$users->password = Input::post('password');
			$users->email = Input::post('email');
			$users->profile_fields = Input::post('profile_fields');
			$users->group = Input::post('group');
			$users->last_login = Input::post('last_login');
			$users->login_hash = Input::post('login_hash');

			if ($users->save())
			{
				Session::set_flash('notice', 'Updated ' . $users . ' #' . $users->id);

				Output::redirect('users');
			}

			else
			{
				Session::set_flash('notice', 'Could not update ' . $users . ' #' . $id);
			}
		}
		
		else
		{
			$this->template->set_global('users', $users);
		}
		
		$this->template->title = "Users";
		$this->template->content = View::factory('users/edit');
	}
	
	public function action_delete($id = null)
	{
		$users = Model_Users::find($id);

		if ($users and $users->delete())
		{
			Session::set_flash('notice', 'Deleted ' . $users . ' #' . $id);
		}

		else
		{
			Session::set_flash('notice', 'Could not delete ' . $users . ' #' . $id);
		}

		Output::redirect('users');
	}
	
	
}

/* End of file users.php */