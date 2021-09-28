<?php

namespace App\Models\Exam;

use Dobine\Facades\DobineFacade;
use Doctrine\ORM\EntityRepository;
use Nettrine\ORM\EntityManagerDecorator;

/**
 * Class TestFacade
 */
class TestFacade extends DobineFacade {
	/** @var EntityManagerDecorator */
	private $entityManager;
	
	/** @var EntityRepository */
	private $repository;
	
	public function __construct(EntityManagerDecorator $entityManager) {
		$this->entityManager = $entityManager;
		$this->repository = $this->entityManager->getRepository(Test::class);
	}
	
	/**
	 * @param int $id
	 * @return Test|object|null
	 */
	public function getById($id): ?object {
		return $this->repository->findOneBy(["id" => $id]);
	}
}
