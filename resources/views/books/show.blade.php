@extends('layouts.master')

@section('title')
    @yield('title','Blind Date with a Book')
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' type='text/css' rel='stylesheet'>
    {{-- Page specific JS to validate the form --}}
    <script src="js/validate.js"></script>
@endpush

@section('content')
    <div class='container-fluid' id='header'>
        <img src="images/books-icon.png" alt="Book Icon">
        <h1 class="display-4">Blind Date with a Book</h1>
    </div>
@endsection

@section('form')
    <div class="container-fluid" id="container">
        <h4>How Does it Work?</h4>
        <div id="intro">
            <p>
                Enter your desired book traits below and hit "Get Me a Date!" to generate the semi-random book of your
                dreams. This application was inspired by a Valentine's Day promotion at <a
                    href='http://www.belmontbooks.com/' target='_blank'>Belmont Books</a>.
            </p>
        </div>
        <!-- Start user input section -->
        <h4>Book Preferences:</h4>

        <form method='GET' action='/fetch-book'>
            <div class='form-group'>

                <label for='genre'>Select your preferred genre:</label>
                <select name='genre' id='genre' class='form-control'>
                    <option value='all' {{ ($genre == 'all') ? 'selected' : '' }}>Surprise Me!</option>
                    <option value='scifi' {{ ($genre == 'scifi') ? 'selected' : '' }}>Fiction</option>
                    <option value='history' {{ ($genre == 'history') ? 'selected' : '' }}>History</option>
                    <option value='fiction' {{ ($genre == 'fiction') ? 'selected' : '' }}>General Fiction</option>
                    <option value='fantasy' {{ ($genre == 'fantasy') ? 'selected' : '' }}>Fantasy</option>
                </select>
            </div>
            <div class='form-group'>
                <label>Specify your maximum length in pages (enter 0 for no limit):
                    <input type='text' name='pageLimit' class='form-control' id='pageLimitInput'
                           oninput='validateInput(this.value)'
                           value={{ (old('pageLimit')) ? old('pageLimit') : $pageLimit }}>
                </label>
                <!-- Errors -->
                @if(count($errors) > 0)
                    <ul class='alert alert-danger'>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class='form-group'>
                <div id='checkbox'>
                    <label><input type='checkbox' class='form-check-input' name='ebook'
                                  value='true' {{ ($ebook) ? 'checked' : '' }}> Exclude
                        books without ebook version?</label>
                </div>
                <div id='submit'>
                    <input type='submit' value='Get Me a Date!' class='btn btn-primary btn-md'>
                </div>
            </div>
        </form>

        <!-- Put output section here -->

    </div>
@endsection
