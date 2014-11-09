<?php

use \dmyers\mvc\controller;

class mainController extends controller {

	public function indexAction() {
		echo 'mainController::indexAction';
	}

	public function viewAction() {
		$this->data['welcome'] = 'Ready To Go!';

		$this->c->view->load('index',$this->data);
	}

	public function configAction() {
		$mongo = $this->c->config->mongo('something');

		d($mongo);

		d($this->c->config);
	}

	public function pageAction() {
		$this->c->page
			->theme('orange')
			->plugin('drfoo')
			->js('foobar/here.js')
			->title('foobar')
			->build();
	}

	public function validateAction() {
		$foo = '11';
		$abc = '';

		$this->c->validate->single('hexcolor',$foo,'human');
		$this->c->validate->filter('hexcolor',$foo);
		$this->c->validate->single('is_integer',$foo,'second');

		d($foo);

		$this->c->validate->filter('if_empty[123]',$abc);
		d('ABC = "'.$abc.'"');

		echo '<pre>'.$this->c->validate->error_string().'</pre>';

		echo 'test';
	}

	public function route2meAction($input=NULL) {
		$this->data['welcome'] = $input;

		$this->c->view->load('index',$this->data);
	}

	public function cacheAction() {
		$container = &$this->c;

		$this->c->cache->foo(function($container) {
			return 'bar';
		});

		$x = $this->c->cache->foo();

		echo 'Value of foo: bar';
		d($x);

		$this->c->cache->foo('this is new content');

		$x = $this->c->cache->foo();

		echo 'Value of foo: this is new content';
		d($x);

		$x = $this->c->cache->skunk();

		echo 'Value of skunk: null';
		d($x);

		$x = $this->c->cache->skunk('true dat!');

		echo 'Value of skunk: true dat!';
		d($x);

		$s = (string)$this->c->cache;

		echo 'Value of cache (data): array of $data';
		d($s);


		$this->c->cache->skunk('');

		$s = $this->c->cache->skunk();
		echo 'Value of shunk: null';
		d($s);


		echo 'clean()';
		$this->c->cache->clean();

		echo 'Done';
	}

} /* end Controller */