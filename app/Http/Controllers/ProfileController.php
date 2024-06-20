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
use App\Models\BlogPosts;
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
        if (Auth::user()->user_type == 2) {
            return view('post-blog');
        } else {
            return redirect()->back();
        }
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image file
        ]);

        $post = new BlogPosts();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Save the image to the public/images directory
            $post->image = $imageName; // Save the image name in the database
        }
        $post->content = $request->content;
        $post->save();

        return response()->json(['success' => 'Blog posted successfully']);
    }

    public function dashboard()
    {
        $userType = Auth::user()->user_type;
        // $special_for = Auth::user()->special_for;
        $userId = Auth::id();
        if ($userType == '2') {
            $therapist_info = TherapistInfo::where('user_id', $userId)->first();
            $sudentall = DB::table('users')
                ->join('student_infos', 'users.id', '=', 'student_infos.user_id')
                ->join('student_answers', 'users.id', '=', 'student_answers.user_id')
                ->select('student_infos.*', 'student_answers.*')
                ->where('student_answers.disease', $therapist_info->special_for)
                ->get();

            $myblogpost = BlogPosts::where('user_id', $userId)->get();
            return view('dashboard', ['therapist_student' => $sudentall, 'myblogpost' => $myblogpost]);

        } elseif ($userType == '1') {
            $student_answer = StudentAnswer::where('user_id', $userId)->first();
            $therapistAll = DB::table('therapist_infos')
                ->join('users', 'therapist_infos.user_id', '=', 'users.id')
                ->select('therapist_infos.*', 'users.*')
                ->where('therapist_infos.special_for', $student_answer->disease)
                ->get();
            return view('dashboard', ['therapist_all' => $therapistAll]);

        }

    }
}
