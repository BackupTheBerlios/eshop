<?php
include("./../LibSql.class.php");
echo<<<END
<p>
	<strong>Fichier de test de la librairie LibSql</strong>
</p>
END;
echo "<p>";
echo "Class name : ".LibSql::getClassName();
echo "<br />";
echo "Version : ".LibSql::getVersion();
echo "<br />\n</p>";
echo<<<END
<pre style="width:100%">
\$number1 = "1 258 952,66";
\$number2 = "1 258 952.66";
\$number3 = "1.258.952,66";
\$number4 = "1,258,952.66";
\$number5 = "52,66";
\$number6 = "52.66";

echo LibSql::Number(\$number1);		//output : 1258952.66		| \$number1 = "1 258 952,66";
echo LibSql::Number(\$number2);		//output : 1258952.66		| \$number2 = "1 258 952.66";
echo LibSql::Number(\$number3);		//output : 1258952.66		| \$number3 = "1.258.952,66";
echo LibSql::Number(\$number4);		//output : 1258952.66		| \$number4 = "1,258,952.66";
echo LibSql::Number(\$number5);		//output : 52.66		| \$number5 = "52,66";
echo LibSql::Number(\$number6);		//output : 52.66		| \$number6 = "52.66";
</pre>
END;
?>