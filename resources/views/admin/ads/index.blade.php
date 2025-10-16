@extends('master.admin.master')
@section('title')
    Ads Management
@endsection

@section('body')
    <div class="col-md-12 col-sm-12">
        <div class="card box-shadow-0">
            <div class="card-header border-bottom">
                <h4 class="card-title">{{ isset($ads) ? 'Update Ads' : 'Add New Ads' }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ isset($ads) ? route('ads.update', $ads->id) : route('ads.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(isset($ads))
                        @method('PUT')
                    @endif

                    @php
                        $fields = [
                            'head_banner' => ['label' => 'Head Ads', 'size' => '725×100', 'width' => 725, 'height' => 100],
                            'home_shironam_ads_1' => ['label' => 'Home Shironam Ads 1', 'size' => '516×63.72', 'width' => 516, 'height' => 64],
                            'home_shironam_ads_2' => ['label' => 'Home Shironam Ads 2', 'size' => '516×63.72', 'width' => 516, 'height' => 64],
                            'news_head_ads' => ['label' => 'News Head Ads', 'size' => '516×63.72', 'width' => 516, 'height' => 64],
                            'news_pics_under_ads' => ['label' => 'News Pics Under Ads', 'size' => '486×60.03', 'width' => 486, 'height' => 60],
                            'home_box1_ads' => ['label' => 'Home Box 1 Ads', 'size' => '689×577', 'width' => 689, 'height' => 577],
                            'home_box2_ads' => ['label' => 'Home Box 2 Ads', 'size' => '689×577', 'width' => 689, 'height' => 577],
                            'news_box_ads' => ['label' => 'News Box Ads', 'size' => '689×577', 'width' => 689, 'height' => 577],
                        ];
                    @endphp

                    @foreach($fields as $field => $data)
                        <div class="form-group">
                            <label for="{{ $field }}">
                                {{ $data['label'] }}
                                <small class="text-muted">({{ $data['size'] }} px)</small>
                            </label>

                            <input type="file" name="{{ $field }}" id="{{ $field }}" class="form-control" accept="image/*"
                                   onchange="previewImage(event, 'preview_{{ $field }}', '{{ $field }}')">

                            <div class="mt-2 position-relative" style="display:inline-block;">
                                <img id="preview_{{ $field }}"
                                     src="{{ isset($ads) && $ads->$field ? asset($ads->$field) : '#' }}"
                                     alt="{{ $data['label'] }} Preview"
                                     width="{{ $data['width'] }}"
                                     height="{{ $data['height'] }}"
                                     style="border:1px solid #ddd; border-radius:5px; padding:3px; {{ isset($ads) && $ads->$field ? '' : 'display:none;' }}">

                                {{-- Remove Button --}}
                                <button type="button"
                                        class="btn btn-danger btn-sm position-absolute"
                                        style="top:-10px; right:-10px; border-radius:50%; display: {{ isset($ads) && $ads->$field ? 'inline-block' : 'none' }};"
                                        id="remove_btn_{{ $field }}"
                                        onclick="removeImage('{{ $field }}')">
                                    &times;
                                </button>
                            </div>

                            {{-- Hidden input for image removal --}}
                            <input type="hidden" name="remove_{{ $field }}" id="remove_input_{{ $field }}" value="0">
                        </div>
                    @endforeach

                    <div class="col-md-12 mb-2">
                        <button type="submit" class="btn btn-primary btn-sm btn-block mb-2">
                            {{ isset($ads) ? 'Update Ads' : 'Submit Ads' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- JS: Live Preview + Remove --}}
    <script>
        function previewImage(event, previewId, fieldName) {
            const input = event.target;
            const preview = document.getElementById(previewId);
            const removeBtn = document.getElementById('remove_btn_' + fieldName);
            const removeInput = document.getElementById('remove_input_' + fieldName);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'inline-block';
                    removeInput.value = '0';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage(fieldName) {
            const preview = document.getElementById('preview_' + fieldName);
            const input = document.getElementById(fieldName);
            const removeBtn = document.getElementById('remove_btn_' + fieldName);
            const removeInput = document.getElementById('remove_input_' + fieldName);

            preview.src = '#';
            preview.style.display = 'none';
            input.value = '';
            removeBtn.style.display = 'none';
            removeInput.value = '1';
        }
    </script>
@endsection
