<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Central Condo - Seu Condomínio nas nuvens", // set false to total remove
            'description'  => 'Central Condo é um software Online de Gestão para Condomínios. Focado para sindícos que realmente se importam com seu condomínio mantendo a transparência e aumentando a segurança no seu condomínio - comercial@centralcondo.com.br', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [
                'sistema condominio online',
                'aplicativo condominio',
                'software condomínio',
                'sistema para condomínio',
                'sistema de condomínio',
                'programa para condomínio',
                'gestão condominial',
                'gestão do condomínio',
                'gestão de condomínio',
                'programa para administração de condominios',
                'software para síndicos'
            ],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
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
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Central Condo - Seu Condomínio nas nuvens', // set false to total remove
            'description' => 'Central Condo é um software Online de Gestão para Condomínios. Focado para sindícos que realmente se importam com seu condomínio mantendo a transparência e aumentando a segurança no seu condomínio - comercial@centralcondo.com.br', // set false to total remove
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
];
