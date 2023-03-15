<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <title>Document</title>
</head>

<body>
    
<form action="../../stdAnswer" method="post">
 @csrf
    @foreach ($quiz->questions as $question)
    @php
        
        $a=$loop->index ;
    @endphp
    <div class="bg-white rounded-lg shadow-lg p-8 mt-2">
        
        <h1 class="text-2xl font-bold mb-4">Q{{ $loop->index +1 }}: {{ ($question->question) }}</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
            @foreach ($question->answers as $answer)
            <div class="flex items-center">
                <input type="radio" id="{{ $answer->id }}" name="A{{ $a }}" value="{{ $answer->id }}" class="mr-2">
                <label  name="{{ $answer->id }}" for="{{ $answer->id }}">{{ ($answer->answer) }}</label>
                
            </div>
            
            @endforeach
        </div>
        
    </div>
    
    
    
    @endforeach
    <div class="text-center mt-12">
<input  type="hidden" name="auth" value="{{ Auth::user()->id }}">
<input type="hidden" name="quiz_id" value="{{ $quiz->id}}">
        <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline ">
        Submit Answer
    </button>
</div>
</form>

@if (session()->has('stuAnswer'))
<div id="messge_show"
    class=" fixed left-1/2 top-4 p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
    <span class="font-medium">Success alert!</span> {{ session('stuAnswer') }}
</div>

<script type="text/javascript">
    $(messge_show).show().delay(3000).fadeOut();
</script>
@endif
</body>

</html>