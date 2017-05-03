<?php

namespace viewjs\Http\Controllers;

use Illuminate\Http\Request;

use viewjs\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use viewjs\Http\Requests\ProdutoCreateRequest;
use viewjs\Http\Requests\ProdutoUpdateRequest;
use viewjs\Repositories\ProdutoRepository;
use viewjs\Validators\ProdutoValidator;


class ProdutosController extends Controller
{

    /**
     * @var ProdutoRepository
     */
    protected $repository;

    /**
     * @var ProdutoValidator
     */
    protected $validator;

    public function __construct(ProdutoRepository $repository, ProdutoValidator $validator)
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
        $produtos = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $produtos,
            ]);
        }
        return $produtos;

        //return view('produtos.index', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProdutoCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $produto = $this->repository->create($request->all());

            $response = [
                'message' => 'Produto created.',
                'data'    => $produto->toArray(),
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
        $produto = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $produto,
            ]);
        }
        return $produto;
        //return view('produtos.show', compact('produto'));
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

        $produto = $this->repository->find($id);
        return $produto;
        //return view('produtos.edit', compact('produto'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ProdutoUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ProdutoUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $produto = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Produto updated.',
                'data'    => $produto->toArray(),
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
                'message' => 'Produto deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Produto deleted.');
    }
}
