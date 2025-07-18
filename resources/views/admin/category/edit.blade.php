@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <h5 class="card-header">Категорії(направлення) / Створення</h5>
                <div class="card-body">
                    <div>
                        <form method="post" action="{{ route('admin.category.update', ['id' => $category->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-2">
                                        <label for="division_id">Підрозділ</label>
                                        <select name="division_id" class="form-control">
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}" @if($category->division_id == $division->id) selected @endif>{{ $division->translation->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="image">Забраження(для сторінки лікарів)</label>
                                        <input type="file" name="image" class="form-control">
                                        <div class="image-result">
                                            @if($category->image)
                                                @if(file_exists(public_path($category->image)))
                                                    <div class="col-md-12 mt-3">
                                                        <div class="image">
                                                            <img src="{{ asset($category->image) }}" width="150">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt-2">
                                                        <span class="btn btn-outline-danger cursor-pointer" id="image_del" data-category="{{ $category->id }}">Видалити зображення</span>
                                                    </div>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="is_visible">Відображати</label>
                                        <select name="is_visible" class="form-control">
                                            <option value="1" @if($category->is_visible == '1') selected @endif>Відображати</option>
                                            <option value="0" @if($category->is_visible == '0') selected @endif>Не відображати</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="nav-align-top nav-tabs-shadow mb-5">
                                        <ul class="nav nav-tabs" role="tablist">
                                            @foreach(config('app.fallback_locale') as $lang)
                                                <li class="nav-item" role="presentation">
                                                    <button type="button" class="nav-link @if($lang == 'uk') active  @endif" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-{{ $lang }}" aria-controls="navs-top-{{ $lang }}" aria-selected="true">{{ strtoupper($lang) }}</button>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content">
                                            @foreach(config('app.fallback_locale') as $lang)
                                                <div class="tab-pane fade @if($lang == 'uk') show active @endif" id="navs-top-{{ $lang }}" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <label for="name_{{ $lang }}" class="form-label">Назва {{ $lang }}</label>
                                                            <input type="text" class="form-control" id="name_{{ $lang }}" placeholder="" aria-describedby="defaultFormControlHelp" name="name_{{ $lang }}" @if($lang == 'uk') required @endif value="{{ $category->admin_translation($lang)->name ?? '' }}"/>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="short_name_{{ $lang }}" class="form-label">Коротка назва {{ $lang }}</label>
                                                            <input type="text" class="form-control" id="short_name_{{ $lang }}" placeholder="" aria-describedby="defaultFormControlHelp" name="short_name_{{ $lang }}" value="{{ $category->admin_translation($lang)->short_name ?? '' }}"/>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="text_{{ $lang }}" class="form-label">Опис {{ $lang }}</label>
                                                            <textarea name="text_{{ $lang }}" id="text_{{ $lang }}" class="form-control" rows="10">{{ $category->admin_translation($lang)->text ?? '' }}</textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="seo_title_{{ $lang }}" class="form-label">Свій СЕО title {{ $lang }}</label>
                                                            <textarea name="seo_title_{{ $lang }}" class="form-control" rows="5">{{ optional(json_decode(optional($category->admin_translation($lang))->page_seo, true))['title'] ?? '' }}</textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="seo_description_{{ $lang }}" class="form-label">Свій СЕО description {{ $lang }}</label>
                                                            <textarea name="seo_description_{{ $lang }}" class="form-control" rows="5">{{ optional(json_decode(optional($category->admin_translation($lang))->page_seo, true))['description'] ?? '' }}</textarea>
                                                        </div>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="seo_keywords_{{ $lang }}" class="form-label">Свій СЕО keywords {{ $lang }}</label>
                                                            <textarea name="seo_keywords_{{ $lang }}" class="form-control" rows="5">{{ optional(json_decode(optional($category->admin_translation($lang))->page_seo, true))['keywords'] ?? '' }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="row mt-2">
                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary">Зберегти</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script')
            <script>
                @foreach(config('app.fallback_locale') as $lang)
                tinymce.init({
                    selector: 'textarea#text_{{ $lang }}', // Replace this CSS selector to match the placeholder element for TinyMCE
                    plugins: 'code table lists',
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
                    license_key: 'gpl'
                });
                @endforeach
            </script>
    <script type="text/javascript">
        $(document).ready(function(){
           $("#image_del").click(function(){
              var category = $(this).data('category');

              $.ajax({
                  type: "POST",
                  url: "{{ route('admin.category.image_del') }}",
                  data: {'_token' : '{{ csrf_token() }}', 'category' : category},
                  cache: false,
                  success: function(response){
                      $(".image-result").html('');
                  }
              });
           });
        });
    </script>
@endsection
