<?php

namespace dokuwiki\plugin\aichatlocal\Model\Local;

use dokuwiki\plugin\aichat\Model\AbstractModel;
use dokuwiki\plugin\aichat\Model\ChatInterface;

class ChatModel extends AbstractModel implements ChatInterface
{
    /** @inheritdoc */
    public function __construct(string $name, array $config)
    {
        parent::__construct($name, $config);

        if (empty($config['local_llm_baseurl'])) {
            throw new \Exception('Local LLM base URL not configured');
        }

        $this->http->baseURL = trim($config['local_llm_baseurl'], '/');
        
        if (!empty($config['local_llm_apikey'])) {
            $this->http->headers['Authorization'] = 'Bearer ' . $config['local_llm_apikey'];
        }
        
        $this->http->headers['Content-Type'] = 'application/json';
    }

    /** @inheritdoc */
    public function getAnswer(array $messages): string
    {
        $data = [
            'model' => $this->getModelName(),
            'messages' => $messages,
            'max_tokens' => $this->getMaxOutputTokenLength(),
            'temperature' => 0.7,
            'stream' => false,
        ];

        $response = $this->request('chat/completions', $data);
        return $response['choices'][0]['message']['content'];
    }

    /**
     * Send a request to the API
     *
     * @param string $endpoint
     * @param array $data Payload to send
     * @return array API response
     * @throws \Exception
     */
    protected function request($endpoint, $data)
    {
        $url = $this->http->baseURL . '/v1/' . $endpoint;
        return $this->sendAPIRequest('POST', $url, $data);
    }

    /** @inheritdoc */
    protected function parseAPIResponse($response)
    {
        if (isset($response['usage'])) {
            $this->inputTokensUsed += $response['usage']['prompt_tokens'];
            $this->outputTokensUsed += $response['usage']['completion_tokens'];
        }

        if (isset($response['error'])) {
            throw new \Exception('Local LLM API error: ' . $response['error']['message']);
        }

        return $response;
    }
}
