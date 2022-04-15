@include('layouts.head')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <main>
        <header class="indexH">
            <h1 class="titulo-registro">@lang('Task list')</h1>
            <button class="nuevo-registro-desktop" role="button" id="new-form"><a href="{{ url('task/create') }}">@lang('Add Task')</a></button>
            <button class="nuevo-registro-movile" role="button" id="new-form-movile"> <a href="{{ url('task/create') }}"><img class="icono-new" src="{{asset('/img/icons/card-list.svg')}}" alt=""></a></button>
        </header>
        <div class="table-responsive">
            <table class="table" id="datatable">
                <thead class="table-dark">
                    <th>@lang('Title')</th>
                    <th>@lang('Description')</th>
                    <th>@lang('Created_at')</th>
                    <th>@lang('Updated_at')</th>
                    <th>@lang('Actions')</th>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->created_at->format('d-m-Y') }}</td>
                        <td>{{ $task->updated_at->format('d-m-Y') }}</td>
                        <td>
                            <form method="POST" action="{{route('task.destroy', ['task' => $task->id])}}">
                                @csrf
                                @method('DELETE')
                                <a title="{{ __('Complete') }}" href="{{ route('task.updateStatus', $task->id) }}" class="btn btn-success btn-sm"><img src="{{asset('img/icons/check-o-svgrepo-com.svg')}}" style="-webkit-filter: grayscale(1) invert(1); filter: grayscale(1) invert(1);"></a> 
                                <a title="{{ __('Edit') }}" href="{{ route('task.edit', $task->id) }}" class="btn btn-primary btn-sm"><img src="{{asset('img/icons/pencil-square.svg')}}" style="-webkit-filter: grayscale(1) invert(1); filter: grayscale(1) invert(1);"></a> 
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