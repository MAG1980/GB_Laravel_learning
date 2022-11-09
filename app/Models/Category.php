<?php

namespace App\Models;

class Category
{
    private array $categories = [
        [
            'id' => '1',
            'name' => 'Politic'

        ],
        [
            'id' => '2',
            'name' => 'Sport'
        ],
        [
            'id' => '3',
            'name' => 'Movie'
        ],
        [
            'id' => '4',
            'name' => 'Finance'
        ],
        [
            'id' => '5',
            'name' => '"Stars"'
        ]
    ];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getOneCategory($name): ?array
    {
        foreach ($this->getCategories() as $category) {
            if ($category['name'] === $name) {
                return $category;
            }
        }
        return null;
    }

    public function getCategoryIdBy($name){
        foreach ($this->categories as $category){
            if ($category['name'] === $name) {
                return $category['id'];
            }
        }
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
