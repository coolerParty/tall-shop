@extends('layouts.frontbase')

@section('content')

@section('title', 'Thank You')


    <!-- order section starts  -->
    <section class="container px-10 py-10 mx-auto mt-10 mb-10 text-center" id="order">
        <h3 class="p-1 mt-10 text-3xl font-semibold capitalize md:p-0">Thank You</h3>
        <h1 class="p-1 text-5xl font-bold tracking-tighter text-orange-500 capitalize md:p-0">Order Successfully Received!</h1>
        <x-link-success href="{{ route('menu') }}" class="px-10 py-5 mt-5">Shop Now</x-link-success>
    </section>
    <!-- order section ends -->

    <div wire:loading.delay.long>
        <!-- Loading screen -->
        <div show="true"
            class="fixed inset-0 z-[200] flex items-center justify-center text-white bg-black bg-opacity-10 text-3xl">
            <!-- By Sam Herbert (@sherb), for everyone. More @ http://goo.gl/7AJzbL -->
            <svg width="60" height="60" viewBox="0 0 38 38" xmlns="http://www.w3.org/2000/svg" stroke="#fff">
                <g fill="none" fill-rule="evenodd">
                    <g transform="translate(1 1)" stroke-width="2">
                        <circle stroke-opacity=".5" cx="18" cy="18" r="18" />
                        <path d="M36 18c0-9.94-8.06-18-18-18">
                            <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18"
                                dur="1s" repeatCount="indefinite" />
                        </path>
                    </g>
                </g>
            </svg>
        </div>
    </div>

