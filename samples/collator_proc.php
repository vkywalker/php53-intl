#!/usr/bin/env php
<?php
function cmp( &$coll, $str1, $str2 )
{
	$rc = collator_compare( $coll, $str1, $str2 );
	$eq = $rc > 0 ? ">" : ( $rc < 0 ? "<" : "=" );
	echo "$str1 $eq $str2\n";
}

# Create collator instance.
$coll = collator_create( "ru_RU" );

# Try compare().
echo "compare():\n";
cmp( $coll, "test", "test" );
cmp( $coll, "test1", "test" );
cmp( $coll, "test", "TEST" );

# Try sort().
echo "\nsort():\n";
$a = array( "bbb", "aaa", "ccc" );
collator_sort( $coll, $a );
var_dump( $a );

echo "\ngetLocaleByType():\n";
$alocale = collator_get_locale( $coll, ULOC_ACTUAL_LOCALE );
$rlocale = collator_get_locale( $coll, ULOC_REQUESTED_LOCALE );
$vlocale = collator_get_locale( $coll, ULOC_VALID_LOCALE );
printf( "Actual locale: %s\n",    $alocale );
printf( "Requested locale: %s\n", $rlocale );
printf( "Valid locale: %s\n",     $vlocale );

echo "\ngetDisplayName():\n";
$lname = collator_get_display_name( "pt_BR", "en_EN" );
echo $lname, "\n";

echo "\ngetAvailableLocales():\n";
$nlocales = count( collator_get_available_locales() );
echo "There are $nlocales available locales.\n";
?>
