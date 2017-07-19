<?php
    App::uses('Xml', 'Utility');
    $posts = array('document' => $posts);
    $xmlObject = Xml::fromArray( array('posts' => $posts), array('format' => 'attribute'));
    echo $xmlObject->asXML();
?>