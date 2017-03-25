<?php

namespace KC\Http\Controllers\Api\V1;

use KC\Http\Requests\DeviceRequests\DeviceRequest;
use KC\Models\Device\Device;
use Illuminate\Http\Request;
use KC\Services\DeviceServices\DeviceFetcher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KC\Http\Controllers\Api\Controller;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DeviceFetcher $fetcher)
    {
        return $fetcher->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        return Device::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceFetcher $fetcher, $id)
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
            $device = Device::findOrFail($id);
            $device->update($request->all());
            return $this->successResponse("Device {$device->name} updated.");
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new NotFoundHttpException('chyba');
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
        return Device::destroy($id);
    }
}
