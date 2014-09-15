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


class SZIMPage {

    private $page;
    private $page_content;
    private $controller;
    private $doctrin_container;
    private static $shortcodes_pattern = '/\[([\w\ ]+)\]/';

    public function __construct($controller, $page = 'index') {
        $this->page = $page;
        $this->controller = $controller;
        $this->doctrin_container = $controller->getDoctrine();
    }

    public function getContent() {
        $this->page_content = $this->getPageContent();
        $this->handleShortCodes();
        return $this->page_content;
    }

    private function getPageContent() {
        $page_repository = $this->getRepository('Page');
        //QA - status to enum
        $page_entity = $page_repository->findOneBy(array('name' => $this->page, 'status' => 'deployed'));
        $result = '';
        if (isset($page_entity)) {
            $result = $page_entity->getContent();         
        }

        return $result;
    }

    private function handleShortCodes() {
        $shortcodes_repository = $this->getRepository('ShortCode');
        while (preg_match(self::$shortcodes_pattern, $this->page_content, $shortcode_name) == 1) {
            $this->replaceShortCode($shortcodes_repository, $shortcode_name['1']);
        }
    }

    private function getRepository($repository_name) {
        return $this->doctrin_container->getRepository("SZIMMainBundle:{$repository_name}");
    }

    private function replaceShortCode($shortcodes_repository, $shortcode_name) {
        $text_to_replace = '/\[' . $shortcode_name . '\]/';
        $shortcode_db_name = strtoupper($shortcode_name);
        $shortcode = $shortcodes_repository->findOneBy(array('name' => $shortcode_db_name));
        if (isset($shortcode)) {
            // shortcode found
            $action_string = $this->generateActionString($shortcode);
            $response = $this->controller->forward($action_string);
            $replace_string = $response->getContent();
        } else {
            // shortcode not found
            $replace_string = '';
        }
        $this->page_content = preg_replace($text_to_replace, $replace_string, $this->page_content);
    }

    private function generateActionString($shortcode) {
            $tmp_package = $shortcode->getPackage();
            $tmp_bundle = $shortcode->getBundle();
            $tmp_action = $shortcode->getAction();
            $tmp_controller = $shortcode->getControllerName();

            return $tmp_package . $tmp_bundle . 'Bundle:' . $tmp_controller . ':' . $tmp_action;
    }
}
