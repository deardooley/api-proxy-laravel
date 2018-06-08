<?php

/**
 * @package   thinkingmik/api-proxy-laravel
 * @author    Michele Andreoli <michi.andreoli[at]gmail.com>
 * @copyright Copyright (c) Michele Andreoli
 * @license   http://mit-license.org/
 * @link      https://github.com/thinkingmik/api-proxy-laravel
 */

namespace ThinKingMik\ApiProxy\Models;

class ProxyResponse {

    private $statusCode = null;
    private $reasonPhrase = null;
    private $protocolVersion = null;
    private $content = null;
    private $contentType = null;

    public function __construct($statusCode, $reasonPhrase, $protoVersion, $content, $contentType) {
        $this->statusCode = $statusCode;
        $this->reasonPhrase = $reasonPhrase;
        $this->protocolVersion = $protoVersion;
        $this->content = $content;
        $this->contentType = $contentType;

    }

    public function setStatusCode($status) {
        $this->statusCode = $status;
    }

    public function setReasonPhrase($phrase) {
        $this->reasonPhrase = $phrase;
    }

    public function setProtoVersion($proto) {
        $this->protocolVersion = $proto;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function setContentType($contentType) {
        $this->contentType = $contentType;
    }

    public function getStatusCode() {
        return $this->statusCode;
    }

    public function getReasonPhrase() {
        return $this->reasonPhrase;
    }

    public function getProtoVersion() {
        return $this->protocolVersion;
    }

    public function getContent() {
        return $this->content;
    }

    public function getContentType() {
        return $this->contentType;
    }
}
