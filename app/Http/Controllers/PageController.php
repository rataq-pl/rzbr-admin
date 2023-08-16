<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use App\Services\Uploader;
use Flash;

class PageController extends AppBaseController
{
    /** @var PageRepository $pageRepository*/
    private $pageRepository;

    public function __construct(PageRepository $pageRepo)
    {
        $this->pageRepository = $pageRepo;
    }

    /**
     * Display a listing of the Page.
     */
    public function index(Request $request)
    {
        $pages = $this->pageRepository->paginate(10);

        return view('pages.index')
            ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new Page.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created Page in storage.
     */
    public function store(CreatePageRequest $request)
    {
        $input = $request->all();

        $uploader = new Uploader();
        $input = $uploader->requestUpload('image', $input, 'up');

        $page = $this->pageRepository->create($input);

        Flash::success('Strona zapisana prawidłowo.');

        return redirect(route('pages.index'));
    }

    /**
     * Display the specified Page.
     */
    public function show($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error('Nie znaleziono strony');

            return redirect(route('pages.index'));
        }

        return view('pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified Page.
     */
    public function edit($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error('Nie znaleziono strony');

            return redirect(route('pages.index'));
        }

        return view('pages.edit')->with('page', $page);
    }

    /**
     * Update the specified Page in storage.
     */
    public function update($id, UpdatePageRequest $request)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error('Nie znaleziono strony');

            return redirect(route('pages.index'));
        }

        $input = $request->all();
        
        $uploader = new Uploader();
        $input = $uploader->requestUpload('image', $input, 'up', $page);

        $page = $this->pageRepository->update($input, $id);

        Flash::success('Strona zaktualizowana prawidłowo.');

        return redirect(route('pages.index'));
    }

    /**
     * Remove the specified Page from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $page = $this->pageRepository->find($id);

        if (empty($page)) {
            Flash::error('Nie znaleziono strony');

            return redirect(route('pages.index'));
        }

        $this->pageRepository->delete($id);

        Flash::success('Strona usunięta prawidłowo.');

        return redirect(route('pages.index'));
    }
}
