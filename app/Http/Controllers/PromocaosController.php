<?php

namespace viewjs\Http\Controllers;

use Illuminate\Http\Request;

use viewjs\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use viewjs\Http\Requests\PromocaoCreateRequest;
use viewjs\Http\Requests\PromocaoUpdateRequest;
use viewjs\Repositories\PromocaoRepository;
use viewjs\Validators\PromocaoValidator;


class PromocaosController extends Controller
{

    /**
     * @var PromocaoRepository
     */
    protected $repository;

    /**
     * @var PromocaoValidator
     */
    protected $validator;

    public function __construct(PromocaoRepository $repository, PromocaoValidator $validator)
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
        $promocaos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $promocaos,
            ]);
        }

        return $promocaos;

        //return view('promocaos.index', compact('promocaos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PromocaoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PromocaoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $promocao = $this->repository->create($request->all());

            $response = [
                'message' => 'Promocao created.',
                'data'    => $promocao->toArray(),
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
        $promocao = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $promocao,
            ]);
        }
        return $promocao;
        //return view('promocaos.show', compact('promocao'));
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

        $promocao = $this->repository->find($id);

        return view('promocaos.edit', compact('promocao'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PromocaoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(PromocaoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $promocao = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Promocao updated.',
                'data'    => $promocao->toArray(),
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
                'message' => 'Promocao deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Promocao deleted.');
    }
}
