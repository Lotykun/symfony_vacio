<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function index()
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'description' => $product->getDescription(),
        ]);
    }
    
    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(Product $product)
    {
        if (!$product) {
            throw $this->createNotFoundException('No product found for id');
        }

        return $this->render('product/show.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
        ]);
    }
    
    /**
     * @Route("/product/edit/{id}", name="product_edit")
     */
    public function update(Product $product)
    {
        if (!$product) {
            throw $this->createNotFoundException('No product found for id ');
        }
        $entityManager = $this->getDoctrine()->getManager();
        $product->setName('New product name!');
        $entityManager->flush();
        
        return $this->render('product/show.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
        ]);
    }
}
