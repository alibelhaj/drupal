<?php

namespace Drupal\first\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\first\Services\StrGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends ControllerBase
{

    public $strGenerator;

    public function __construct(StrGenerator $strGenerator)
    {
        $this->strGenerator         = $strGenerator;
    }

    public function index($count)
    {
        $msg = $this->strGenerator->generate($count);
        return[
            "#title" =>$msg ,
            "#content" =>$msg
        ];
    }

    public static function create(ContainerInterface $container)
    {
        $strGenerator           = $container->get('str.generator');

        return new static($strGenerator);
    }
}