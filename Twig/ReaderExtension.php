<?php

namespace Seyon\PHPBB3\AdminBundle\Twig;

class ReaderExtension extends \Twig_Extension
{
    
    protected $container;

    public function __construct($conatiner) {
        $this->container = $conatiner;
    }
    
    public function getFunctions() {
        return array(
            new \Twig_SimpleFunction('getPHPBB3Posts', array($this, 'getPosts')),
            new \Twig_SimpleFunction('checkPHPBB3PostReadAccess', array($this, 'checkReadAccess')),
        );
    }
    
    public function getPosts($limit = 10, $forum = 0, $topic = 0){
        return $this->container->get('seyon_phpbb3_reader')->getPosts($limit, $forum, $topic);
    }
    
    public function checkReadAccess($post){
        return $this->container->get('seyon_phpbb3_reader')->checkReadAccess($post);
    }

    public function getName() {
        return 'seyon_phpbb3_admin_twig_reader';
    }
}