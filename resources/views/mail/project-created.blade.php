@component('mail::message')

    <style>
        .text-primary{
            font-size: 30px;
            color: red;
        }

    </style>

# New Project {{$project->title}}

<div class="text-primary">helo world</div>

{{$project->description}}

@component('mail::button', ['url' => url('/projects/'.$project->id)])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
