@include('layouts.head')
@section('content')

<main class="mainAdd">
    <div class="cardAdd">
        <h2>@lang('Edit Task')</h2>
        <form action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">
                <span>@lang('Title')</span>
                <input type="text" name="title" id="title" value="{{ $task->title }}" required>
            </label>
            <label for="description">
                <span>@lang('Description')</span>
                <textarea name="description" cols="35" rows="5" >{{ $task->description }}</textarea>
            </label>
            <input type="submit"  class="btn" value="@lang("Save")">
        </form>
    </div>
</main>


@include('layouts.footer')