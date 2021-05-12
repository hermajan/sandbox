<?php
declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\UI\Presenter;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {
	public function startup() {
		parent::startup();
		
		$this->template->meta = $this->presenter->context->getParameters()["meta"];
		
		$this->template->headerFile = "#header.latte";
		$this->template->menuFile = "#menu.latte";
		$this->template->footerFile = "#footer.latte";
	}
	
	public function beforeRender() {
		if($_ENV["APP_ENV"] == "production") {
			$this->template->minified = ".min";
		} else {
			$this->template->minified = "";
		}
	}
}
