@extends('layout.app')
@section('title')
    tournament
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex flex-row-reverse justify-between items-center border-b">
                <h2 class="text-xl">tournament</h2>
            </div>
            <div class="w-[90%] h-3/5 flex flex-col justify-center">
                <table class="w-full min-h-full border border-gray-400">
                    <thead>
                    <tr class="h-12 border border-gray-400 border-b-2 border-b-gray-400">
                        <td class="text-center">first team</td>
                        <td class="text-center">second team</td>
                        <td class="text-center">game</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if($teams[0]->games_count==0)
                        <form action="{{route('tournaments.create')}}" method="post">
                            @csrf
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[0]->team_id}}">{{$teams[0]->team->title}}</label>
                                    <input type="number" name="{{$teams[0]->team_id}}" id="{{$teams[0]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[3]->team_id}}" id="{{$teams[3]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    <label for="{{$teams[3]->team_id}}">{{$teams[3]->team->title}}</label>
                                </td>
                                <td class="text-red-500">
                                    game 1
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[1]->team_id}}">{{$teams[1]->team->title}}</label>
                                    <input type="number" name="{{$teams[1]->team_id}}" id="{{$teams[1]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[2]->team_id}}" id="{{$teams[2]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    {{$teams[2]->team->title}}
                                </td>
                                <td class="text-red-500">
                                    game 2
                                </td>
                            </tr>
                            <button type="submit" class="w-20 border-2 border-b-cyan-700 mb-8 cursor-pointer">SET</button>
                        </form>
                    @elseif($teams[0]->games_count==1)
                        <form action="{{route('tournaments.create')}}" method="post">
                            @csrf
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[0]->team_id}}">{{$teams[0]->team->title}}</label>
                                    <input type="number" name="{{$teams[0]->team_id}}" id="{{$teams[0]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[2]->team_id}}" id="{{$teams[2]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    <label for="{{$teams[2]->team_id}}">{{$teams[2]->team->title}}</label>
                                </td>
                                <td class="text-red-500">
                                    game 1
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[1]->team_id}}">{{$teams[1]->team->title}}</label>
                                    <input type="number" name="{{$teams[1]->team_id}}" id="{{$teams[1]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[3]->team_id}}" id="{{$teams[3]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    <label for="{{$teams[3]->team_id}}">{{$teams[3]->team->title}}</label>
                                </td>
                                <td class="text-red-500">
                                    game 2
                                </td>
                            </tr>
                            <button type="submit" class="w-20 border-2 border-b-cyan-700 mb-8 cursor-pointer">SET</button>
                        </form>
                    @elseif($teams[0]->games_count==2)
                        <form action="{{route('tournaments.create')}}" method="post">
                            @csrf
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[0]->team_id}}">{{$teams[0]->team->title}}</label>
                                    <input type="number" name="{{$teams[0]->team_id}}" id="{{$teams[0]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[1]->team_id}}" id="{{$teams[1]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    <label for="{{$teams[1]->team_id}}">{{$teams[1]->team->title}}</label>
                                </td>
                                <td class="text-red-500">
                                    game 1
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <label for="{{$teams[2]->team_id}}">{{$teams[2]->team->title}}</label>
                                    <input type="number" name="{{$teams[2]->team_id}}" id="{{$teams[2]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 ml-20">
                                </td>
                                <td class="text-center">
                                    <input type="number" name="{{$teams[3]->team_id}}" id="{{$teams[3]->team_id}}" min="0" max="15" class="border-1 pl-2 w-12 mr-20">
                                    {{$teams[3]->team->title}}
                                </td>
                                <td class="text-red-500">
                                    game 2
                                </td>
                            </tr>
                            <button type="submit" class="w-20 border-2 border-b-cyan-700 mb-8 cursor-pointer">SET</button>
                        </form>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection
