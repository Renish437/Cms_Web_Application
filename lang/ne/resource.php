<?php
return [
    // Common lang keys
    'created_at' => "सिर्जना मिति",
    'updated_at' => "अद्यावधिक मिति",
    
    // Notifications
    'notification' => [
        'success' => [
            'default_title' => "सफलता",
            'default_body' => "कार्य सफलतापूर्वक सम्पन्न भयो।"
        ]
    ],
    
    // Category
    'category' => [
        'navigation' => [
            'label' => "श्रेणी",
            'model_label' => "श्रेणी",
            'plural_model_label' => "श्रेणीहरू"
        ],
        'fields' => [
            'name' => "नाम",
            'slug' => "स्लग",
            'parent_category' => "मूल श्रेणी",
            'description' => "विवरण",
            'status' => "स्थिति"
        ],
        'action' => [
            'toggle' => "टगल गर्नुहोस्"
        ],
        'notification' => [
            'toggle_status' => [
                'success' => [
                    'title' => 'श्रेणी स्थिति अद्यावधिक',
                    'body'  => 'चयन गरिएका श्रेणीहरू सफलतापूर्वक अद्यावधिक गरिए।'
                ],
                'error' => [
                    'title' => 'अद्यावधिक असफल',
                    'body'  => 'श्रेणी स्थिति अद्यावधिक गर्न सकिएन। कृपया पुन: प्रयास गर्नुहोस्।'
                ],
            ],
        ],
    ],
    
    // Post resource
    'post' => [
        'navigation' => [
            'label' => "पोस्ट",
            'model_label' => "पोस्ट",
            'plural_model_label' => "पोस्टहरू"
        ],
        'filters' => [
            'status' => "स्थितिद्वारा फिल्टर गर्नुहोस्"
        ],
        'fields' => [
            'type' => "प्रकार",
            'title' => "शीर्षक",
            'slug' => "स्लग",
            'excerpt' => "अंश",
            'sort' => "क्रमबद्ध",
            'categories'=>"श्रेणीहरू",
            'content' => "सामग्री",
            'feature_image' => "चित्र",
            'is_featured' => "विशेष",
            'comment_status' => "टिप्पणी स्थिति",
            'status' => "स्थिति",
            'published_at' => "प्रकाशन मिति",
            'parent_id' => "मूल",
            'author' => "लेखक",
            'view_count' => "दृश्य संख्या"
        ]
    ],
    
    // Page resource
    'page' => [
        'navigation' => [
            'label' => "पृष्ठ",
            'model_label' => "पृष्ठ",
            'plural_model_label' => "पृष्ठहरू"
        ],
    ]
];