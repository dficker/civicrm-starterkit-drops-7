<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15273363a8ff4b798eb304902c5f2b23
{
    public static $files = array (
        '3919eeb97e98d4648304477f8ef734ba' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/Crypt/Random.php',
    );

    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dompdf\\' => 7,
        ),
        'C' => 
        array (
            'Civi\\Cxn\\Rpc\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dompdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/dompdf/dompdf/src',
        ),
        'Civi\\Cxn\\Rpc\\' => 
        array (
            0 => __DIR__ . '/..' . '/civicrm/civicrm-cxn-rpc/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'System' => 
            array (
                0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
            ),
            'Symfony\\Component\\Process\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/process',
            ),
            'Symfony\\Component\\Finder\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/finder',
            ),
            'Symfony\\Component\\EventDispatcher\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/event-dispatcher',
            ),
            'Symfony\\Component\\DependencyInjection\\' => 
            array (
                0 => __DIR__ . '/..' . '/symfony/dependency-injection',
            ),
            'Svg\\' => 
            array (
                0 => __DIR__ . '/..' . '/phenx/php-svg-lib/src',
            ),
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 
            array (
                0 => __DIR__ . '/..' . '/psr/log',
            ),
            'PHPUnit_' => 
            array (
                0 => __DIR__ . '/../..' . '/packages',
            ),
        ),
        'N' => 
        array (
            'Net' => 
            array (
                0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
            ),
        ),
        'M' => 
        array (
            'Math' => 
            array (
                0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
            ),
        ),
        'F' => 
        array (
            'FontLib\\' => 
            array (
                0 => __DIR__ . '/..' . '/phenx/php-font-lib/src',
            ),
            'File' => 
            array (
                0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
            ),
        ),
        'C' => 
        array (
            'Crypt' => 
            array (
                0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
            ),
            'Civi\\' => 
            array (
                0 => __DIR__ . '/../..' . '/',
                1 => __DIR__ . '/../..' . '/tests/phpunit',
            ),
            'Civi' => 
            array (
                0 => __DIR__ . '/../..' . '/',
            ),
            'CA_Config' => 
            array (
                0 => __DIR__ . '/..' . '/totten/ca-config/src',
            ),
        ),
    );

    public static $classMap = array (
        'Cpdf' => __DIR__ . '/..' . '/dompdf/dompdf/lib/Cpdf.php',
        'Datamatrix' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
        'HTML5_Data' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Data.php',
        'HTML5_InputStream' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/InputStream.php',
        'HTML5_Parser' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Parser.php',
        'HTML5_Tokenizer' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/Tokenizer.php',
        'HTML5_TreeBuilder' => __DIR__ . '/..' . '/dompdf/dompdf/lib/html5lib/TreeBuilder.php',
        'PDF417' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
        'QRcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
        'TCPDF' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf.php',
        'TCPDF2DBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
        'TCPDFBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
        'TCPDF_COLORS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
        'TCPDF_FILTERS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
        'TCPDF_FONTS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
        'TCPDF_FONT_DATA' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
        'TCPDF_IMAGES' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_images.php',
        'TCPDF_IMPORT' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_import.php',
        'TCPDF_PARSER' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_parser.php',
        'TCPDF_STATIC' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit15273363a8ff4b798eb304902c5f2b23::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit15273363a8ff4b798eb304902c5f2b23::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit15273363a8ff4b798eb304902c5f2b23::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit15273363a8ff4b798eb304902c5f2b23::$classMap;

        }, null, ClassLoader::class);
    }
}