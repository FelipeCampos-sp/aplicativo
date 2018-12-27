<?php
class Controller {
    private $viewData;
	public function renderView(string $viewName, array $viewData) {
        $this->viewData = $viewData;
		extract($viewData);
		require 'view/'.$viewName.'.php';
	}

	public function renderTemplate(string $viewName, array $viewData) {
        $this->viewData = $viewData;
		require 'view/template.php';
	}

	public function renderViewToTemplate(string $viewName, array $viewData) {
        $this->viewData = $viewData;
		extract($viewData);
		require 'view/'.$viewName.'.php';
	}

}