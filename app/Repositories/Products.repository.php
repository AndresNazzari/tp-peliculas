<?php


class ProductsRepository  {
    
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @return Product[]
     */
    public function getAll() : array
    {
        $query = $this->pdo->prepare('SELECT * FROM products');
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $query->execute();
        return $query->fetchAll();
    }

    public function getByCategory(string $category) : array
    {
        $query = $this->pdo->prepare('SELECT * FROM products WHERE category = :category');
        $query->execute(['category' => $category]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getById(int $id) : Product
    {
        $query = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $query->setFetchMode(PDO::FETCH_CLASS, Product::class);
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function create(array $data) : void
    {
        $query = $this->pdo->prepare(
            'INSERT INTO products (title, image, price, description, brand, model, color, category, discount) 
            VALUES (:title, :image, :price, :description, :brand, :model, :color, :category, :discount)'
        );
        
        $query->execute([
            'title' => $data['title'],
            'image' => $data['image'],
            'price' => $data['price'],
            'description' => $data['description'],
            'brand' => $data['brand'],
            'model' => $data['model'],
            'color' => $data['color'],
            'category' => $data['category'],
            'discount' => $data['discount']
        ]);
    }

    public function update(int $id, array $data) :void
    {
        $query = $this->pdo->prepare(
            'UPDATE products SET 
            title = :title, 
            image = :image, 
            price = :price, 
            description = :description, 
            brand = :brand, 
            model = :model, 
            color = :color,
             category = :category, 
             discount = :discount
              WHERE id = :id');

        $query->execute([
            ':title' => $data['title'],
            ':image' => $data['image'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':brand' => $data['brand'],
            ':model' => $data['model'],
            ':color' => $data['color'],
            ':category' => $data['category'],
            ':discount' => $data['discount'],
            ':id' => $id
        ]);
    }

    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $query->execute(['id' => $id]);
    }
}