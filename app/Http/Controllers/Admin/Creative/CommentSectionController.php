<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Creative\CreativeComment;

class CommentSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $comments = CreativeComment::all()->sortByDesc("id");

        return view('admin.creative.comment.index', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        // Update to database
        CreativeComment::find($id)->update(['approval' => 1]);

        return redirect()->route('comment-section.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mark_all_approval_update()
    {
        $comments = CreativeComment::all()->where('approval', '=', 0);

        // Update to database
        foreach ($comments as $comment) {
            CreativeComment::find($comment->id)->update(['approval' => 1]);
        }

        return redirect()->route('comment-section.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $comment = CreativeComment::find($id);

        // Delete record
        $comment->delete();

        return redirect()->route('comment-section.index')
            ->with('success', 'content.deleted_successfully');
    }
}
