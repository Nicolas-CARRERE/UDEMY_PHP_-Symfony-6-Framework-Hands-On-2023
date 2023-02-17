<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HelloController extends AbstractController
{
  private array $messages = [
    ['message' => 'Hello', 'created' => '2023/02/14'],
    ['message' => 'Hi', 'created' => '2022/12/14'],
    ['message' => 'Bye!', 'created' => '2021/05/12']
  ];

  #[Route('/{limit<\d+>?3}', name: 'app_index')]
  public function index(int $limit): Response
  {
    return $this->render(
      'hello/index.html.twig',
      [
        'messages' => $this->messages,
        'limit' => $limit
      ]
      );
  }

  #[Route('/messages/{id<\d+>}', name: 'app_show_one', requirements: ['id' => '\d+'])]
  public function showOne(int $id): Response
  {
    return $this->render(
      'hello/show_one.html.twig',
      [
        'message' => $this->messages[$id]
      ]
    );
  }

}