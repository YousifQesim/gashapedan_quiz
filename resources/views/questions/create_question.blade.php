<x-app-layout>

    <div class="py-4 px-6">
        <h2 class="text-lg font-medium text-gray-800 mb-1">Create a new question:</h2>
        <form method="POST" action="../question/store">
            @csrf
            <div class="mb-1">
                <label for="quiz-id" class="block text-gray-700 font-medium mb-1">Quiz ID:</label>
                <select id="quiz-id" name="quiz-id"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    @foreach ($quizzes as $quiz)
                    <option value="{{ $quiz->id }}">{{ $quiz->title }}</option>
                    @endforeach

                </select>
                @error('quiz-id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-1">
                <label for="question" class="block text-gray-700 font-medium mb-1">Question:</label>
                <textarea id="question" name="question" rows="1"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline"></textarea>
                    @error('question')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-1">
                <label for="option1" class="block text-gray-700 font-medium mb-1">Option 1:</label>
                <input type="text" id="option1" name="option1"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    @error('option1')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-1">
                <label for="option2" class="block text-gray-700 font-medium mb-1">Option 2:</label>
                <input type="text" id="option2" name="option2"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    @error('option2')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-1">
                <label for="option3" class="block text-gray-700 font-medium mb-1">Option 3:</label>
                <input type="text" id="option3" name="option3"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    @error('option3')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-1">
                <label for="option4" class="block text-gray-700 font-medium mb-1">Option 4:</label>
                <input type="text" id="option4" name="option4"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    @error('option4')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
            </div>
            <div class="mb-1">
                <label for="answer" class="block text-gray-700 font-medium mb-1">Correct Answer:</label>
                <select id="answer" name="answer"
                    class="w-full px-3 py-1 border rounded-lg text-gray-700 focus:outline-none focus:shadow-outline">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
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