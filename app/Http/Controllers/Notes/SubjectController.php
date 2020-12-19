<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        return SubjectResource::collection(Subject::latest()->get());
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        $subject = Subject::create([
            'name' => request('name'),
            'slug' => \Str::slug(request('name')),
        ]);

        return response()->json([
            'message' => 'Your subject was created',
            'subject' => $subject
        ]);
    }

    public function show(Subject $subject)
    {
        return SubjectResource::make($subject);
    }

    public function update(Subject $subject)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $subject->update([
            'name' => request('name'),
        ]);

        return response()->json([
            'message' => 'Your subject was updated',
            'subject' => $subject
        ]);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json([
            'message' => 'Your subject was deleted'
        ], 200);
    }
}
