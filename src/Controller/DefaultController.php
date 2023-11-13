<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Contact;
use App\Entity\Post;
use App\Repository\CarouselRepository;
use App\Repository\ContactRepository;
use App\Repository\PostRepository;
use App\Repository\ServiceRepository;
use App\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(
        Request $request,
    ): Response {
        return $this->render('default/homepage.html.twig', []);
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/about', name: 'about_page', defaults: ['id' => '1', '_format' => 'html'],)]
    public function about(Company $company, CarouselRepository $carouselRepository): Response
    {


        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/about.html.twig', [
            'company' => $company,
            'carousel' => $carousel
        ]);
    }

    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/services', name: 'services_page', defaults: ['id' => '1', '_format' => 'html'],)]
    public function services(Company $company, ServiceRepository $serviceRepository, CarouselRepository $carouselRepository): Response
    {



        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/services.html.twig', [
            'company' => $company,
            'carousel' => $carousel,
            'services' => $serviceRepository->findAll()
        ]);
    }
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/services/{id}', name: 'service_page', defaults: ['companyId' => '1', '_format' => 'html'],)]
    public function service(Post $post, Company $company, ServiceRepository $serviceRepository, CarouselRepository $carouselRepository): Response
    {

        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/service.html.twig', [
            'company' => $company,
            'service' => $post,
            'carousel' => $carousel,
            'services' => $serviceRepository->findAll()
        ]);
    }
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/products/list', name: 'products_page', defaults: ['id' => '1','companyId'=>1, '_format' => 'html'],)]
    #[Route('/products/page/{page<[1-9]\d{0,8}>}', name: 'products_index_list__paginated', defaults: ['id' => '1','companyId'=>1,'_format' => 'html'], methods: ['GET'])]
    #[Cache(smaxage: 10)]
    public function products(
        Company $company,
        ServiceRepository $serviceRepository, 
        CarouselRepository $carouselRepository,
        Request $request, 
        int $page, 
        string $_format, 
        PostRepository $posts, 
        TagRepository $tags): Response
        {
            $tag = null;
            if ($request->query->has('tag')) {
                $tag = $tags->findOneBy(['name' => $request->query->get('tag')]);
            }
            $latestPosts = $posts->findLatest($page, $tag);
                  
        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/products.html.twig', [
            'company' => $company,
            'carousel' => $carousel,
            'products' => $latestPosts,
            'services' => $serviceRepository->findAll()
        ]);
    }
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/products/{id}', name: 'product_page', defaults: ['companyId' => '1', '_format' => 'html'],)]
    public function product(
        Post $post, 
        ServiceRepository $serviceRepository, 
        CarouselRepository $carouselRepository,
        
        PostRepository $posts, 
        TagRepository $tags
        ): Response
    {


        
        $tag = $post->getTags()[0];
        
        $latestPosts = $posts->findLatest(1, $tag);

              
        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/product.html.twig', [
            //'company' => $company,
            'products' => $latestPosts,
            'product' => $post,
            'carousel' => $carousel,
        ]);
    }
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     */
    #[Route('/contacts', name: 'contacts_page', defaults: ['id' => '1', 'contact' => 1, '_format' => 'html'],)]
    public function contact(Company $company, Contact $contact, CarouselRepository $carouselRepository): Response
    {

        $carousel = $carouselRepository->find(rand(1, $carouselRepository->count([]) - 1));
        return $this->render('default/contact.html.twig', [
            'company' => $company,
            'carousel' => $carousel,
            'contact' => $contact,
        ]);
    }
}
