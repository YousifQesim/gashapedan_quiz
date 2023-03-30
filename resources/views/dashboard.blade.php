<x-app-layout>
  @if (Auth()->user()->type==1)
  <a href="result">result</a>
  <br>
  <a href="create/quiz">create quiz</a>
  <br>
  <a href="/create/question">create quistion</a>
  <br>
  <a href="quizzes/check">quiz see</a>
  <br>


  @else
  <a href="quizzes ">quiz</a>
  <br>
  <a href="result/Self">self result</a>
  <br>
  @endif
  <section class="text-gray-700 body-font">
    <div class="p-4 md:w-1/3">
      <div class="h-full border-2 border-gray-200 rounded-lg overflow-hidden">
        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
          src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80"
          alt="blog">
        <div class="p-6">
          <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">CATEGORY</h2>
          <h1 class="title-font text-lg font-medium text-gray-900 mb-3">The Catalyzer</h1>
          <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing
            tousled waistcoat.</p>
        
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>