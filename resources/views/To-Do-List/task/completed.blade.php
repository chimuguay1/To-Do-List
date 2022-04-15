@include('layouts.head')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <main>
        <header class="indexH">
            <h1 class="titulo-registro">@lang('List of completed tasks')</h1>
            <button class="nuevo-registro-desktop" role="button" id="new-form"><a href="{{ route('task.deletedAll') }}">@lang('Delete all tasks')</a></button>
            <button class="nuevo-registro-movile" role="button" id="new-form-movile"> <a href="{{ route('task.deletedAll') }}"><img class="icono-new" src="{{asset('/img/icons/trash.svg')}}" alt=""></a></button>
        </header>
        <div class="table-responsive">
            <table class="table" id="datatable">
                <thead class="table-dark">
                    <th>@lang('Title')</th>
                    <th>@lang('Description')</th>
                    <th>@lang('Created_at')</th>
                    <th>@lang('Completed_at')</th>
                    <th>@lang('Actions')</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at->format('d-m-Y') }}</td>
                        <td>{{ Carbon\Carbon::parse($task->completed_at)->format('d-m-Y') }}</td>
                        <td>
                            <form method="POST" action="{{route('task.destroy', ['task' => $task->id])}}">
                                @csrf
                                @method('DELETE')
                                <a title="{{ __('Delete') }}" href="#" class="btn btn-danger btn-sm"  onclick="this.closest('form').submit();return false;"><img src="{{asset('img/icons/trash.svg')}}" style="-webkit-filter: grayscale(1) invert(1); filter: grayscale(1) invert(1);"></a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>                
@include('layouts.footer')