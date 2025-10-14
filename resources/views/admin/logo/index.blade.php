@extends('master.admin.master')
@section('title')
    Logo
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">
                    {{ isset($logo) ? 'Update Logo' : 'Add Logo' }}
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ isset($logo) ? route('logo.update', $logo->id) : route('logo.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($logo))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="categoryName">Web Title</label>
                        <input type="text"
                               name="title"
                               class="form-control"
                               placeholder="Enter Web Title Here"
                               value="{{ isset($logo) ? $logo->title : old('title') }}">
                    </div>

                    {{-- Desktop Logo --}}
                    <div class="form-group">
                        <label for="desktop_logo">Desktop Logo</label>
                        <input type="file" id="desktop_logo" name="desktop_logo" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_desktop')">
                        <img id="preview_desktop"
                             src="{{ isset($logo) && $logo->desktop_logo ? asset($logo->desktop_logo) : '#' }}"
                             alt="Desktop Logo Preview"
                             style="max-width: 150px; margin-top:10px; {{ isset($logo) ? '' : 'display:none;' }}">
                    </div>

                    {{-- Mobile Logo --}}
                    <div class="form-group">
                        <label for="mobile_logo">Mobile Logo</label>
                        <input type="file" id="mobile_logo" name="mobile_logo" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_mobile')">
                        <img id="preview_mobile"
                             src="{{ isset($logo) && $logo->mobile_logo ? asset($logo->mobile_logo) : '#' }}"
                             alt="Mobile Logo Preview"
                             style="max-width: 150px; margin-top:10px; {{ isset($logo) ? '' : 'display:none;' }}">
                    </div>

                    {{-- Favicon Logo --}}
                    <div class="form-group">
                        <label for="fav_icon_logo">Fav Icon</label>
                        <input type="file" id="fav_icon_logo" name="fav_icon_logo" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_favicon')">
                        <img id="preview_favicon"
                             src="{{ isset($logo) && $logo->fav_icon_logo ? asset($logo->fav_icon_logo) : '#' }}"
                             alt="Fav Icon Preview"
                             style="max-width: 150px; margin-top:10px; {{ isset($logo) ? '' : 'display:none;' }}">
                    </div>

                    {{-- LazyLoad Logo --}}
                    <div class="form-group">
                        <label for="lazyload_logo">LazyLoad Logo</label>
                        <input type="file" id="lazyload_logo" name="lazyload_logo" class="form-control" accept="image/*" onchange="previewImage(event, 'preview_lazyload')">
                        <img id="preview_lazyload"
                             src="{{ isset($logo) && $logo->lazyload_logo ? asset($logo->lazyload_logo) : '#' }}"
                             alt="LazyLoad Logo Preview"
                             style="max-width: 150px; margin-top:10px; {{ isset($logo) ? '' : 'display:none;' }}">
                    </div>

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">
                            {{ isset($logo) ? 'Update' : 'Submit' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Live Preview Script --}}
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
