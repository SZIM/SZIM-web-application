<?php

namespace SZIM\MainBundle\Controller;

use SZIM\MainBundle\Entity\Page;
use SZIM\MainBundle\Entity\ShortCode;
use SZIM\MainBundle\Models\SZIMPage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction($page = 'index') {

        $page_class = new SZIMPage($this, $page);
        $content = $page_class->getContent();

        return $this->render('SZIMMainBundle:Default:index.html.twig', array('content' => $content));
    }

    public function testdata_plainpagesAction() {

        $em = $this->getDoctrine()->getManager();

        $page = new Page();
        $page->setName('test1');
        $page->setVersion('0.0.1');
        $page->setStatus('deployed');
        $page->setContent('<h1> Strona testowa1 </h1>');

        $em->persist($page);
        $em->flush();

        $page = new Page();
        $page->setName('test2');
        $page->setVersion('0.0.1');
        $page->setStatus('deployed');
        $page->setContent('<h1> Strona testowa2 </h1>');

        $em->persist($page);
        $em->flush();

        $page = new Page();
        $page->setName('index');
        $page->setVersion('0.0.1');
        $page->setStatus('deployed');
        $page->setContent('<h1> Strona główna </h1>');

        $em->persist($page);
        $em->flush();

        return 1;
    }

    public function testdata_pageswithshortcodesAction() {
        $em = $this->getDoctrine()->getManager();

        $page = new Page();
        $page->setName('testshortcodes1');
        $page->setVersion('0.0.1');
        $page->setStatus('deployed');
        $page->setContent('<h1> Strona testowa ShortCode 1  </h1> <br /> [Program]');

        $em->persist($page);
        $em->flush();

        $page = new Page();
        $page->setName('testshortcodes2');
        $page->setVersion('0.0.1');
        $page->setStatus('deployed');
        $page->setContent('<h1> Strona testowa ShortCode 2  </h1> <br/> [Program]<br />[Program]<br />[Program]');

        $em->persist($page);
        $em->flush();
    }

    public function testdata_shortcodesAction() {
        $em = $this->getDoctrine()->getManager();

        $shortcode = new ShortCode();
        $shortcode->setName('PROGRAM');
        $shortcode->setBundle('Program');
        $shortcode->setAction('index');
        $shortcode->setVersion('0.0.1');
        $shortcode->setPackage('SZIM');
        $shortcode->setControllerName('Default');
        $em->persist($shortcode);
        $em->flush();
    }

}
