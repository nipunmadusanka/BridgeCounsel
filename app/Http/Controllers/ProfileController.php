<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\TherapistInfo;
use App\Models\StudentAnswer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function postBlog()
    {
        return view('post-blog');
    }

    // public function chat() {
    //     return view('chat');
    // }
    public function dashboard()
    {
        $userType = Auth::user()->user_type;
        // $special_for = Auth::user()->special_for;
        $userId = Auth::id();
        if ($userType == '2') {
            // $response = Http::get('http://127.0.0.1:5000/');
            // $response2 = Http::post('http://127.0.0.1:5000/items', 'hello');
            // $features = [
            //     [4, 4, 3, 4, 4, 2, 3, 4, 2]
            // ];

            // // Make an HTTP POST request to the Flask API with JSON data
            // $response = Http::post('http://127.0.0.1:5000/predict', [
            //     'features' => $features
            // ]);

            // dd($response->json());


            $therapist_info = TherapistInfo::where('user_id', $userId)->first();
            $sudentall = DB::table('users')
                ->join('student_infos', 'users.id', '=', 'student_infos.user_id')
                ->join('student_answers', 'users.id', '=', 'student_answers.user_id')
                ->select('student_infos.*', 'student_answers.*')
                ->where('student_answers.disease', $therapist_info->special_for)
                ->get();
            return view('dashboard', ['therapist_student' => $sudentall]);
            // dd($sudentall, $therapist_info->special_for);
        } elseif ($userType == '1') {
            $student_answer = StudentAnswer::where('user_id', $userId)->first();
            $therapistAll = DB::table('therapist_infos')
                ->join('users', 'therapist_infos.user_id', '=', 'users.id')
                ->select('therapist_infos.*', 'users.*')
                ->where('therapist_infos.special_for', $student_answer->disease)
                ->get();
            dd($therapistAll);
        }
        return view('dashboard');
    }
}
