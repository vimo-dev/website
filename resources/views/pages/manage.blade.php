@extends('main')

@section('title', '| Manage')

@section('content')
<?php use App\User; ?>
@auth {{--  TODO: YOU ARE NOT AN ADMIN MSG  --}}
@if(Auth::user()->role >= 2)
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-8">
                    <div class="row container border rounded">
                        <h2 class="text-center"> Users </h2>
                        <?php
                            $users = App\User::where('username', '!=', 'NULL')->orderBy('name', 'desc')->get();

                            echo '<table class="table table-striped table-bordered table-hover table-sm" id="users-table">';
                            echo "<thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Email</th><th>Rolle ID</th><th>Team ID</th><th>Land ID</th><th>Geburtsdatum</th></tr></thead>";
                            echo "<tbody>";
                            foreach ($users as $user) {
                                
                                echo "<tr>";
                                    echo "<td>".$user->id."</td>"."<td>".$user->username."</td>"."<td>".$user->name."</td>";
                                    echo "<td>".$user->email."</td>"."<td>".$user->role."</td>"."<td>".$user->team_id."</td>";
                                    echo "<td>".$user->country."</td>"."<td>".$user->date_of_birth."</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                        ?>
                    </div>
                    <div class="row container border rounded">
                        <h2 class="text-center"> Teams </h2>
                    </div>
                </div>
                <div class="col container border rounded">
                    <h2 class="text-center"> Team Roles </h2>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-md-center">
        <h2 class="text-center"> You are not an admin. </h2>
    </div>
@endif
@endauth
@endsection