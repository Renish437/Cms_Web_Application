<?php

return [
    "created_at" => "Creado el",
    "updated_at" => "Actualizado el",
      "notifications"=>[
     "success"=>[
     "default_title"=>"Success in es",
     'default_body'=>"Action completed Successfully in es"
     ],
    ],
    "category" => [
        "navigation" => [
            "label" => "Categoría",
            "model_label" => "Categoría",
            'plural_model_label' => "Categorías"
        ],
        'actions'=>[
         'toggle'=>"Toggle Status in es"
        ],
        'fields' => [
            "name" => "Nombre",
            'slug' => "Slug",
            'parent_category' => "Categoría padre",
            'description' => "Descripción",
            'sort' => "Orden",
            "status" => "Está activo",
        ]
    ]
];
