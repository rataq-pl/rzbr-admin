<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFAQRequest;
use App\Http\Requests\UpdateFAQRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\FAQRepository;
use Illuminate\Http\Request;
use Flash;

class FAQController extends AppBaseController
{
    /** @var FAQRepository $fAQRepository*/
    private $fAQRepository;

    public function __construct(FAQRepository $fAQRepo)
    {
        $this->fAQRepository = $fAQRepo;
    }

    /**
     * Display a listing of the FAQ.
     */
    public function index(Request $request)
    {
        $fAQS = $this->fAQRepository->paginate(50);

        return view('f_a_q_s.index')
            ->with('fAQS', $fAQS);
    }

    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        return view('f_a_q_s.create');
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(CreateFAQRequest $request)
    {
        $input = $request->all();

        $fAQ = $this->fAQRepository->create($input);

        Flash::success('F A Q zapisano prawidłowo.');

        return redirect(route('fAQS.index'));
    }

    /**
     * Display the specified FAQ.
     */
    public function show($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('Nie znaleziono FAQ');

            return redirect(route('fAQS.index'));
        }

        return view('f_a_q_s.show')->with('fAQ', $fAQ);
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('Nie znaleziono FAQ');

            return redirect(route('fAQS.index'));
        }

        return view('f_a_q_s.edit')->with('fAQ', $fAQ);
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update($id, UpdateFAQRequest $request)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('Nie znaleziono FAQ');

            return redirect(route('fAQS.index'));
        }

        $fAQ = $this->fAQRepository->update($request->all(), $id);

        Flash::success('F A Q zaktualizowane prawidłowo.');

        return redirect(route('fAQS.index'));
    }

    /**
     * Remove the specified FAQ from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $fAQ = $this->fAQRepository->find($id);

        if (empty($fAQ)) {
            Flash::error('Nie znaleziono FAQ');

            return redirect(route('fAQS.index'));
        }

        $this->fAQRepository->delete($id);

        Flash::success('F A Q usunięto prawidłowo.');

        return redirect(route('fAQS.index'));
    }

    public function ordering(){
        $data = json_decode(file_get_contents('php://input'));
        $elements = $this->fAQRepository->allInArray($data->tab);
        $this->fAQRepository->updateOrder($elements);
        return true;
    }
}
