<?php

namespace App\Http\Controllers;

use App\Birthday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;

class BirthdayController extends Controller
{
    /**
     * BirthdayController constructor.
     *
     * Will be accessible only if you're connected
     */
    public function __construct()
    {
//        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the birthdays.
     *
     * @return Response
     */
    public function index()
    {
        // Get current date to check in the view
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $day = $now->day;

        // $birthday_list = Birthday::all()->sortBy("name")->where('user_id', '=', Auth()->id());
        $birthday_list = Birthday::all()
            ->sortBy(function($val) {
                // Get the month only
                // return Carbon::parse($val->date)->format('m');
                $moday = Carbon::parse($val->date);
                return [$moday->month, $moday->day];
            })
            ->where('user_id', Auth()->id());
/*
        $birthday_list = Birthday::where('user_id', '=', Auth()->id())
            // ->groupBy(function($val) {
            ->orderBy(function($val) {
                return Carbon::parse($val->date)->format('m');
            })
            ->get();
*/
        // $birthday_list is a collection, so need to check with method 'isEmpty'
//        $birthday_list = $birthday_list->isEmpty() ? null : $birthday_list;
//        return view('birthday.index', compact('birthday_list'));
        // or
        if ($birthday_list->isEmpty()) {
            $birthday_list = null;
            flash("<strong>WOOPS !!!</strong> No birthday has been recorded, It's time to add a new one")->info();
//            flash()->overlay('No birthday has been recorded,<br>It\'s time to add a new one', 'WOOPS !!!');
        }
        return view('birthday.index', compact('birthday_list', 'year', 'month', 'day'));
    }

    /**
     * Show the form for creating a new birthday.
     *
     * @return Response
     */
    public function create()
    {
        return view('birthday.create');
    }

    /**
     * Store a newly created birthday.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        // Need to be sure to remove the first '0'
        // So we convert to integer
        // *** WARNING ***
        // *** Need to use $request['xxx'] NOT request->xxx
        $request['day'] = (int)$request->day;
        $request['month'] = (int)$request->month;
        $request['year'] = (int)$request->year;

        $request['date'] = Carbon::create($request->year, $request->month, $request->day, 0);

        // Now we can validate
        $birthday = $this->validate($request, [
            'name' => 'required',
            // it's not require but need to check it, if not, it will not be save in the db
            // because we're saving "$birthday"
            'email' => 'nullable|email',
            'date' => 'required|date',
            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => 'nullable|integer'
        ]);
        $birthday['user_id'] = Auth()->id();

        try {
            // And save it in the database if everything's ok
            Birthday::create($birthday);

            flash("Birthday added")->success();

            // Go back to the index to list all if saving ok
            return redirect()->action('BirthdayController@index');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                flash("<center>The email <strong>\"{$request['email']}\"</strong> already exist !!!</center>", 'danger')->error();
            }
            // Go back to the form with the previous inputs
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        // Call where before find, to be sure we're searching the record
        // for the current user AND then the ID
        $birthday = Birthday::where('user_id', Auth()->id())->find($id);
        // For the view, we need to explode date into 3 vars
        $birthday->year = $birthday->date->format('Y');
        $birthday->month = $birthday->date->format('m');
        $birthday->day = $birthday->date->format('d');

        return view('birthday.edit', compact('birthday'));
    }

    /**
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
//    public function update(BirthdayRequest $request, $id)
    public function update(Request $request, $id)
    {
        // Do the check like in 'store' method
        $request['day'] = (int)$request->day;
        $request['month'] = (int)$request->month;
        $request['year'] = (int)$request->year;
        $request['date'] = Carbon::create($request->year, $request->month, $request->day, 0);

        // Now we can validate
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'date' => 'required|date',
            'day' => 'required|integer|between:1,31',
            'month' => 'required|integer|between:1,12',
            'year' => 'nullable|integer'
        ]);

        // and save it
        $birthday = Birthday::find($id);
        $birthday->name = $request->get('name');
        $birthday->email = $request->get('email');
        $birthday->date = $request->get('date');
        $birthday->save();

        flash("Birthday updated")->success();
        return redirect('/birthday');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
//        flash("Birthday removed")->important();
        // DELETE RECORD $id HERE
        $birthday = Birthday::find($id);

//        return $birthday;

        $birthday->delete();

        return redirect('/birthday');
    }
}
