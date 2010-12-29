#!/usr/bin/env php
<?php
# Declare a custom class derived from Collator.
class MyCollator extends Collator
{
	public function testCompare( $s1, $s2 )
	{
		$rc = $this->compare( $s1, $s2 );
		$eq = $rc > 0 ? ">" : ( $rc < 0 ? "<" : "=" );
		echo "$s1 $eq $s2\n"; 
	}
}

# Create an instance of that class.
$coll = new MyCollator( "en_US" );

# Compare two strings using different collation settings.
echo "\nComparing two strings:\n";
echo "                      default settings: ";
$coll->testCompare( 'alpha', 'ALPHA' ); // prints: "alpha < ALPHA".
echo "            primary collation strength: ";
$coll->setStrength( Collator::PRIMARY );
$coll->testCompare( 'alpha', 'ALPHA' ); // prints: "alpha = ALPHA".
echo " CASE_FIRST=UPPER_FIRST, CASE_LEVEL=ON: ";
$coll->setAttribute( Collator::CASE_LEVEL, Collator::ON );
$coll->setAttribute( Collator::CASE_FIRST, Collator::UPPER_FIRST );
$coll->testCompare( 'alpha', 'ALPHA' ); // prints: "alpha > ALPHA".

# Sort an array.
echo "\nSorting an array using collator's locale:\n";
$a = array( 'bbb', 'ccc', 'aaa' );
$coll->sort( $a );
var_dump( $a );

# Checking the actual locale used.
echo "\nShowing the actual locale:\n";
echo $coll->getLocaleByType( ULOC_ACTUAL_LOCALE ) . "\n";

# Displaying name of a locale.
echo "\nGetting locale name:\n";
echo $coll->getDisplayName( 'ru_RU', 'en_EN' ) . "\n";

# Try specifying an incorrect attribute and check for errors.
echo "\nTrying errors checking:\n";
if( !$coll->getAttribute( 12345 ) )
	echo $coll->getErrorMessage() . "\n";
?>
