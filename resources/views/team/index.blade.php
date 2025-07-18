@extends('layout.app')
@section('title')
    teams
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex flex-row-reverse justify-between items-center border-b">
                <h2 class="text-xl">teams</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">add to tournament</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                        <td class="text-center">id</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teams as $team)
                        <tr>
                            <td class="text-center">
                                @if($team->tournament==null)
                                    <form action="{{route('tournaments.store',compact('team'))}}" method="post">
                                        @csrf
                                        <button type="submit" class="text-cyan-600 cursor-pointer">add</button>
                                    </form>
                                @endif
                            </td>
                            <td class="text-center">{{$team->description}}</td>
                            <td class="text-center">{{$team->title}}</td>
                            <td class="text-center">{{$team->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-5">{{$teams->links()}}</div>
        </div>
@endsection
