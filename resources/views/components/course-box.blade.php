 <div class="bg-white rounded grap-10 overflow-hidden shadow-card">
        <a href="{{route('course', $course->slug)}}">
        <img  src="{{$course->image}}" alt="PEST Driven Laravel" class="w-full h-auto object-contain">
        </a>
        <div class="px-6 pb-5">
        <div class="mt-7 flex justify-between items-center gap-4 mb-4">
            <a href="{{route('course', $course->slug)}}" class="text-lg-primary w-full hover:underline">{{$course->name}}</a>
        </div>
        <div>
            <div class="flex items-center mb-2">
            <div class="flex items-center">
                <img src="#" alt="Christoph Rumpel" class="w-7 h-7 object-contain flex shrink-0 rounded-full">
            </div>
            <h4 class="text-sm-primary w-full leading-5 ml-2"> {{$course->submitedBy->name}} </h4>
            </div>
            <div class="mt-3">
            <div class="flex items-center gap-3 mt-6">
                <p class="bg-parrot-100 text-sm-primary py-1.5 px-1.5 rounded-[3px] flex items-center gap-1.5 w-max">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none">
                    <path fill="#464646" d="M7.493 0A7.08 7.08 0 0 0 .417 7.083a7.08 7.08 0 0 0 7.076 7.084 7.088 7.088 0 0 0 7.09-7.084A7.087 7.087 0 0 0 7.493 0ZM7.5 12.75a5.665 5.665 0 0 1-5.667-5.667A5.665 5.665 0 0 1 7.5 1.417a5.665 5.665 0 0 1 5.667 5.666A5.665 5.665 0 0 1 7.5 12.75Zm-.156-9.208h-.042a.508.508 0 0 0-.51.51v3.343c0 .248.127.482.347.61l2.94 1.763a.505.505 0 0 0 .763-.358.502.502 0 0 0-.247-.513l-2.74-1.63V4.053a.508.508 0 0 0-.51-.51Z"></path>
                </svg> {{$course->duration($course->duration)}}
                </p>
                <p class="text-sm-primary bg-accent-100 py-1.5 px-1.5 rounded-[3px] flex items-center gap-1.5 w-max">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="13" fill="none">
                    <path fill="#464646" d="M14.063 12.188h-3.75V0h3.75v12.188Zm-2.813-.938h1.875V.937H11.25V11.25Zm-1.875.938h-3.75V3.75h3.75v8.438Zm-2.813-.938h1.875V4.687H6.563v6.563Zm-1.875.938H.938V6.561h3.75v5.625Zm-2.812-.938H3.75V7.5H1.875v3.75Z"></path>
                </svg> {{$course->level($course->level)}}
                </p>

                <p class="text-sm-primary bg-yellow-100 py-1.5 px-1.5 rounded-[3px] flex items-center gap-1.5 w-max">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="15" height="13"  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>

                {{count($course->reviews)}}
                </p>
            </div>
            </div>
        </div>
        </div>
    </div>