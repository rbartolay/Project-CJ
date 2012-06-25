<?php
/**
 * XML Create core class used to create xml file and can update existing xml file
 * 
 * Usage:
 * $obj = new stdClass();
 * $obj->id = 1;
 * $obj->title = "title here";
 * 
 * $xml = new XMLCreate("root"); 
 * $xml->create("child",$obj);
 * $xml->saveXMLFile();
 *  
 * @author LLBautista
 *
 */
class Core_XMLCreate implements BusinessObjectModel {
	private $name = null;
	private $domDocument = null;
	private $root = null;
	private $url = null;
	private $filename = null;
	/**
	 * Initialize constructor for XML Create class
	 * @param unknown_type $name
	 * @param unknown_type $filename
	 * @param unknown_type $logurl
	 */
	public function __construct($name,$filename,$logurl) {
		$this->name = $name;
		$this->filename = $filename;
		$this->domDocument = new DOMDocument();
		$this->domDocument->formatOutput = true;
		$this->url = $logurl;
		$this->set();	
	}
	/**
	 * Set xml
	 */
	private function set() {
		if($this->isXMLFileExists()) {
			$this->domDocument->load($this->url.$this->filename.".xml", LIBXML_NOBLANKS);
			$this->root = $this->getRootNode();
		} else {
			$root = $this->setElement(strtolower($this->name));
			
			$this->root = $this->setAppend($root);
		}
	}
	/**
	 * Create child node, attributes and values
	 * @param string $child
	 * @param object $objects
	 */
	public function create($child,$object) {
		if(is_object($object) or die(get_class($this)." XMLCreate.core.create : Object is not a object"));
		
		$subNode = $this->setElement($child);
		foreach ((array)$object as $key=>$val) {
			$attribute = $this->setAttribute($key);
			$value = $this->setValue($val);
			$attribute->appendChild($value);
			$subNode->appendChild($attribute);
		}
		$this->root->appendChild($subNode);
	}
	
	private function getRootNode() {
		return $this->domDocument->documentElement;
	}
	/**
	 * Set element for main and child node
	 * @param string $name
	 */
	private function setElement($name) {
		return $this->domDocument->createElement($name);
	}
	/**
	 * Set attribute for main and child node
	 * @param string $name
	 */
	private function setAttribute($name) {
		return $this->domDocument->createAttribute($name);
	}
	/**
	 * Set value for the attribute
	 * @param string $string
	 */
	private function setValue($string) {
		return $this->domDocument->createTextNode($string);
	}
	/**
	 * Set name for main or child node, also in attribute and value
	 * @param unknown_type $name
	 */
	private function setAppend($name) {
		return $this->domDocument->appendChild($name);
	}
	/**
	 * Check if xml file exists
	 */
	private function isXMLFileExists() {
		return file_exists($this->url.$this->filename.".xml");
	}
	/**
	 * Save xml file or update existing file
	 */
	public function saveXMLFile() { 
		if($this->isXMLFileExists()) {			
			$this->domDocument->save($this->url.$this->filename.".xml");
			//change file permission after save
			chmod($this->url.$this->filename.".xml", 0777);
		} else {
			$this->saveNewXMLFile();
		}
	}
	public static function count($xml,$element) {
		if(file_exists($xml)) {
			$dom = new DOMDocument();
			$dom->load($xml);
			return $dom->getElementsByTagName($element)->length;
		}
		return 0;
	}
	/**
	 * Save new xml file
	 */
	private function saveNewXMLFile() {
		$str = $this->domDocument->saveXML();
		$handle = fopen($this->url.$this->filename.".xml","w");
		fwrite($handle, $str);
		fclose($handle);
	}
}



/**
 * EXAMPLES
 * Create a basic xml data and create a new file of it

private function fnDomCreate()	{
	$arr = array(array('isbn'=>'1001', 'pubdate'=>'1943-01-01', 'title'=>'The Fountainhead',
			'author'=>'Ayn Rand', 'price'=>'300'),
			array('isbn'=>'1002', 'pubdate'=>'1954-01-01',
					'title'=>'The Lord of the Rings', 'author'=>'J.R.R.Tolkein',
					'price'=>'500'),
			array('isbn'=>'1003', 'pubdate'=>'1982-01-01', 'title'=>'The Dark Tower',
					'author'=>'Stephen King', 'price'=>'200'));

	$dom = new DOMDocument();
	$library = $dom->createElement('library');
	$dom->appendChild($library);

	for($i=0;$i<3;$i++)
	{
	$book = $dom->createElement('book');
	$book->setAttribute('isbn',$arr[$i]['isbn']);
	$book->setAttribute('pubdate',$arr[$i]['pubdate']);

	//$prop = $dom->createElement('title', $arr[$i]['title']);
	$prop = $dom->createElement('title');
	$text = $dom->createCDATASection($arr[$i]['title']);
	$prop->appendChild($text);
	$book->appendChild($prop);

	$prop = $dom->createElement('author', $arr[$i]['author']);
	$book->appendChild($prop);
	$prop = $dom->createElement('price', $arr[$i]['price']);
			$book->appendChild($prop);
			$library->appendChild($book);
	}
	//header("Content-type: text/xml");
	$dom->save('C:\Users\Ryan Bartolay\\git\\Hummer\\Hummer\\resources\\library.xml');
}

//Edit Last Book Title
	private function fnDOMEditElementSeq()	{

	$dom = new DOMDocument();
		$dom->load('C:\Users\Ryan Bartolay\\git\\Hummer\\Hummer\\resources\\library.xml');
		$food = $dom->getElementsByTagName('book');

		foreach ($food as $elem) {
		echo $elem->getElementsByTagName('title')->item(0)->nodeValue = "Ryan";
		echo $elem->getElementsByTagName('author')->item(0)->nodeValue;
		echo $elem->getElementsByTagName('price')->item(0)->nodeValue;
		echo "<br>";
		}

		var_dump($dom->saveXML());

		//$dom->save('C:\Users\Ryan Bartolay\\git\\Hummer\\Hummer\\resources\\library.xml');
		//$library->childNodes->item($cnt-1)->getElementsByTagName('title')->item(0)->nodeValue .= ' Series';
				// 2nd way #$library->getElementsByTagName('book')->item($cnt-1)->getElementsByTagName('title')->item(0)->nodeValue .= ' Series';
					
				//3rd Way
				//$library->childNodes->item($cnt-1)->childNodes->item(0)->nodeValue .= ' Series';
		//header("Content-type: text/xml");
		//echo $dom->saveXML();
}*/