<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    protected $training;
    protected $category;


    public function __construct(Training $training, Category $category)
    {
        $this->training = $training;
        $this->category = $category;
    }
    public function index()
    {
        $trainings = $this->training->orderBy('created_at', 'DESC')->get();

        return view('workout.listing')->with(compact('trainings'));
    }

    public function create()
    {
        $categories = $this->category->orderBy('name')->get();

        return view('workout.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'category' => 'required',
        ]);
        $training = $this->training->saveTraining($request->all());

        return view('workout.listingItem')->withTraining($training);
    }

    public function destroy($id)
    {
        $this->training->find($id)->delete();

        return back();
    }

    public function edit(Training $training)
    {
        $categories = $this->category->orderBy('name')->get();

        return view('workout.edit')->withTraining($training)->with(compact('categories'));
    }

    public function update(Request $request, Training $training)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $training = $this->training->find($training->id);
        $training->update($request->all());

        return view('workout.listingItem')->withTraining($training);
    }

    public function cancelEditTraining($id)
    {
        $training = $this->training->getItem($id);
        return view('workout.listingItem')->withTraining($training);
    }
}
