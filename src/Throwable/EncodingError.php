<?php

/**
 * Pinga Base64
 *
 * Written in 2023 by Taras Kondratyuk (https://getpinga.com)
 * Based on PHP-Base64 (https://github.com/delight-im/PHP-Base64) by delight.im (https://www.delight.im/)
 *
 * @license MIT
 */

namespace Pinga\Base64\Throwable;

/** Error that is thrown when an attempt is being made to encode illegal input */
class EncodingError extends Error {}
