<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use App\Http\Requests\StoreTournamentRequest;
use App\Http\Requests\UpdateTournamentRequest;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams=Tournament::all();
        return view('tournament.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Team $team)
    {
        Tournament::create([
            'team_id'=>$team->id
        ]);
        return redirect()->back();
    }
    public function create(StoreTournamentRequest $request)
    {
        $req=$request->toArray();
        $tournaments=Tournament::all();
        $team1=$tournaments->where('team_id',1)->first()->team;
        $team2=$tournaments->where('team_id',2)->first()->team;
        $team3=$tournaments->where('team_id',3)->first()->team;
        $team4=$tournaments->where('team_id',4)->first()->team;
        $scores=[];
        $goal_conceded=[];
        foreach ($tournaments as $tournament) {
            $scores[$tournament->team_id]=$tournament->score;
            $goal_conceded[$tournament->team_id]=$tournament->goal_conceded;
        }

        /**
         * This lines for save every mach result
         */
        if ($team1->teams()->count()==0){
            $team1->teams()->attach(4,[
                'team1_goals'=>$req[1],
                'team2_goals'=>$req[4],
                'week'=>1
            ]);

            /**
             * This lines for calculate goal conceded
             */
            $goal_conceded[1]+=$req[4];
            $goal_conceded[4]+=$req[1];
            /**
             * This lines for calculate teams scores
             */
            if ($req[1]>$req[4]){
                $scores[1]+=3;
            }
            elseif ($req[1]==$req[4]){
                $scores[1]+=1;
                $scores[4]+=1;
            }
            else
                $scores[4]+=3;
            $team2->teams()->attach(3,[
                'team1_goals'=>$req[2],
                'team2_goals'=>$req[3],
                'week'=>1
            ]);

            $goal_conceded[2]+=$req[3];
            $goal_conceded[3]+=$req[2];
            if ($req[2]>$req[3])
                $scores[2]+=3;
            elseif ($req[2]==$req[3]){
                $scores[2]+=1;
                $scores[3]+=1;
            }
            else
                $scores[3]+=3;
            /**
             * This lines for save team results
             */
            foreach ($tournaments as $tournament){
                $tournament->update([
                    'games_count'=>$tournament->games_count+1,
                    'goal_scored'=>$tournament->goal_scored+$req[$tournament->team_id],
                    'goal_conceded'=>$goal_conceded[$tournament->team_id],
                    'score'=>$scores[$tournament->team_id],
                ]);
            }
            return redirect()->route('tournaments.index');
        }elseif ($team1->teams()->count()==1){
            $team1->teams()->attach(3,[
                'team1_goals'=>$req[1],
                'team2_goals'=>$req[3],
                'week'=>2
            ]);
            $goal_conceded[1]+=$req[3];
            $goal_conceded[3]+=$req[1];
            if ($req[1]>$req[3]){
                $scores[1]+=3;
            }
            elseif ($req[1]==$req[3]){
                $scores[1]+=1;
                $scores[3]+=1;
            }
            else
                $scores[3]+=3;
            $team2->teams()->attach(4,[
                'team1_goals'=>$req[2],
                'team2_goals'=>$req[4],
                'week'=>2
            ]);
            $goal_conceded[2]+=$req[4];
            $goal_conceded[4]+=$req[2];
            if ($req[2]>$req[4])
                $scores[2]+=3;
            elseif ($req[2]==$req[4]){
                $scores[2]+=1;
                $scores[4]+=1;
            }
            else
                $scores[4]+=3;
            foreach ($tournaments as $tournament){
                $tournament->update([
                    'games_count'=>$tournament->games_count+1,
                    'goal_scored'=>$tournament->goal_scored+$req[$tournament->team_id],
                    'goal_conceded'=>$goal_conceded[$tournament->team_id],
                    'score'=>$scores[$tournament->team_id],
                ]);
            }
            return redirect()->route('tournaments.index');
        }elseif ($team1->teams()->count()==2){
            $team1->teams()->attach(2,[
                'team1_goals'=>$req[1],
                'team2_goals'=>$req[2],
                'week'=>3
            ]);
            $goal_conceded[2]+=$req[1];
            $goal_conceded[1]+=$req[2];

            if ($req[1]>$req[2])
                $scores[1]+=3;
            elseif ($req[1]==$req[2]){
                $scores[1]+=1;
                $scores[2]+=1;
            }
            else
                $scores[2]+=3;
            $team3->teams()->attach(4,[
                'team1_goals'=>$req[3],
                'team2_goals'=>$req[4],
                'week'=>3
            ]);
            $goal_conceded[4]+=$req[3];
            $goal_conceded[3]+=$req[4];
            if ($req[3]>$req[4])
                $scores[3]+=3;
            elseif ($req[3]==$req[4]){
                $scores[3]+=1;
                $scores[4]+=1;
            }
            else
                $scores[4]+=3;
            foreach ($tournaments as $tournament){
                $tournament->update([
                    'games_count'=>$tournament->games_count+1,
                    'goal_scored'=>$tournament->goal_scored+$req[$tournament->team_id],
                    'goal_conceded'=>$goal_conceded[$tournament->team_id],
                    'score'=>$scores[$tournament->team_id],
                ]);
            }
            return redirect()->route('results.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTournamentRequest $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
