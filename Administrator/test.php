<?php
ob_start();
?>

<div class="table-content table-basic">
    <div class="card">
        <div class="card-body">
            <div class="align-self-center">
                {{-- Notifi --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    Invalid data!
                </div>
                @endif

                @if (session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
                @endif

                {{-- Form add news --}}
                <form action="{{route('news.store')}}" method="POST" id="news-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label>
                            <h3>Category name</h3>
                        </label>
                        <select id="category_id" name="category_id"
                            class="form-control mt-3 @error('category_id') is-invalid @enderror">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>
                            <h3>Title News</h3>
                        </label>
                        <input type="text" class="form-control mt-3" name="title" placeholder="Title"
                            value="{{old('title')}}">
                        @error('title')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <h3>Content</h3>
                        <textarea id="editor" name="content">
                                {{old('content')}}
                            </textarea>
                        @error('content')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <a href="{{route('news.index')}}" class="btn btn-danger waves-effect waves-light">Back</a>
                    <button style="float: right;" type="submit" class="btn-submit">Save & Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'layout.php';
?>