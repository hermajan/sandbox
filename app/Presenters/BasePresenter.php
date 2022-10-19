<?php
declare(strict_types = 1);

namespace App\Presenters;

use App\Services\MetaService;
use Contributte\Translation\LocalesResolvers\Session;
use Contributte\Translation\Translator;
use Nette\Application\AbortException;
use Nette\Application\UI\Presenter;
use Nette\Bridges\ApplicationLatte\DefaultTemplate;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter {
	/** @var Translator @inject */
	public Translator $translator;
	
	/** @var Session @inject */
	public Session $translatorSessionResolver;
	
	/** @var MetaService @inject */
	public MetaService $metaService;
	
	public function startup() {
		parent::startup();
		
		/** @var DefaultTemplate $template */
		$template = $this->getTemplate();
		$template->setParameters([
			"footerFile" => "#footer.latte",
			"locale" => $this->translator->getLocale(),
			"menuFile" => "#menu.latte",
			"metaService" => $this->metaService,
			"navbarFile" => "#navbar.latte"
		]);
	}
	
	public function beforeRender() {
		if($_ENV["APP_ENV"] == "production") {
			$minified = ".min";
		} else {
			$minified = "";
		}
		
		/** @var DefaultTemplate $template */
		$template = $this->getTemplate();
		$template->add("minified", $minified);
	}
	
	/**
	 * @throws AbortException
	 */
	public function handleChangeLocale($locale): void {
		$this->translatorSessionResolver->setLocale($locale);
		$this->translator->setLocale($locale);
		$this->redirect("this");
	}
}
