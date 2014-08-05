<?php

namespace SZIM\MainBundle\Controller;

use SZIM\MainBundle\Entity\Page;
use SZIM\MainBundle\Entity\ShortCode;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction($page = 'index') {

        //MA - get content basedon params
        $page_repository = $this->getDoctrine()
                ->getRepository('SZIMMainBundle:Page');

        $page = $page_repository->findOneBy(array('name' => $page, 'status' => 'deployed'));
        $content = $page->getContent();

        //MA - substitute htmls for shortcodes
        $shortcodes_pattern = '/\[([\w\ ]+)\]/';

        $shortcodes_repository = $this->getDoctrine()
                ->getRepository('SZIMMainBundle:ShortCode');

        while (preg_match($shortcodes_pattern, $content, $shortcode_name) == 1) {
            echo $shortcode_name['1'];
            $shortcode_name = $shortcode_name['1'];
            $text_to_replace = '/\[' . $shortcode_name . '\]/';
            $shortcode_db_name = strtoupper($shortcode_name);

            $shortcode = $shortcodes_repository->findOneBy(array('name' => $shortcode_db_name));
            if (isset($shortcode)) {
                $action_string = 'SZIM' . $shortcode->getBundle() . 'Bundle';
                $action_string .= ':Default:';
                $action_string .= $shortcode->getAction();
               
                $response = $this->forward($action_string);
                $action_html_response = $response->getContent();
               
                $content = preg_replace($text_to_replace, $action_html_response, $content);
              
            } else {
                $content = '';
            }
        }



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

        $em->persist($shortcode);
        $em->flush();
    }

}
