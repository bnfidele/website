<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'inertia' => env('SEO_TOOLS_INERTIA', false),
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
                'title'        => "Flamx", 
                'titleBefore'  => false, 
                'description'  => 'Solutions de pointe pour la sécurité incendie. Protégez ce qui compte le plus pour vous ! Grâce à nos capteurs électroniques et systèmes automatisés de détection et d’extinction, votre maison, votre entreprise ou vos biens précieux sont sécurisés 24h/24, même en votre absence. Ne laissez pas le hasard décider, optez pour la tranquillité d’esprit dès aujourd’hui.',
                'separator'    => ' - ',
                'keywords'     => ['sécurité incendie', 'capteurs électroniques', 'extinction automatique', 'protection maison', 'sécurité entreprise', 'Flamx','Flamex','flam -x','sentinell feu'],
                'canonical'    => 'current', 
                'robots'       => 'index, follow',

                // Ajouts personnalisés
                'author'       => 'Fidele Bauma',
                'email'        => 'flamxsarl@flamx.online',
                'image'        => false, // Image par défaut pour réseaux sociaux  
                
            ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'For those who helped create the Genki Dama', // set false to total remove
            'url'         => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
