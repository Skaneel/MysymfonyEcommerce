<?php

namespace App\Controller;

use App\Entity\Product;
use App\Service\OrdersService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order/add-to-card/{id}", name="order_add_to_card")
     */
    public function addToCard(Product $product, OrdersService $ordersService, Request $request)
    {
        $ordersService->addToCart($product);
        $referer = $request->headers->get('Referer');

        return $this->redirect($referer);
    }
}
