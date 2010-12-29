What is this?
=============

The offical release of intl extension (http://pecl.php.net/package/intl) 
is written for PHP 5.2.x, but PHP 5.3.x had changed the zval struct, 
thus the intl extension cann't be compile under PHP 5.3.x. If you try
to install this extension by PECL or PEAR, you will get an error like
this:
<pre><code>
/usr/temp/intl/collator/collator_class.c:92: error: duplicate ‘static’
/usr/temp/intl/collator/collator_class.c:96: error: duplicate ‘static’
/usr/temp/intl/collator/collator_class.c:101: error: duplicate ‘static’
/usr/temp/intl/collator/collator_class.c:107: error: duplicate ‘static’
make: *** [collator/collator_class.lo] Error 1
ERROR: `make' failed
</pre></code>

This is a patched version can be compile with PHP 5.3.

WARNNING: THIS IS FOR TEST ONLY, USE AT YOUR OWN RISK

Who need this?
==============
The native php5 build ships with Mac OS X 10.6 did not have intl 
extension enabled. As a result, people who want to use intl extension 
have to compile by themself.

If your want to give Symfony2 (http://symfony-reloaded.org/) a try, 
you will need this... 

Compile && Installation
=======================
<pre><code>
$ git clone git://github.com/liangzhenjing/php53-intl.git
$ cd php53-intl
$ phpize
$ ./configure
$ make && make install
</pre></code>

TEST
====
NOT ALL THE TESTS PASSED, SO AGAIN, USE AT YOUR OWN RISK!

Test result:
<pre><code>
=====================================================================
TEST RESULT SUMMARY
---------------------------------------------------------------------
Exts skipped    :    0
Exts tested     :   55
---------------------------------------------------------------------

Number of tests :   78                78
Tests skipped   :    0 (  0.0%) --------
Tests warned    :    0 (  0.0%) (  0.0%)
Tests failed    :   17 ( 21.8%) ( 21.8%)
Expected fail   :    0 (  0.0%) (  0.0%)
Tests passed    :   61 ( 78.2%) ( 78.2%)
---------------------------------------------------------------------
Time taken      :   10 seconds
=====================================================================

=====================================================================
FAILED TEST SUMMARY
---------------------------------------------------------------------
get_locale() [tests/collator_get_locale.phpt]
collator_get_sort_key() [tests/collator_get_sort_key.phpt]
datefmt_get_pattern_code and datefmt_set_pattern_code() [tests/dateformat_get_set_pattern.phpt]
datefmt_localtime_code() [tests/dateformat_localtime.phpt]
datefmt_parse_code() [tests/dateformat_parse.phpt]
datefmt_parse_localtime() with parse pos [tests/dateformat_parse_localtime_parsepos.phpt]
datefmt_parse_timestamp_code()  with parse pos [tests/dateformat_parse_timestamp_parsepos.phpt]
datefmt_set_timezone_id_code() [tests/dateformat_set_timezone_id.phpt]
numfmt_format() [tests/formatter_format.phpt]
numfmt_format_currency() [tests/formatter_format_currency.phpt]
grapheme() [tests/grapheme.phpt]
locale_get_display_name() [tests/locale_get_display_name.phpt]
locale_get_display_region() [tests/locale_get_display_region.phpt]
locale_get_display_script() [tests/locale_get_display_script.phpt]
locale_get_display_variant() [tests/locale_get_display_variant.phpt]
locale_get_region() [tests/locale_get_region.phpt]
locale_parse_locale() [tests/locale_parse_locale.phpt]
=====================================================================
</pre></code>

