@extends('layouts.app', ['page' => __('Scrum Info'), 'pageSlug' => 'scrum Info'])

@section('content')
<div class="info">
    <h1>Scrum Definitions</h1>
        <div class="Def-info">
            <p>Bellow you can find the definitions and descriptions of what those definitions mean in scrum.</p>
        <br>
    </div>
    <h2>The Scrum Team</h2>
        <div class="Def-Scrum-Team">
            <p>The scrum team has several roles that complement each other in responsibilities in order ensure optimal cooperation.</p>
            <p>These roles are the Development-Team, the Product Owner, the Stakeholders and the Scrum Master.</p>
            <br>
            <h4>-Development Team</h4>
            <p>The Development Team is a self-organising, multidisciplinary team existing out of between five to nine members.</p>
            <p>They are the ones that develop all the items on the product backlog into a working product.</p>
            <br>
            <h4>-Product Owner</h4>
            <p>The Product Owner represents the internal and external stakeholders and turns the customers wishes into what they want.</p>
            <p>In order to accomplish this the Product Owner uses the Product Backlog, where he decides which task has the highest priority</p>
            <br>
            <h4>-Scrum Master</h4>
            <p>The Scrum Master facilitates the Product owner and the Development Team throughout the entire process.</p>
            <p>He makes sure that everyone understands how scrum works and that all the impediments that might delay or obstuct the process are out of the way.</p>
            <h4>-Stakeholders</h4>
            <p>The Stakeholders are the customers that will be the eventual users of the final product.</p>
        </div>
        <br>
    <h2>Sprint Meetings</h2>
        <div class="Sprint-meetings">
            <p>All the work that has to be done is organised in sprints lasting between 1 and 4 weeks, during each sprint there are 4 recurring parts that provide the possibility to adjust the process.</p>
            <p>These four parts are the Sprint Planning, Daily Scrum, Sprint Review and Sprint Retrospective.</p>
            <br>
            <h4>-Sprint Planning</h4>
            <p>At the start of every sprint a sprint planning has to be made.</p>
            <p>The Sprint Planning contains the tasks that the Product Owner wants the Developer Team to complete by the end of the sprint.</p>
            <br>
            <h4>-Daily Scrum</h4>
            <p>The Daily Scrum is a short gathering at the start of each workday that lasts less than 15 minutes in which the Development Team discusses the progress and obsctructions.</p>
            <br>
            <h4>-Sprint Review</h4>
            <p>At the end of a sprint the Development Team shows their results and receives feedback from customers, managers and colleagues.</p>
            <br>
            <h4>-Sprint Retrospective</h4>
            <p>To finish of a sprint the team evaluates the process with the goal set to improve the process for the next sprint.</p>
        </div>
        <br>
    <h2>Artefacts</h2>
        <div class="Artefacts">
            <h4>-Product Backlog</h4>
            <p>The Product Backlog is a list that contains all the work that needs to be done to create and maintain a product.</p>
            <p>The Product Owner is in charge of the Product Backlog and manages it along with the priorities.</p>
            <br>
            <h4>-Sprint Backlog</h4>
            <p>The Sprint Backlog provides an overview for all the selected items from the Product Backlog that the Development Team will work on during the upcoming sprint.</p>
            <br>
            <h4>-Definition of Done</h4>
            <p>The Definition of Done is a list of requirements an item must have to be able to be marked as Done</p>
            <br>
            <h4>-Scrumboard</h4>
            <p>A Scrum board shows the items that are in the product backlog along with their current state of progression and who from the developer team is working on them.</p>
            <br>
            <h4>-User Story</h4>
            <p>A user story is a short description of a part from the product, described from the perspective of the user.</p>
            <p>It's stuctured in the following way: "As (who?), I want (what?), so that I (why?)".</p>
            <h4>-User story items</h4>
            <p>User stories can be split up in user story items.</p>
            <p>Each user story item represents a smaller part of a user story.</p>
            <h4>-acceptance criteria</h4>
            <p>Acceptance Criteria define when an item is complete and working as expected. </p>
            <p>They are written in simple language to make sure that there is no abiguity about what it is expected to do.</p>
            <h4>-Poker Planning</h4>
            <p>Poker planning is used to assign points to each user story to estimate how difficult it seems or how much time it will take.</p>
        </div>
    
    

</div>
@endsection