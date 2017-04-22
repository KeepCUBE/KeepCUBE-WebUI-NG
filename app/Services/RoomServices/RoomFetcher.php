<?php 
namespace KC\Services\RoomServices;

use KC\Models\Room\Room;
use Spatie\Fractal\Fractal;
use KC\Transformers\RoomTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class RoomFetcher {
    private $room;
    /**
     * @var \Spatie\Fractal\Fractal
     */
    private $fractal;

    public function __construct(Room $room, Fractal $fractal) {
        $this->room = $room;
        $this->fractal = $fractal;
    }
    public function find($id, string $includes = null) {
        try {
            $this->parseIncludes($includes);
            $room = $this->room->findOrFail($id);
            return $this->fractal->item($room, new RoomTransformer);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundHttpException("Device with id {$id} not found");
        }
    }
    public function paginate(string $includes = null, $perPage = 15) {
        $rooms = $this->room->paginate($perPage);
        $this->parseIncludes($includes);
        return $this->fractal
            ->collection($rooms, new RoomTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($rooms))
            ->toArray();
    }
    public function parseIncludes($includes) {
        if($includes != null) {
                $this->fractal->parseIncludes($includes);
        }
    }
}