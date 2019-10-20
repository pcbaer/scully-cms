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
	 * @Route("/", name="index")
	 *
	 * @return Response
	 */
	public function index(): Response {
		$content = file_get_contents(self::CONTENT_FILE);

		return $this->render('index/index.html.twig', [
			'content' => $content
		]);
	}

	/**
	 * @Route("/save", name="save")
	 *
	 * @param Request
	 * @return Response
	 */
	public function save(Request $request): Response {
		$content = $request->get('content');
		file_put_contents(self::CONTENT_FILE, $content);

		return $this->redirectToRoute('index');
	}
}
