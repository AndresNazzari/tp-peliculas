<?php

class ProductService
{
    private $productRepository;

    public function __construct($productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getByCategory(string $category)
    {
        return $this->productRepository->getByCategory($category);
    }

    public function getById(int $id)
    {
        return $this->productRepository->getById($id);
    }

    public function create(array $request)
    {
        $data = $this->parseRequestToData($request); 

        $this->productRepository->create($data);
    }

    public function update(int $id, array $request)
    {
        $data = $this->parseRequestToData($request); 
        
        $this->productRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $this->productRepository->delete($id);
    }

    private function parseRequestToData(array $request)
    {
        return [
            'title' => $request['title'],
            'image' => $request['image'],
            'description' => $request['description'],
            'brand' => $request['brand'],
            'model' => $request['model'],
            'color' => $request['color'],
            'category' => $request['category'],
            'price' => $request['price'],
            'discount' => $request['discount'],
        ];
    }
}