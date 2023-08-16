<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TestimonialRepository;
use Illuminate\Http\Request;
use Flash;

class TestimonialController extends AppBaseController
{
    /** @var TestimonialRepository $testimonialRepository*/
    private $testimonialRepository;

    public function __construct(TestimonialRepository $testimonialRepo)
    {
        $this->testimonialRepository = $testimonialRepo;
    }

    /**
     * Display a listing of the Testimonial.
     */
    public function index(Request $request)
    {
        $testimonials = $this->testimonialRepository->paginate(10);

        return view('testimonials.index')
            ->with('testimonials', $testimonials);
    }

    /**
     * Show the form for creating a new Testimonial.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created Testimonial in storage.
     */
    public function store(CreateTestimonialRequest $request)
    {
        $input = $request->all();

        $testimonial = $this->testimonialRepository->create($input);

        Flash::success('Testimonial saved successfully.');

        return redirect(route('testimonials.index'));
    }

    /**
     * Display the specified Testimonial.
     */
    public function show($id)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        return view('testimonials.show')->with('testimonial', $testimonial);
    }

    /**
     * Show the form for editing the specified Testimonial.
     */
    public function edit($id)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        return view('testimonials.edit')->with('testimonial', $testimonial);
    }

    /**
     * Update the specified Testimonial in storage.
     */
    public function update($id, UpdateTestimonialRequest $request)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        $testimonial = $this->testimonialRepository->update($request->all(), $id);

        Flash::success('Testimonial updated successfully.');

        return redirect(route('testimonials.index'));
    }

    /**
     * Remove the specified Testimonial from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $testimonial = $this->testimonialRepository->find($id);

        if (empty($testimonial)) {
            Flash::error('Testimonial not found');

            return redirect(route('testimonials.index'));
        }

        $this->testimonialRepository->delete($id);

        Flash::success('Testimonial deleted successfully.');

        return redirect(route('testimonials.index'));
    }
}
