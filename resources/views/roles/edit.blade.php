@extends('layouts.admin')

@section('content')
@section('title', 'Roles Edit')
<!-- Main content header -->
<div class="flex flex-col items-start justify-between pb-6 mb-4 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row">
    <h1 class="text-lg font-semibold whitespace-nowrap">RoleUsers <span class="text-base text-gray-400">/</span> Edit <span class="text-base text-gray-400">/</span> <span class="text-2xl">{{ $role->name }}</span></h1>
    <a href="{{ route('admin.roles.index') }}" class="inline-flex items-center px-6 py-2 space-x-1 text-white bg-purple-600 rounded-md shadow hover:bg-opacity-95">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
            </svg>
        </span>
        <span>Back</span>
    </a>
</div>


<section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
    <form method="POST" action="{{ route('admin.roles.update', $role) }}">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <div>
                <label class="text-gray-700 dark:text-gray-200" for="title">name</label>
                <input id="name" type="text" name="name" value="{{ $role->name }}" required autofocus
                    autocomplete="name"
                    class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-200 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 dark:focus:border-blue-300 focus:outline-none focus:ring">
            </div>
        </div>

        <div class="mt-4">
            <div class="py-4"><strong>Permission:</strong></div>
            <!-- <div class="grid gap-1 md:grid-rows-4 md:grid-flow-col"> -->
            <div class="grid gap-1 md:grid-cols-4">
                @foreach($permission as $value)
                <div class="px-3 py-1 border border-gray-400 rounded bg-slate-300 hover:bg-slate-400">
                    <label>
                        <input type="checkbox" value="{{ $value->id }}" name="permission[]"
                            class="{{ $value->name  }} rounded border-gray-300 text-indigo-600  shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 bg-indigo-300  hover:bg-indigo-900"
                            {{ in_array($value->id , $rolePermissions) ? 'checked' : '' }}>
                        <span>{{ $value->name }}</span>
                    </label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <button type="submit"
                class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
        </div>
    </form>
</section>

@endsection
