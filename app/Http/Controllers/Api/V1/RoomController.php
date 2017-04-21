<?php

namespace KC\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use KC\Http\Controllers\Api\Controller;
use KC\Services\RoomServices\RoomFetcher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KC\Models\Room\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoomFetcher $fetcher)
    {
        return $fetcher->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = Room::create($request->all());

        return $this->response("Room {$room->name} created", ['id' => $room->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RoomFetcher $fetcher, $id)
    {
        return $fetcher->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $room = Room::findOrFail($id);
            $room->update($request->all());
            return $this->response("Room {$room->name} updated.");
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException('Room not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::destroy($id);
        return $this->response("Room $id successfully destroyed");
    }
}
