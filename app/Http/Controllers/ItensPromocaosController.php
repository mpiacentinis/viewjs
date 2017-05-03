<?php

namespace viewjs\Http\Controllers;

use Illuminate\Http\Request;

use viewjs\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use viewjs\Http\Requests\ItensPromocaoCreateRequest;
use viewjs\Http\Requests\ItensPromocaoUpdateRequest;
use viewjs\Repositories\ItensPromocaoRepository;
use viewjs\Validators\ItensPromocaoValidator;


class ItensPromocaosController extends Controller
{

    /**
     * @var ItensPromocaoRepository
     */
    protected $repository;

    /**
     * @var ItensPromocaoValidator
     */
    protected $validator;

    public function __construct(ItensPromocaoRepository $repository, ItensPromocaoValidator $validator)
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
        $itensPromocaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $itensPromocaos,
            ]);
        }
        return $itensPromocaos;
        //return view('itensPromocaos.index', compact('itensPromocaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ItensPromocaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ItensPromocaoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $itensPromocao = $this->repository->create($request->all());

            $response = [
                'message' => 'ItensPromocao created.',
                'data'    => $itensPromocao->toArray(),
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
        $itensPromocao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $itensPromocao,
            ]);
        }
        return $itensPromocao;
        //return view('itensPromocaos.show', compact('itensPromocao'));
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

        $itensPromocao = $this->repository->find($id);

        return view('itensPromocaos.edit', compact('itensPromocao'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ItensPromocaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ItensPromocaoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $itensPromocao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ItensPromocao updated.',
                'data'    => $itensPromocao->toArray(),
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
                'message' => 'ItensPromocao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ItensPromocao deleted.');
    }
}
