<?php

namespace Drupal\first\Services;

use Drupal\Core\KeyValueStore\KeyValueFactoryInterface;

class StrGenerator
{
    private $keyValueFactory;
    private $useCache;

    public function __construct(KeyValueFactoryInterface $keyValueFactory,$useCache)
    {

        $this->keyValueFactory = $keyValueFactory;
        $this->useCache = $useCache;
    }

    public function generate($lenght)
    {
        $key = 'roar_' . $lenght;
        $store = $this->keyValueFactory->get('dino');
        if ($this->useCache && $store->has($key)) {
            return $store->get($key);
        }
        $string = 'Bonjour' . str_repeat("!", $lenght) . ' je suis la';
        if ($this->useCache) {
            $store->set($key, $string);
        }
        return $string;


    }
}