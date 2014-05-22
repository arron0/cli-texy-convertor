<?php
/**
 * Requires PHP Version 5.3 (min)
 *
 * @package Arron
 * @subpackage Translator
 * @author Tomáš Lembacher <tomas.lembacher@seznam.cz>
 * @license MIT
 */

namespace Arron\Converter;

use Symfony\Component\Console\Application;

require_once "vendor/autoload.php";

$application = new Application('Texy converter', '1.0.0');
$application->add(new Convert());
$application->run();