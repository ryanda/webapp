<?php
	class LarapusController extends BaseController {

		protected $layout = 'larapus.layout.master';
		public function dashboard() {
			$this->layout->content = View::make('larapus.dashboard.index')->withTitle('Dashboard');
		}
	}