<?php

/**
 * Pinga Base64
 *
 * Written in 2023 by Taras Kondratyuk (https://getpinga.com)
 * Based on PHP-Base64 (https://github.com/delight-im/PHP-Base64) by delight.im (https://www.delight.im/)
 *
 * @license MIT
 */

\error_reporting(\E_ALL);
\ini_set('display_errors', 'stdout');

\header('Content-Type: text/plain; charset=utf-8');

require __DIR__ . '/../vendor/autoload.php';

function fail($lineNumber) {
	exit('Error on line ' . $lineNumber);
}

(\Pinga\Base64\Base64::encode('Gallia est omnis divisa in partes tres') === 'R2FsbGlhIGVzdCBvbW5pcyBkaXZpc2EgaW4gcGFydGVzIHRyZXM=') or \fail(__LINE__);
(\Pinga\Base64\Base64::decode('R2FsbGlhIGVzdCBvbW5pcyBkaXZpc2EgaW4gcGFydGVzIHRyZXM=') === 'Gallia est omnis divisa in partes tres') or \fail(__LINE__);
(\Pinga\Base64\Base64::encodeUrlSafe('πάντα χωρεῖ καὶ οὐδὲν μένει …') === 'z4DOrM69z4TOsSDPh8-Jz4HOteG_liDOus6x4b22IM6_4b2QzrThvbLOvSDOvM6tzr3Otc65IOKApg~~') or \fail(__LINE__);
(\Pinga\Base64\Base64::decodeUrlSafe('z4DOrM69z4TOsSDPh8-Jz4HOteG_liDOus6x4b22IM6_4b2QzrThvbLOvSDOvM6tzr3Otc65IOKApg~~') === 'πάντα χωρεῖ καὶ οὐδὲν μένει …') or \fail(__LINE__);
(\Pinga\Base64\Base64::encodeUrlSafeWithoutPadding('πάντα χωρεῖ καὶ οὐδὲν μένει …') === 'z4DOrM69z4TOsSDPh8-Jz4HOteG_liDOus6x4b22IM6_4b2QzrThvbLOvSDOvM6tzr3Otc65IOKApg') or \fail(__LINE__);
(\Pinga\Base64\Base64::decodeUrlSafeWithoutPadding('z4DOrM69z4TOsSDPh8-Jz4HOteG_liDOus6x4b22IM6_4b2QzrThvbLOvSDOvM6tzr3Otc65IOKApg') === 'πάντα χωρεῖ καὶ οὐδὲν μένει …') or \fail(__LINE__);

for ($i = 0; $i < 1000; $i++) {
	$data = \openssl_random_pseudo_bytes(
		\mt_rand(12, 24)
	);

	(\Pinga\Base64\Base64::decode(\Pinga\Base64\Base64::encode($data)) === $data) or \fail(__LINE__);
	(\Pinga\Base64\Base64::decodeUrlSafe(\Pinga\Base64\Base64::encodeUrlSafe($data)) === $data) or \fail(__LINE__);
	(\Pinga\Base64\Base64::decodeUrlSafeWithoutPadding(\Pinga\Base64\Base64::encodeUrlSafeWithoutPadding($data)) === $data) or \fail(__LINE__);
}

echo 'ALL TESTS PASSED' . "\n";
