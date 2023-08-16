<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\BlogRepository;
use Illuminate\Http\Request;
use App\Services\Uploader;
use Flash;

class BlogController extends AppBaseController
{
    /** @var BlogRepository $blogRepository*/
    private $blogRepository;

    public function __construct(BlogRepository $blogRepo)
    {
        $this->blogRepository = $blogRepo;
    }

    /**
     * Display a listing of the Blog.
     */
    public function index(Request $request)
    {
        $blogs = $this->blogRepository->byDescIds(10);

        return view('blogs.index')
            ->with('blogs', $blogs);
    }

    /**
     * Show the form for creating a new Blog.
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created Blog in storage.
     */
    public function store(CreateBlogRequest $request)
    {
        $input = $request->all();

        $uploader = new Uploader();
        $input = $uploader->requestUpload('image', $input, 'up');

        $blog = $this->blogRepository->create($input);

        Flash::success('Dodano wpis prawidłowo.');

        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified Blog.
     */
    public function show($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Nie odnaleziono wpisu');

            return redirect(route('blogs.index'));
        }

        return view('blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified Blog.
     */
    public function edit($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Nie odnaleziono wpisu');

            return redirect(route('blogs.index'));
        }

        return view('blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified Blog in storage.
     */
    public function update($id, UpdateBlogRequest $request)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Nie odnaleziono wpisu');

            return redirect(route('blogs.index'));
        }

        $uploader = new Uploader();
        $input = $uploader->requestUpload('image', $request->all(), 'up', $blog);

        $blog = $this->blogRepository->update($input, $id);

        Flash::success('Wpis aktualizowany prawidłowo.');

        return redirect(route('blogs.index'));
    }

    /**
     * Remove the specified Blog from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $blog = $this->blogRepository->find($id);

        if (empty($blog)) {
            Flash::error('Nie odnaleziono wpisu');

            return redirect(route('blogs.index'));
        }

        $this->blogRepository->delete($id);

        Flash::success('Wpis usunięty prawidłowo.');

        return redirect(route('blogs.index'));
    }
}
