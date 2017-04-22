<?php

namespace KC\Http\Controllers\Api\V1;

use KC\Http\Requests\DeviceRequests\DeviceRequest;
use KC\Models\Device\Device;
use Illuminate\Http\Request;
use KC\Services\DeviceServices\DeviceFetcher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use KC\Http\Controllers\Api\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $device = Device::create($request->all());

        return $this->response("Device {$device->name} created", [$device->toArray()]);
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
            return $this->response("Device {$device->name} updated.");
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException('Device not found');
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
        $device = Device::destroy($id);
        return $this->response("Device $id successfully destroyed");
    }
}
