<?php

namespace DesignPattern\Behavioral\Mediator;

class Mediator implements MediatorInterface
{
    /**
     * @var \DesignPattern\Behavioral\Mediator\Consumer
     */
    private $consumer;

    /**
     * @var \DesignPattern\Behavioral\Mediator\Database
     */
    private $database;

    /**
     * @var \DesignPattern\Behavioral\Mediator\Server
     */
    private $server;

    /**
     * Set consumer instance.
     *
     * @param \DesignPattern\Behavioral\Mediator\Consumer $consumer
     *
     * @return $this
     */
    public function setConsumer(Consumer $consumer)
    {
        $this->consumer = $consumer;

        return $this;
    }

    /**
     * Set database instance.
     *
     * @param \DesignPattern\Behavioral\Mediator\Database $database
     *
     * @return $this
     */
    public function setDatabase(Database $database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Set server instance.
     *
     * @param \DesignPattern\Behavioral\Mediator\Server $server
     *
     * @return $this
     */
    public function setServer(Server $server)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Send request.
     *
     * @return mixed
     */
    public function sendRequest()
    {
        return $this->server->response();
    }

    /**
     * Query some data.
     *
     * @return string
     */
    public function query() : string
    {
        return $this->database->query();
    }

    /**
     * Send response.
     *
     * @param string $content
     *
     * @return string
     */
    public function sendResponse($content)
    {
        echo $this->consumer->output($content);
    }
}
