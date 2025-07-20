@extends('layout.app')
@section('title')
    results
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex flex-row-reverse justify-between items-center border-b">
                <h2 class="text-xl">results</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">score</td>
                        <td class="text-center">goals conceded</td>
                        <td class="text-center">goals scored</td>
                        <td class="text-center">games</td>
                        <td class="text-center">description</td>
                        <td class="text-center">title</td>
                        <td class="text-center">id</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tournaments as $tournament)
                        <tr>
                            <td class="text-center">{{$tournament->score}}</td>
                            <td class="text-center">{{$tournament->goal_conceded}}</td>
                            <td class="text-center">{{$tournament->goal_scored}}</td>
                            <td class="text-center">{{$tournament->games_count}}</td>
                            <td class="text-center">{{$tournament->team->description}}</td>
                            <td class="text-center">{{$tournament->team->title}}</td>
                            <td class="text-center">{{$tournament->id}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
