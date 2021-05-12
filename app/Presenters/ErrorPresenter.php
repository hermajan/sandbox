<?php
declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\{BadRequestException, Helpers, IPresenter, IResponse, Request};
use Nette\Application\Responses\{CallbackResponse, ForwardResponse};
use Nette\Http\{IRequest, IResponse as HttpIResponse};
use Nette\SmartObject;
use Tracy\ILogger;

final class ErrorPresenter implements IPresenter {
	use SmartObject;
	
	/** @var ILogger */
	private $logger;
	
	public function __construct(ILogger $logger) {
		$this->logger = $logger;
	}
	
	/**
	 * @param Request $request
	 * @return IResponse
	 */
	public function run(Request $request): IResponse {
		$e = $request->getParameter("exception");
		
		if($e instanceof BadRequestException) {
			// $this->logger->log("HTTP code {$e->getCode()}: {$e->getMessage()} in {$e->getFile()}:{$e->getLine()}", "access");
			[$module, , $sep] = Helpers::splitName($request->getPresenterName());
			$errorPresenter = $module.$sep."Error4xx";
			return new ForwardResponse($request->setPresenterName($errorPresenter));
		}
		
		$this->logger->log($e, ILogger::EXCEPTION);
		return new CallbackResponse(function(IRequest $httpRequest, HttpIResponse $httpResponse): void {
			if(preg_match("#^text/html(?:;|$)#", (string)$httpResponse->getHeader("Content-Type"))) {
				require __DIR__."/../templates/Error/500.phtml";
			}
		});
	}
}
