<?php

namespace DesignPattern\Structural\Decorator;

class XmlRender extends RendererDecorator
{
    /**
     * @return string
     */
    public function render() : string
    {
        $document = new \DOMDocument();
        $data = $this->renderable->render();
        $document->appendChild($document->createElement('content', $data));

        return $document->saveXML();
    }
}
