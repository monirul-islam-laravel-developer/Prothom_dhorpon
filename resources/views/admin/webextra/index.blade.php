@extends('master.admin.master')

@section('title')
    Web Extra Management
@endsection

@section('body')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Web Extra Information</h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($webextra) ? route('webextra.update', $webextra->id) : route('webextra.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($webextra))
                        @method('PUT')
                    @endif

                    <div class="form-group">
                        <label for="summernote_about">About Us</label>
                        <textarea class="form-control" id="summernote_about" name="about_us" rows="4">{{ old('about_us', $webextra->about_us ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote_privacy">Privacy and Policy</label>
                        <textarea class="form-control" id="summernote_privacy" name="privacy_and_policy" rows="4">{{ old('privacy_and_policy', $webextra->privacy_and_policy ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="summernote_terms">Terms and Conditions</label>
                        <textarea class="form-control" id="summernote_terms" name="terms_and_conditions" rows="4">{{ old('terms_and_conditions', $webextra->terms_and_conditions ?? '') }}</textarea>
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">
                            {{ isset($webextra) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JS Dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- Initialize Summernote -->
    <script>
        $(document).ready(function() {
            $('#summernote_about').summernote({ height: 200 });
            $('#summernote_privacy').summernote({ height: 200 });
            $('#summernote_terms').summernote({ height: 200 });
        });
    </script>
@endsection
