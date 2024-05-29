<?php

class categoriesService
{
    private $categoriesRepository;

    public function __construct($categoriesRepository)
    {
        $this->categoriesRepository = $categoriesRepository;
    }

    public function getAll()
    {
        return $this->categoriesRepository->getAll();
    }
}