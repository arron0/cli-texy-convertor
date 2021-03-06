# cli-texy-converter

For converting Texy files to HTML or GitHub Markdown via command line. It can also be used as a library in your project and you can call converters
directly.

If you are converting to HTML, you can provide Latte template that will be filled.

## Installation

Use [composer](http://getcomposer.org) to install TestIt. Just add **arron/cli-texy-converter** project as your dependency.

## Usage

### Command line

```
convert texy [-t|--template="..."] [-f|--force] from to
```

- **from** is source texy file
- **to** is target file that will be created. What conversion will be used is determined according to the extension of the target file
(.html and .htm for conversion to HTML, .md for conversion to Markdown).
- **-f or --force** is option to force rewrite target file if already exists. Without this option the exception will be thrown when trying to overwrite existing file.
- **-t|--template="..."** is path to Latte template. If provided, the result of conversion will be passed to this template via `$content` variable.

### In program

There are two classes. One for conversion to HTML and one for conversion to Markdown. Both classes is implementing `Arron\Converter\IConvert` interface
and usage is really straight forward.

```php
$htmlConverter = new HtmlConverter();
$resultString = $htmlConverter->convert($sourceString);

$markdownConverter = new MarkdownConverter();
$resultString = $markdownConverter->convert($sourceString);
```

## Conversion

### HTML

The Texy setting for conversion is in fact the same as you can see in [Texy editor](http://editor.texy.info).
For syntax highlighting the [FSHL](http://fshl.kukulich.cz/) library is used.

There are no possibility to change some of the options so far.

### Markdown

Texy is converted to the [GitHub Markdown syntax](https://help.github.com/articles/markdown-basics).
The conversion is done through Texy parser and ouput is changed to not to convert to HTML but to Markdown. Due to this solution there are several
limitations. Texy doesn't provide all of the necessary customizations so these parts are reamaining unchanged in the ouput due to this:
- lists
- tables

Some Texy features are not supported in GitHub Markdown language:
- acronyms: Texy syntax NATO((North Atlantic Treaty Organisation)) is simply converted to NATO (North Atlantic Treaty Organisation).
- inline quoting: Texy syntax >>inline quote<< is left unchanged.
- Texy syntax ++inserted++ --deleted-- ^^superscript^^  m^2 alternative superscript  __subscript__ m_2 alternative subscript is converted as
<ins>inserted</ins> <del>deleted</del> <sup>superscript</sup> m<sup>2</sup> alternative superscript <sup>subscript</sup> m<sup>2</sup> alternative subscript

## Licensing

Feel free to use it under the GPL license of under GPL v2 or any later version of GPL.

