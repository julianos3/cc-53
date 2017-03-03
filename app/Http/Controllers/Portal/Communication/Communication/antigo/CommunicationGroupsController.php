<?php

namespace CentralCondo\Http\Controllers;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\CommunicationGroupCreateRequest;
use CentralCondo\Http\Requests\CommunicationGroupUpdateRequest;
use CentralCondo\Repositories\CommunicationGroupRepository;
use CentralCondo\Validators\CommunicationGroupValidator;


class CommunicationGroupsController extends Controller
{

    /**
     * @var CommunicationGroupRepository
     */
    protected $repository;

    /**
     * @var CommunicationGroupValidator
     */
    protected $validator;

    public function __construct(CommunicationGroupRepository $repository, CommunicationGroupValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $communicationGroups = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $communicationGroups,
            ]);
        }

        return view('communicationGroups.index', compact('communicationGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CommunicationGroupCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CommunicationGroupCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $communicationGroup = $this->repository->create($request->all());

            $response = [
                'message' => 'CommunicationGroup created.',
                'data'    => $communicationGroup->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $communicationGroup = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $communicationGroup,
            ]);
        }

        return view('communicationGroups.show', compact('communicationGroup'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $communicationGroup = $this->repository->find($id);

        return view('communicationGroups.edit', compact('communicationGroup'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  CommunicationGroupUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(CommunicationGroupUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $communicationGroup = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'CommunicationGroup updated.',
                'data'    => $communicationGroup->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'CommunicationGroup deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'CommunicationGroup deleted.');
    }
}
