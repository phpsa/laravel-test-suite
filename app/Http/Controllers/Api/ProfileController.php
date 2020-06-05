<?php namespace App\Http\Controllers\Api;

use Phpsa\LaravelApiController\Http\Api\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

    /**
     * Set the default sorting for queries.
     *
     * @var string
     */
    protected $defaultSort = null;

    /**
     * Number of items displayed at once if not specified.
     * There is no limit if it is 0 or false.
     *
     * @var int
     */
    protected $defaultLimit = 25;

    /**
     * Maximum limit that can be set via $_GET['limit'].
     *
     * @var int
     */
    protected $maximumLimit = 100;

    /**
     * WhiteList of includable methods (HasOne / HasMany)
     */
    protected $includesWhitelist = [];

    /**
     * Blacklist of blockable methods (HasOne / HasMany)
     */
    protected $includesBlacklist = [];

    /**
     * Resource for item.
     *
     * @var \Phpsa\LaravelApiController\Http\Resources\ApiResource
     */
    protected $resourceSingle = \Phpsa\LaravelApiController\Http\Resources\ApiResource::class;

    /**
     * Resource for collection.
     *
     * @var \Phpsa\LaravelApiController\Http\Resources\ApiCollection
     */
    protected $resourceCollection = \Phpsa\LaravelApiController\Http\Resources\ApiCollection::class;

    /**
     * Eloquent model.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    protected function model()
    {
        return Profile::class;
    }

    /**
     * Display a listing of the resource.
     * GET /api/{resource}.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->handleIndexAction($request);
    }

   /**
    * Store a newly created resource in storage.
    * POST /api/{resource}.
    *
    * @param Request $request
    *
    * @see self::handleStoreOrUpdateAction to do magic insert / update
    *
    * @return Response
    */
    public function store(Request $request)
    {
        return $this->handleStoreAction($request);
    }

    /**
     * Display the specified resource.
     * GET /api/{resource}/{id}.
     *
     * @param int $id
       * @param Request $request
     *
     * @return Response
     */
    public function show($id, Request $request)
    {
        return $this->handleShowAction($id, $request);
    }

    /**
     * Update the specified resource in storage.
     * PUT /api/{resource}/{id}.
     *
     * @param int $id
       * @param Request $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        return $this->handleUpdateAction($id, $request);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /api/{resource}/{id}.
     *
     * @param int $id
       * @param Request $request
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        return $this->handleDestroyAction($id, $request);
    }
}
