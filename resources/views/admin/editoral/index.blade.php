@extends('master.admin.master')
@section('title')
    Editoral
@endsection
@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">Editoral Form</h4>
            </div>
            <div class="card-body">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                    <form action="{{ isset($editoral) ? route('editoral.update', $editoral->id) : route('editoral.store') }}"
                          method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($editoral))
                            @method('PUT')
                        @endif
                    <div class="form-group">
                        <label>প্রকাশক ও সম্পাদক</label>
                        <input
                            type="text"
                            name="publisher_and_editor"
                            class="form-control @error('publisher_and_editor') is-invalid @enderror"
                            placeholder="প্রকাশক ও সম্পাদকের নাম লিখুন"
                            value="{{ old('publisher_and_editor', $editoral->publisher_and_editor ?? '') }}">
                        @error('publisher_and_editor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>নির্বাহী সম্পাদক</label>
                        <input type="text" name="executive_editor" class="form-control"
                               value="{{ old('executive_editor', $editoral->executive_editor ?? '') }}"
                               placeholder="নির্বাহী সম্পাদকের নাম লিখুন">
                    </div>

                    <div class="form-group">
                        <label>বার্তা সম্পাদক</label>
                        <input type="text" name="message_editor" class="form-control"
                               value="{{ old('message_editor', $editoral->message_editor ?? '') }}"
                               placeholder="বার্তা সম্পাদকের নাম লিখুন">
                    </div>

                    <div class="form-group">
                        <label>আইন বিষয়ক উপদেষ্টা</label>
                        <input type="text" name="legal_advisor" class="form-control"
                               value="{{ old('legal_advisor', $editoral->legal_advisor ?? '') }}"
                               placeholder="আইন বিষয়ক উপদেষ্টার নাম লিখুন">
                    </div>

                    <div class="form-group">
                        <label>উপদেষ্টা</label>
                        <input type="text" name="advisor" class="form-control"
                               value="{{ old('advisor', $editoral->advisor ?? '') }}"
                               placeholder="উপদেষ্টার নাম লিখুন">
                    </div>

                    <div class="form-group">
                        <label>অফিস</label>
                        <input type="text" name="office" class="form-control"
                               value="{{ old('office', $editoral->office ?? '') }}"
                               placeholder="অফিসের ঠিকানা লিখুন">
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">
                            {{ isset($editoral) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
