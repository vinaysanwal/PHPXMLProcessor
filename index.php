<?php
//simplexml_load_string function

libxml_use_internal_errors(true);
$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");

//To handle the error
$xml = simplexml_load_string($myXMLData);
if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} else {
    print_r($xml) ."<br>";
}

//Loading file from note.xml
$xml=simplexml_load_file("note.xml") or die("Error:Cannot create object");
print_r($xml) . "<br>";

//getting node values:
$xml=simplexml_load_file("note.xml") or die("Error");
echo $xml->to ."<br>";
echo $xml->from ."<br>";
echo $xml->heading ."<br>";
echo $xml->body ."<br>";

//getting data from another xml file:
echo "Getting node values from specific elements </br>";
$xml=simplexml_load_file("books.xml") or die("Error");
echo $xml->book[0]->title ."<br>";
echo $xml->book[1]->title ."<br>";

//getting nodes value from using loops
echo "Getting node values from using loops <br>";
$xml=simplexml_load_file("books.xml") or die("Error");
foreach($xml->children() as $book){
  echo $book->title . " , ";
  echo $book->author . " , ";
  echo $book->year . " , ";
  echo $book->price . "<br>";
}

//getting attribute values
echo "Getting attribute value <br>";
$xml=simplexml_load_file("books.xml") or die("Error");
echo $xml->book[0]['category'] . "<br>";
echo $xml->book[1]['category'] . "<br>";
echo $xml->book[2]['category'] . "<br>";
echo $xml->book[3]['category'] . "<br>";

//get attribute values loop:
echo "Getting attribute value using loop <br>";
$xml=simplexml_load_file("books.xml") or die("Error");
foreach($xml->children() as $books)
{
  echo $books->title['lang'];
  echo "<br>";
}

//loading and outputing an XML
echo "Loading and outputing an XML <br>";
$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

print $xmlDoc->saveXML();

?>
