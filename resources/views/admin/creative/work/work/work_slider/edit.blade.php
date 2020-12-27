@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_slider') }}</h4>
                    <form action="{{ route('work-slider.update', $slider_item->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input name="creative_work_id" type="hidden" value="{{ $creative_work_id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="slider_image">{{ __('content.image') }} ({{ __('content.size') }} 775 x 575) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="slider_image" class="form-control-file" id="slider_image">
                                    <small id="slider_image" class="form-text text-muted">{{ __('content.recommended_size') }}</small>
                                </div>
                                <div class="height-card box-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="avatar-area text-center">
                                                <div class="media">
                                                    <a  class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                        <img src="{{ asset('uploads/creative/img/works/sliders/'.$slider_item->slider_image) }}" alt="slider image" class="rounded w-25">
                                                    </a>
                                                </div>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                    </div>
                                    <!--end card-->
                                </div>
                                <!--end col-->
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- end row -->

@endsection