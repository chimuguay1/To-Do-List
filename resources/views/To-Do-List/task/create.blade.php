@include('layouts.head')
@section('content')
<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Add Task')</h2>
        <form action="{{ url('task') }}" method="POST">
            @csrf
            <label for="title">
                <span>@lang('Title')</span>
                <input type="text" name="title" id="title" required>
            </label>
            <label for="description">
                <span>@lang('Description')</span>
                <textarea name="description" cols="35" rows="5"></textarea>
            </label>
            <input type="submit"  class="btn" value="@lang('Save')">
        </form>
    </div>
</main>

@include('layouts.footer')