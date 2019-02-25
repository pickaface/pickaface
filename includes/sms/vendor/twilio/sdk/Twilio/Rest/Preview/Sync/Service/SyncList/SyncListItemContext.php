<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\Sync\Service\SyncList;

use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class SyncListItemContext extends InstanceContext {
    /**
     * Initialize the SyncListItemContext
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param string $serviceSid The service_sid
     * @param string $listSid The list_sid
     * @param integer $index The index
     * @return \Twilio\Rest\Preview\Sync\Service\SyncList\SyncListItemContext 
     */
    public function __construct(Version $version, $serviceSid, $listSid, $index) {
        parent::__construct($version);

        // Path Solution
        $this->solution = array(
            'serviceSid' => $serviceSid,
            'listSid' => $listSid,
            'index' => $index,
        );

        $this->uri = '/Services/' . rawurlencode($serviceSid) . '/Lists/' . rawurlencode($listSid) . '/Items/' . rawurlencode($index) . '';
    }

    /**
     * Fetch a SyncListItemInstance
     * 
     * @return SyncListItemInstance Fetched SyncListItemInstance
     */
    public function fetch() {
        $params = Values::of(array());

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
        );
    }

    /**
     * Deletes the SyncListItemInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->version->delete('delete', $this->uri);
    }

    /**
     * Update the SyncListItemInstance
     * 
     * @param array $data The data
     * @return SyncListItemInstance Updated SyncListItemInstance
     */
    public function update($data) {
        $data = Values::of(array(
            'Data' => Serialize::json_object($data),
        ));

        $payload = $this->version->update(
            'POST',
            $this->uri,
            array(),
            $data
        );

        return new SyncListItemInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['listSid'],
            $this->solution['index']
        );
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.Sync.SyncListItemContext ' . implode(' ', $context) . ']';
    }
}