<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use App\Services\FileService;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    /**
     * @var FileService
     */
    protected $service;
    /**
     * @var FileRepository
     */
    protected $fileRepository;

    /**
     * FileController constructor.
     */
    public function __construct(FileService $service, FileRepository $repository)
    {
        $this->service = $service;
        $this->fileRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = $this->fileRepository->getWithPaginate();

        return view('files.index',
            compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//      $file = new File();

        return view('files.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'content' => 'required',
//            'file'    => 'required|mimes:txt',
        ]);

        $path = "uploads/user_" . Auth::user()->id;
        $request->file('file')->store($path, 'public');

        $data = $this->service->getDataForStore($request);
        $data['path'] = $request->file('file')->store($path, 'public');

        $item = (new File())->create($data);

        return redirect()->route('files.download', $item->id)
            ->with(['success' => 'Успешно сохранено!']);
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //dd($file->comments()->paginate(20));
        //прописать отношения
        return view('files.show', [
            'file' => $file,
            'comments' => $file
                ->comments()
                ->paginate(5),
        ]);
    }

//$item = File::find($id);
//$path = "storage/uploads/user_" . $item->user_id . "/" . $item->hash_name;
//return response()->download($path, $item->name);

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
