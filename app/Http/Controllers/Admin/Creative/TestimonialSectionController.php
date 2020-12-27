<?php

namespace App\Http\Controllers\Admin\Creative;

use App\Http\Controllers\Controller;
use App\Models\Admin\Creative\CreativeTestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialSectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder ='uploads/creative/img/testimonials/';

            // Make image name
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        } else {
            // Set input
            $input['testimonial_image'] = null;
        }

        // Record to database
        CreativeTestimonialSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title']
        ]);

        return redirect()->route('testimonial.create')
            ->with('success', 'content.created_successfully');
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
        // Get model
        $testimonial_section = CreativeTestimonialSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('testimonial_image')){

            // Get image file
            $testimonial_image = $request->file('testimonial_image');

            // Folder path
            $folder ='uploads/creative/img/testimonials/';

            // Make image name
            $testimonial_image_name =  time().'-'.$testimonial_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$testimonial_section->testimonial_image));

            // Upload image
            $testimonial_image->move($folder, $testimonial_image_name);

            // Set input
            $input['testimonial_image'] = $testimonial_image_name;

        }

        // Update model
        CreativeTestimonialSection::find($id)->update($input);

        return redirect()->route('testimonial.create')
            ->with('success', 'content.updated_successfully');
    }

}
