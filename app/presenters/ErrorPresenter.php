<?php
namespace App\Presenters;

use Nette\Application\{BadRequestException, Helpers, IPresenter, Request};
use Nette\Application\Responses\{CallbackResponse, ForwardResponse};
use Nette\Http\{IRequest, IResponse};
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
	 * @return CallbackResponse|ForwardResponse|IResponse
	 */
	public function run(Request $request) {
		$e = $request->getParameter("exception");
		
		if($e instanceof BadRequestException) {
			// $this->logger->log("HTTP code {$e->getCode()}: {$e->getMessage()} in {$e->getFile()}:{$e->getLine()}", "access");
			list($module, , $sep) = Helpers::splitName($request->getPresenterName());
			$errorPresenter = $module . $sep . "Error4xx";
			return new ForwardResponse($request->setPresenterName($errorPresenter));
		}
		
		$this->logger->log($e, ILogger::EXCEPTION);
		return new CallbackResponse(function(IRequest $httpRequest, IResponse $httpResponse) {
			if(preg_match("#^text/html(?:;|$)#", $httpResponse->getHeader("Content-Type"))) {
				require __DIR__ . "/../templates/Error/500.phtml";
			}
		});
	}
}
