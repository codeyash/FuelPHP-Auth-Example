<?php

class Controller_Common extends Controller_Template {

    public function before()
    {
        parent::before();
        $uri_string = explode('/', Uri::string());
        Log::info('Uri::string() = '.Uri::string().')');
        if ($uri_string[0] != 'users' and $uri_string[1] != 'login')
        {
            if(\Auth::check())
            {
                $user = Auth::intstance()->get_user_id();
                $this->user_id = $user[1];
                $this->template->logged_in = true;
            }
            else
            {
                $this->template->logged_in = false;
                \Output::redirect('/users/login');
            }
        }
    }
}

/* End of file common.php */