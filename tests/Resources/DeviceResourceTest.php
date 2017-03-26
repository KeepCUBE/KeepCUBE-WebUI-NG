<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KC\Models\Device\Device;
use KC\Models\DeviceType\DeviceType;

class DeviceResourceTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeviceIndex()
    {
        $devices = factory(Device::class, 4)->create();
        $response = $this->get(route('devices.index'));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        foreach ($devices as $device) {
            $response->seeJson([
                'name' => $device->name,
            ]);
        }
    }

    public function testDeviceShow() {
        $device = factory(Device::class)->create();
        $response = $this->get(route('devices.show', ['device' => $device->id]));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true, 'name' => $device->name]);
    }
    
    public function testDeviceNotFoundShow() {
        $device = factory(Device::class)->create();
        $response = $this->get(route('devices.show', [
            'device' => $device->id+1
            ] ),$this->headers);
        $response->seeStatusCode(404);
        $response->seeJson(['ok' => false]);
    }

    public function testDeviceUpdate() {
        $device = factory(Device::class)->create();
        $response = $this->put(route('devices.update', [
            'device' => $device->id,
            'name' => 'testvalue'
        ]));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        $this->seeInDatabase('devices', ['name' => 'testvalue']);
    }
    public function testDeviceUpdateError() {
        $device = factory(Device::class)->create();
        $response = $this->put(route('devices.update', [
            'device' => $device->id+1,
            'name' => 'testvalue'
        ]), [],['Accept' => 'application/json']);
        $response->seeStatusCode(404);
        $response->seeJson(['ok' => false]);
    }
    public function testDeviceCreate() {
        $device = factory(Device::class)->make();
        $response = $this->post(route('devices.store', $device->toArray()), [], $this->headers);
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
    }
    public function testDeviceDestroy() {
        $device = factory(Device::class)->create();
        $response = $this->delete(route('devices.destroy', ['devices'=> $device->id]));
        $response->seeStatusCode(200);
        $this->notSeeInDatabase('devices', ['name' => $device->name]);
    }
}
