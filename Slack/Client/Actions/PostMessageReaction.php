<?php

namespace DZunke\SlackBundle\Slack\Client\Actions;

use DZunke\SlackBundle\Slack\Client\Actions;

/**
 * @see https://api.slack.com/methods/reactions.add
 */
class PostMessageReaction implements ActionsInterface
{
    /**
     * @var array
     */
    protected $parameter = [
        'name'          => null,
        'channel'       => null,
        'file'          => null,
        'file_comment'  => null,
        'timestamp'     => null,
    ];

    /**
     * @return array
     * @throws \Exception
     */
    public function getRenderedRequestParams()
    {
        if (is_null($this->parameter['name'])) {
            throw new \Exception('the emoji name must be given');
        }
        return $this->parameter;
    }

    /**
     * @param array $parameter
     * @return $this
     */
    public function setParameter(array $parameter)
    {
        foreach ($parameter as $key => $value) {
            if (array_key_exists($key, $this->parameter)) {
                $this->parameter[$key] = $value;
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return Actions::ACTION_REACTIONS_ADD;
    }

    /**
     * @param array $response
     * @return boolean
     */
    public function parseResponse(array $response)
    {
        return  $response['ok'];
    }
}
