<x-guest-layout>

    <div class="bg-gray mt-1 py-6">
          <div class="container">
            <!--Course List-->
            <section class="mt-20 lg:mt-[140px]">
                <h1 class="heading-tertiory text-center mb-10 md:mb-16">{{$item}} </h1>
                <div class="max-w-7xl w-full inline-flex single-feature gap-10 flex-wrap mx-auto">

                @foreach($courses as $course)
                    @include('components.course-box', ['course'=>$course])
                @endforeach
                </div>
                <div class="py-5">
                    {{$courses->links()}}
                </div>
            </section>

          </div>
      </div>

</x-guest-layout>