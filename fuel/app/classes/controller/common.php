<?php

class Controller_Common extends Controller_Template {

	public function action_index()
	{
		$this->template->title = 'Common &raquo Index';
		$this->template->content = View::factory('common/index');
	}

}

/* End of file common.php */