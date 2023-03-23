<x-app-layout>

    <div class="py-4 px-6">
        <h2 class="text-lg font-medium text-gray-800 mb-1">edit question:</h2>
        <form method="POST" action="/question/store">
            @csrf
            {{ $question->id }}
            <div class="mb-1">
            <input hidden name="question-id" type="text" value="{{ $question->id }}" >
            <input hidden type="text" name="quiz-id" value="{{ $question->quiz_id }}">


            </div>
            <div class="mb-1">
                <label for="question" class="block text-gray-700 font-medium mb-1">Question:</label>
                <input id="question" name="question" value="{{ $question->question }}"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                @error('question')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="option1" class="block text-gray-700 font-medium mb-1">Option 1:</label>
                <input type="text" id="option1" name="option1" value="{{ $question->answers[0]->answer }}"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                @error('option1')

                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="option2" class="block text-gray-700 font-medium mb-1">Option 2:</label>
                <input type="text" id="option2" name="option2" value="{{ $question->answers[1]->answer }}"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                @error('option2')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="option3" class="block text-gray-700 font-medium mb-1">Option 3:</label>
                <input type="text" id="option3" name="option3" value="{{ $question->answers[2]->answer }}"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                @error('option3')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="option4" class="block text-gray-700 font-medium mb-1">Option 4:</label>
                <input type="text" id="option4" name="option4" value="{{ $question->answers[3]->answer }}"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                @error('option4')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="answer" class="block text-gray-700 font-medium mb-1">Correct Answer:</label>

                @if($question->answers[0]->is_correct ==1) select @endif
                <select id="answer" name="answer"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    <option @if($question->answers[0]->is_correct ==1) selected @endif value="option1">Option 1</option>
                    <option selected @if($question->answers[1]->is_correct ==1) selected @endif value="option2">Option 2
                    </option>
                    <option @if($question->answers[2]->is_correct ==1) selected @endif value="option3">Option 3</option>
                    <option @if($question->answers[3]->is_correct ==1) selected @endif value="option4">Option 4</option>
                </select>
                @error('answer')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>
</x-app-layout>
<script>
    let home=["home","سەرەکی"،"ریسی"]
    let about=["about","دەربارەی ئێمە"،"هەرشترێ"]
    let languch=1;

</script>
<h1>home[languch]</h1>
<h1> about[languch]</h1>