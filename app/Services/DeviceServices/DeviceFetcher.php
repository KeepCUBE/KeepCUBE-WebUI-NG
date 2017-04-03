<?php
namespace KC\Services\DeviceServices;

use KC\Models\Device\Device;
use KC\Transformers\DeviceTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Spatie\Fractal\Fractal;

class DeviceFetcher {
    private $device;
    public function __construct(Device $device, Fractal $fractal) {
        $this->device = $device;
        $this->fractal = $fractal;
    }
    public function find($id) {
        try {
            $device = $this->device->findOrFail($id);
            return $this->fractal->item($device, new DeviceTransformer);
        } catch(\Exception $e) {
            throw new NotFoundHttpException("Device with id {$id} not found");
        }
    }
    public function paginate(array $query = null, $perPage = 15) {
        $devices = $this->device->paginate($perPage);

        return $this->fractal
            ->collection($devices, new DeviceTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($devices))
            ->toArray();
    }
}