<?php

/**
 * Entiti class represent ShortCode record
 *
 * @author Mateusz Antkowiak
 * @version 0.0.3
 */

namespace SZIM\MainBundle\Controller;

use SZIM\MainBundle\Entity\Page;
use SZIM\MainBundle\Entity\ShortCode;
use SZIM\MainBundle\Models\SZIMPage;
use SZIM\MainBundle\Models\SZIMDemoData;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction($page = 'index') {

        $page_class = new SZIMPage($this, $page);
        $content = $page_class->getContent();

        return $this->render('SZIMMainBundle:Default:index.html.twig', array('content' => $content));
    }

    public function testdataAction() {
        // $this->getDoctrine()->getManager();
        $demodate = new SZIMDemoData($this);
        $result = $demodate->install_demo_data();
        $content = 'Nie udało się zainstalować danych demo.';
        if ($result == 1) {$content = 'Poprawnie zainstalowano dane demo.';}
        return $this->render('SZIMMainBundle:Default:demodata.html.twig', array('content' => $content));;
    }

}
