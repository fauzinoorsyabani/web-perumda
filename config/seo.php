<?php
declare(strict_types=1);

/**
 * SEO, AEO (Answer Engine Optimization), & GEO (Generative Engine Optimization) Helper
 */

function getSiteBaseUrl(): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'www.perumdaairminumtirtasukapura.com';
    $script = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/'));
    $basePath = rtrim($script, '/');
    return $scheme . '://' . $host . ($basePath === '' ? '' : $basePath);
}

function buildCoreEntityGraph(array $officeInfo, string $baseUrl): array
{
    return [
        [
            '@type'       => ['GovernmentOrganization', 'LocalBusiness'],
            '@id'         => $baseUrl . '/#organization',
            'name'        => $officeInfo['name'],
            'alternateName' => ['PDAM Tirta Sukapura', 'Perumdam Tirta Sukapura', 'PDAM Kabupaten Tasikmalaya'],
            'url'         => $baseUrl . '/',
            'logo'        => [
                '@type' => 'ImageObject',
                'url'   => $baseUrl . '/assets/images/logo-perumda.png',
            ],
            'image'       => $baseUrl . '/assets/images/hero-water.jpg',
            'description' => 'Perusahaan Umum Daerah Air Minum Tirta Sukapura adalah BUMD resmi Pemerintah Kabupaten Tasikmalaya penyedia layanan air minum bersih sejak 1925 dengan kapasitas terpasang 513 L/detik.',
            'foundingDate' => '1975-06-11',
            'telephone'   => $officeInfo['phone'],
            'email'       => $officeInfo['email'],
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Jl. Jenderal A.H. Nasution Km. 8',
                'addressLocality' => 'Tasikmalaya',
                'addressRegion'   => 'Jawa Barat',
                'postalCode'      => '46181',
                'addressCountry'  => 'ID',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => -7.3506,
                'longitude' => 108.2172,
            ],
            'areaServed' => [
                ['@type' => 'AdministrativeArea', 'name' => 'Kabupaten Tasikmalaya'],
                ['@type' => 'AdministrativeArea', 'name' => 'Kota Tasikmalaya'],
            ],
            'openingHoursSpecification' => [
                [
                    '@type'     => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens'     => '08:00',
                    'closes'    => '16:00',
                ],
            ],
            'contactPoint' => [
                [
                    '@type'             => 'ContactPoint',
                    'telephone'         => $officeInfo['phone'],
                    'contactType'       => 'customer service',
                    'areaServed'        => 'ID',
                    'availableLanguage' => ['Indonesian', 'Sundanese'],
                ],
                [
                    '@type'       => 'ContactPoint',
                    'telephone'   => '+62-265-325065',
                    'contactType' => 'headquarters',
                    'areaServed'  => 'ID',
                ],
            ],
            'sameAs' => [
                'https://www.perumdaairminumtirtasukapura.com/',
                'http://app-tirtasukapura.com/',
                'https://gis.app-tirtasukapura.com/',
            ],
        ],
        [
            '@type'           => 'WebSite',
            '@id'             => $baseUrl . '/#website',
            'url'             => $baseUrl . '/',
            'name'            => $officeInfo['name'],
            'inLanguage'      => 'id-ID',
            'publisher'       => ['@id' => $baseUrl . '/#organization'],
            'potentialAction' => [
                '@type'       => 'SearchAction',
                'target'      => $baseUrl . '/berita.php?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ],
    ];
}

function buildBreadcrumbSchema(array $items, string $baseUrl): array
{
    $list = [];
    foreach ($items as $idx => $item) {
        $list[] = [
            '@type'    => 'ListItem',
            'position' => $idx + 1,
            'name'     => $item['name'],
            'item'     => $baseUrl . '/' . ltrim($item['url'], '/'),
        ];
    }
    return [
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $list,
    ];
}

function buildFaqSchema(array $faqs): array
{
    $entities = [];
    foreach ($faqs as $faq) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => $faq['a'],
            ],
        ];
    }
    return [
        '@type'      => 'FAQPage',
        'mainEntity' => $entities,
    ];
}
