@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="row">
                            <div class="col s12">
                              <ul class="tabs">
                                <li class="tab col s3"><a href="#test1">Medwerkers</a></li>
                                <li class="tab col s3"><a href="#test2">Projecten</a></li>
                                <li class="tab col s3 "><a href="#test3">Daily scrums</a></li>
                                <li class="tab col s3"><a href="#test4">Sprints</a></li>
                              </ul>
                            </div>
                            <div id="test1" class="col s12">
                                    <table>
                                            <thead>
                                              <tr>
                                                  <th>Naam</th>
                                                  <th>Email</th>
                                                  <th>Rol</th>
                                                  <th>Actie</th>
                                              </tr>
                                            </thead>
                                    
                                            <tbody>
                                              <tr>
                                                <td>Alvin</td>
                                                <td>alvin@alvi.nl</td>
                                                <td>User</td>
                                                <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                              <tr>
                                                <td>Alvin</td>
                                                <td>alvin@alvi.nl</td>
                                                <td>User</td>
                                                <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                              <tr>
                                                <td>Alvin</td>
                                                <td>alvin@alvi.nl</td>
                                                <td>User</td>
                                                <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                            </tbody>
                                          </table>
                            </div>
                            <div id="test2" class="col s12">
                                    <table>
                                            <thead>
                                              <tr>
                                                  <th>Naam</th>
                                                  <th>Team</th>
                                                  <th>Aantal medewerkers</th>
                                                  <th>Actie</th>
                                              </tr>
                                            </thead>
                                    
                                            <tbody>
                                              <tr>
                                                <td>Scrumify</td>
                                                <td>Team genius</td>
                                                <td>20</td>
                                                <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                              <tr>
                                                    <td>Scrumify</td>
                                                    <td>Team genius</td>
                                                    <td>20</td>
                                                    <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                              <tr>
                                                    <td>Scrumify</td>
                                                    <td>Team genius</td>
                                                    <td>20</td>
                                                    <td><a class="waves-effect green waves-light btn">Bewerken</a></td>
                                              </tr>
                                            </tbody>
                                          </table>
                            </div>
                            <div id="test3" class="col s12">
                                    <table>
                                            <thead>
                                              <tr>
                                                  <th>Medewerker</th>
                                                  <th>Heeft gedaan</th>
                                                  <th>Gaat doen</th>
                                                  <th>Problemen</th>
                                              </tr>
                                            </thead>
                                    
                                            <tbody>
                                              <tr>
                                                <td>Vincent Toonen</td>
                                                <td>Knop gemaakt</td>
                                                <td>Errors ervan oplossen</td>
                                                <td>de pagina wilt die niet openen</td>
                                              </tr>
                                              <tr>
                                                    <td>Vincent Toonen</td>
                                                    <td>Knop gemaakt</td>
                                                    <td>Errors ervan oplossen</td>
                                                    <td>de pagina wilt die niet openen</td>
                                              </tr>
                                              <tr>
                                                    <td>Vincent Toonen</td>
                                                    <td>Knop gemaakt</td>
                                                    <td>Errors ervan oplossen</td>
                                                    <td>de pagina wilt die niet openen</td>
                                              </tr>
                                            </tbody>
                                          </table>
                            </div>
                            <div id="test4" class="col s12">
                                    <table>
                                            <thead>
                                              <tr>
                                                  <th>Nummer</th>
                                                  <th>Team</th>
                                                  <th>Vooruitgang</th>
                                                  <th>Acties</th>
                                              </tr>
                                            </thead>
                                    
                                            <tbody>
                                              <tr>
                                                <td>1</td>
                                                <td>Team Genius</td>
                                                <td>40% af</td>
                                                <td><a class="waves-effect green waves-light btn">Bekijken</a></td>
                                              </tr>
                                              <tr>
                                                    <td>1</td>
                                                    <td>Team Genius</td>
                                                    <td>40% af</td>
                                                    <td><a class="waves-effect green waves-light btn">Bekijken</a></td>
                                              </tr>
                                              <tr>
                                                    <td>1</td>
                                                    <td>Team Genius</td>
                                                    <td>40% af</td>
                                                    <td><a class="waves-effect green waves-light btn">Bekijken</a></td>
                                              </tr>
                                            </tbody>
                                          </table>
                            </div>
                          </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection