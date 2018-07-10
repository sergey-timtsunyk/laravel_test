<?php

namespace App\Http\Controllers;

use App\District;
use App\Events\UpdatePopulationInDistrictEvent;
use App\Rules\FirstLetterUppercase;
use App\Sum;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Validator;

class DistrictsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('app.districts.index', ['districts' => District::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(), $this->getRulse());

        if ($validator->fails()) {
            return redirect(route('districts.create'))
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->getData();

        /** @var District $district */
        $district = new District();

        $district->name = $data['name'];
        $district->population = $data['population'];
        $district->description = $data['description'];
        $district->save();

        event(new UpdatePopulationInDistrictEvent($district->id));

        return redirect(route('districts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('app.districts.edit', ['district' => District::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** @var \Illuminate\Validation\Validator $validator */
        $validator = Validator::make($request->all(), $this->getRulse());

        if ($validator->fails()) {
            return redirect(route('districts.edit', [$id]))
                ->withErrors($validator)
                ->withInput();
        }

       $data = $validator->getData();

        /** @var District $district */
        $district = District::findOrFail($id);

        $district->name = $data['name'];
        $district->population = $data['population'];
        $district->description = $data['description'];
        $district->save();

        event(new UpdatePopulationInDistrictEvent($id));

        return redirect(route('districts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        District::destroy($id);

        event(new UpdatePopulationInDistrictEvent($id));

        return new Response();
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        /** @var Sum $sum */
        $sum = Sum::query()->findOrFail(1);

        return $sum->getSum();
    }

    /**
     * @return array
     */
    private function getRulse()
    {
        return [
            'name' => ['required', 'max:50', new FirstLetterUppercase],
            'population' => 'required|numeric',
            'description' => 'required|min:50',
        ];
    }
}
