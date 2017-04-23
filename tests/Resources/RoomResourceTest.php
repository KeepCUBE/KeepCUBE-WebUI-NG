<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use KC\Models\Room\Room;
use KC\Models\Device\Device;

class RoomResourceTest extends TestCase
{
    use WithoutMiddleware,DatabaseMigrations;

    private $headers = [
      'Accept' => 'application/json'
    ];

    public function testRoomIndex()
    {
        $rooms = factory(Room::class, 4)->create();
        $response = $this->get(route('rooms.index'));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        foreach ($rooms as $room) {
            $response->seeJson([
                'name' => $room->name
            ]);
        }
    }
    public function testRoomFetchWithDevices() {
        $devices = factory(Device::class, 4)->create();
        $response = $this->get(route('rooms.index', ['includes' => 'devices']));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        foreach ($devices as $device) {
            $response->seeJson([
                'name' => $device->name
            ]);
        }
    }
    public function testRoomShowWithDevices() {
        $device = factory(Device::class)->create();
        $response = $this->get(route('rooms.show', ['includes' => 'devices', 'room' => $device->room->id]));
        $response->seeJson(['name' => $device->name]);
    }
    public function testRoomShow() {
        $room = factory(Room::class)->create();
        $response = $this->get(route('rooms.show', ['room' => $room->id]));
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true, 'name' => $room->name]);
    }

    public function testRoomNotFoundShow() {
        $room = factory(Room::class)->create();
        $response = $this->get(route('rooms.show', ['room' => $room->id+1]), $this->headers);
        $response->seeStatusCode(404);
        $response->seeJson(['ok' => false]);
    }
    public function testRoomUpdate() {
        $room = factory(Room::class)->create();
        $response = $this->put(route('rooms.update', [
            'room' => $room->id,
            'name' => 'testvalue'
        ]), $this->headers);
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        $this->seeInDatabase('rooms', ['name' => 'testvalue']);
    }
    public function testRoomErrorUpdate() {
        $room = factory(Room::class)->create();
        $response = $this->put(route('rooms.update', [
            'room' => $room->id+1,
            'name' => 'testvalue'
        ]), [], $this->headers);
        $response->seeStatusCode(404);
        $response->seeJson(['ok' => false]);
    }
    public function testRoomCreate() {
        $room = factory(Room::class)->make();
        $response = $this->post(route('rooms.store', $room->toArray()), [], $this->headers);
        $response->seeStatusCode(200);
        $response->seeJson(['ok' => true]);
        $response->seeJson($room->toArray());
    }
    public function testRoomDestroy() {
        $room = factory(Room::class)->create();
        $response = $this->delete(route('rooms.destroy', ['rooms' => $room->id]));
        $response->seeStatusCode(200);
        $this->notSeeInDatabase('rooms', ['name' => $room->name]);
    }
}
