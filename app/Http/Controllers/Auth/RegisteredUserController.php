<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentInfo as ModelsStudentInfo;
use App\Models\StudentAnswer as ModelsStudentAnswer;
use App\Models\TherapistInfo as TherapistInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function registerAll()
    {
        return view('auth.registerall');
    }

    public function createTherapist()
    {
        return view('auth.register-therapist');
    }

    public function storeTherapist(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'mobile' => ['required'],
            'reg_no' => ['required'],
            'special' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'user_type' => 2,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        $data2 = TherapistInfo::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'mobile' => $request->mobile,
            'reg_no' => $request->reg_no,
            'special_for' => $request->special,
            'status' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);
        return redirect()->intended(RouteServiceProvider::HOME);
        // dd($request);
    }

    // public function addStudentInfo(){
    //     return view('auth.rgister-student');
    // }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'user_type' => 1,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return view('auth.rgister-student');
        // return redirect('add-student-info');
    }

    public function studentInfo(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'address' => ['required'],
            'reg_no' => ['required'],
            'age' => ['required'],
            'gender' => ['required'],
            'education' => ['required'],
            'occupation' => ['required'],
        ]);
        $data = ModelsStudentInfo::create([
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'registration_no' => $request->reg_no,
            'age' => $request->age,
            'gender' => $request->gender,
            'education_level' => $request->education,
            'occupation' => $request->occupation,
            'status' => 1,
            'note' => "Student Added",
        ]);

        return redirect('student-qa');
    }
    public function StudenQA()
    {
        return view('auth.studen-question');
    }

    public function studentAnswer(Request $request)
    {
        $validatedData = $request->validate([
            'one' => 'required',
            'two' => 'required',
            'three' => 'required',
            'four' => 'required',
            'five' => 'required',
            'six' => 'required',
            'seven' => 'required',
            'eight' => 'required',
            'nine' => 'required',
        ]);

        $features = [
            [
                $validatedData['one'],
                $validatedData['two'],
                $validatedData['three'],
                $validatedData['four'],
                $validatedData['five'],
                $validatedData['six'],
                $validatedData['seven'],
                $validatedData['eight'],
                $validatedData['nine']
            ]
        ];

        // Make an HTTP POST request to the Flask API with JSON data
        $response = Http::post('http://127.0.0.1:5000/predict', [
            'features' => $features
        ]);
        $res = $response->json()['predictions'][0];
        if ($res == 'Inattention Symptoms') {
            $diseaseNo = 1;
        } elseif ($res == 'Hyperactivity and Impulsivity Symptoms') {
            $diseaseNo = 2;
        } elseif ($res == 'Co-occurring Conditions') {
            $diseaseNo = 3;
        } elseif ($res == 'Functional Impairment') {
            $diseaseNo = 4;
        }
        // dd($diseaseNo);

        $data = ModelsStudentAnswer::create([
            'user_id' => Auth::id(),
            'one' => $request->one,
            'two' => $request->two,
            'three' => $request->three,
            'four' => $request->four,
            'five' => $request->five,
            'six' => $request->six,
            'seven' => $request->seven,
            'eight' => $request->eight,
            'nine' => $request->nine,
            'disease' => $diseaseNo,
            'status' => "1",
        ]);
        return redirect()->intended(RouteServiceProvider::HOME);
        // dd($request);
    }
}
