<?php


return [
    "created_at"=>"Created At",
    "updated_at"=>"Updated At",
    "category" => [
        "navigation" => [

            "label" => "Category",
            "model_label" => "Category",
            'plural_model_label' => "Category"
        ],
        'actions'=>[
         'toggle'=>"Toggle Status"
        ],
        'fields' => [
            "name"=>"Name",
            'slug'=>"Slug",
            'parent_category'=>"Parent",
            'description'=>"Description",
            'sort'=>"Sort",
            "status"=>"Is Active",
            "description"=>"Description"
        ]
    ]
];
