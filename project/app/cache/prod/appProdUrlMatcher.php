<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // szim_program_homepage
        if (0 === strpos($pathinfo, '/program') && preg_match('#^/program/(?P<params>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'szim_program_homepage')), array (  '_controller' => 'SZIM\\ProgramBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/testdata')) {
            if (0 === strpos($pathinfo, '/testdata/p')) {
                // szim_create_test_data_plain_pages
                if ($pathinfo === '/testdata/plainpages') {
                    return array (  '_controller' => 'SZIM\\MainBundle\\Controller\\DefaultController::testdata_plainpagesAction',  '_route' => 'szim_create_test_data_plain_pages',);
                }

                // szim_create_test_data_pages_with_shortcodes
                if ($pathinfo === '/testdata/pageswithshortcodes') {
                    return array (  '_controller' => 'SZIM\\MainBundle\\Controller\\DefaultController::testdata_pageswithshortcodesAction',  '_route' => 'szim_create_test_data_pages_with_shortcodes',);
                }

            }

            // szim_create_test_data_shortcodes
            if ($pathinfo === '/testdata/shortcodes') {
                return array (  '_controller' => 'SZIM\\MainBundle\\Controller\\DefaultController::testdata_shortcodesAction',  '_route' => 'szim_create_test_data_shortcodes',);
            }

        }

        // szim_main_homepage
        if (preg_match('#^/(?P<page>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'szim_main_homepage')), array (  '_controller' => 'SZIM\\MainBundle\\Controller\\DefaultController::indexAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
