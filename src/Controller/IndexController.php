<?php
declare (strict_types = 1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	private const CONTENT_FILE = __DIR__ . '/../../var/content.txt';

	/**
	 * @var Request|null
	 */
	private $request;

	/**
	 * @var string
	 */
	private $action;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @Route("/{path?}", name="index", requirements={"path"=".*"})
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request): Response {
		$this->setRequest($request);
		switch ($this->action) {
			case 'update' :
				return $this->updateAction();
			case 'edit' :
				return $this->editAction();
			default :
				return $this->showAction();
		}
	}

	/**
	 * @return string
	 */
	private static function getContent(): string {
		return file_get_contents(self::CONTENT_FILE);
	}

	/**
	 * @return bool
	 */
	private function isPost(): bool {
		if (!$this->request) {
			throw new \RuntimeException();
		}
		return $this->request->getMethod() === 'POST';
	}

	/**
	 * @param Request $request
	 */
	private function setRequest(Request $request) {
		$this->request = $request;
		$this->action  = $request->get('action');
		$this->path    = $request->get('path');
	}

	/**
	 * @return Response
	 */
	public function showAction(): Response {
		$content = self::getContent();
		return $this->render('index/index.html.twig', ['content' => $content]);
	}

	/**
	 * @return Response
	 */
	private function editAction(): Response {
		return $this->render('index/edit.html.twig', [
			'path'    => $this->path,
			'content' => self::getContent()
		]);
	}

	/**
	 * @return Response
	 */
	private function updateAction(): Response {
		if ($this->isPost()) {
			$scms = $this->request->get('scms');
			if (is_array($scms)) {
				$isSubmit = $scms['submit'] ?? false;
				if ($isSubmit) {
					$content = $scms['content'] ?? false;
					if (is_string($content)) {
						file_put_contents(self::CONTENT_FILE, $content);
					}
				}
			}
		}
		return $this->redirectToRoute('index', ['action' => 'edit', 'path' => $this->path]);
	}
}
