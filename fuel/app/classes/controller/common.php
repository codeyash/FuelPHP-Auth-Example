<?php

class Controller_Common extends Controller_Template {

    public function before()
    {
        parent::before();
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

/* End of file common.php */