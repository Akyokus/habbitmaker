@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('habbit.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="category">Hangi Kategoride Kendinizi Geliştirmek İstersiniz?</label>
                        <select name="category_id" id="category" class="form-control" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Şimdi Alışkanlığı Yazın</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="tags">Etiketler</label>
                        <input type="text" name="tags" id="tags" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-primary" type="submit">Haydi Başla!</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-block btn-secondary" type="reset">Sıfırla</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection