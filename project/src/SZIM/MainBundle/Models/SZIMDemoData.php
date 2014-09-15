<?php

/**
 * Entiti class represent ShortCode record
 *
 * @author Mateusz Antkowiak
 * @version 0.0.1
 */

namespace SZIM\MainBundle\Models;
use SZIM\MainBundle\Entity\Page;
use SZIM\MainBundle\Entity\ShortCode;

class SZIMDemoData {
	private $controller;

	public function __construct($controller) {
		$this->controller = $controller;
	}

	public function install_demo_data() {
		$this->install_pages();
		$this->install_shortcodes();

		return true;
	}

	private function install_pages() {
        $em = $this->controller->getDoctrine()->getManager();

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

	private function install_shortcodes() {
		$em = $this->controller->getDoctrine()->getManager();

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