<?php
trait FunctionsTrait {
    public static function serveXML($rootElement,$obj) {
        function array_to_xml($array, &$xml) {
            foreach($array as $key => $value) {
                if(is_array($value)) {
                    if(!is_numeric($key)){
                        $subnode = $xml->addChild("$key");
                        array_to_xml($value, $subnode);
                    } else {
                        array_to_xml($value, $xml);
                    }
                } else {
                    $xml->addChild("$key","$value");
                }
            }
        }
        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><".$rootElement."></".$rootElement.">");
        array_to_xml($obj, $xml);

        return $xml->asXML();


    }
    public static function serveJSON($obj) {
        return json_encode($obj);
    }
}