<?php

namespace Baorv\CleverReach\Resources\Endpoints;

use Baorv\CleverReach\Exceptions\CleverReachException;
use Baorv\CleverReach\Resources\Resource;

class Forms extends Resource
{

    /**
     * Return list of forms
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/list_get
     * @return array
     * @throws CleverReachException
     */
    public function forms(): array
    {
        return $this->httpClient->get('/v3/forms.json');
    }

    /**
     * Return a form
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/list_get
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function get(string $id): array
    {
        return $this->httpClient->get("/v3/forms.json/{$id}");
    }

    /**
     * Return code for embedding
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/retrieveCode_get
     * @param string $id
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function code(string $id, array $params = []): array
    {
        return $this->httpClient->get("/v3/forms.json/{$id}/code", $params);
    }

    /**
     * Send subscribe/unsubscribe mail to one of your receivers
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/sendMail_post
     * @param string $formID
     * @param string $type
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function send(string $formID, string $type, array $params = []): array
    {
        return $this->httpClient->post("/v3/forms.json/{$formID}/send/{$type}", $params);
    }

    /**
     * Creates a form from a template by given type
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/createTemplateForm_post
     * @param string $groupID
     * @param string $type
     * @param array $params
     * @return array
     * @throws CleverReachException
     */
    public function createFromTemplate(string $groupID, string $type, array $params = []): array
    {
        return $this->httpClient->post("/v3/forms.json/{$groupID}/createfromtemplate/{$type}", $params);
    }

    /**
     * Delete form
     *
     * @link https://rest.cleverreach.com/explorer/v3/#!/forms-v3/remove_delete
     * @param string $id
     * @return array
     * @throws CleverReachException
     */
    public function delete(string $id): array
    {
        return $this->httpClient->delete("/v3/forms.json/{$id}");
    }
}